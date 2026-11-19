<?php

use App\Filament\Resources\CVFacultyResource\Pages\CreateCVFaculty;
use App\Filament\Resources\CVFacultyResource\Pages\EditCVFaculty;
use App\Models\CVFaculty;
use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\DB;
use Livewire\Livewire;

beforeEach(function () {
    config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:']);
    DB::purge('sqlite');

    foreach ([
        '0001_01_01_000000_create_users_table.php',
        '2026_11_18_145621_create_c_v_faculties_table.php',
        '2026_11_18_145712_create_c_v_teachings_table.php',
        '2026_11_18_145739_create_c_v_works_table.php',
    ] as $migration) {
        (require database_path('migrations/'.$migration))->up();
    }

    Filament::setCurrentPanel(Filament::getPanel('admin'));
    $this->actingAs(User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => 'password']));
});

function cvFacultyResourceData(): array
{
    return [
        'full_name' => 'Dr. Jane Doe',
        'profession' => 'Neurosurgeon',
        'institution' => 'Hospital',
        'city' => 'Jakarta',
        'country' => 'Indonesia',
        'sex' => 'Female',
        'bio' => 'A faculty biography.',
        'photo_path' => 'faculty-photos/photo.jpg',
        'consent' => true,
        'cvTeachings' => [
            ['year' => '2025', 'event' => 'First event', 'country' => 'Indonesia', 'role' => 'Speaker', 'topic' => 'Surgery'],
            ['year' => '2026', 'event' => 'Second event', 'country' => 'Japan', 'role' => 'Chair', 'topic' => 'Research'],
        ],
        'cvWorks' => [
            ['period' => '2020 - 2025', 'position' => 'Consultant', 'institution' => 'Hospital', 'country' => 'Indonesia', 'relevance' => 'Clinical work'],
            ['period' => '2025 - present', 'position' => 'Director', 'institution' => 'University', 'country' => 'Japan', 'relevance' => 'Research work'],
        ],
    ];
}

it('creates teaching and work experiences in their form order', function () {
    $data = cvFacultyResourceData();

    Livewire::test(CreateCVFaculty::class)
        ->fillForm(collect($data)->except(['cvTeachings', 'cvWorks'])->all())
        ->set('data.cvTeachings', $data['cvTeachings'])
        ->set('data.cvWorks', $data['cvWorks'])
        ->call('create')
        ->assertHasNoFormErrors();

    $faculty = CVFaculty::where('full_name', 'Dr. Jane Doe')->firstOrFail();
    expect($faculty->cvTeachings->pluck('event')->all())->toBe(['First event', 'Second event'])
        ->and($faculty->cvWorks->pluck('position')->all())->toBe(['Consultant', 'Director'])
        ->and($faculty->cvTeachings->pluck('sort_order')->all())->toBe([1, 2])
        ->and($faculty->cvWorks->pluck('sort_order')->all())->toBe([1, 2]);
});

it('loads, updates, removes and reorders existing experiences', function () {
    $data = cvFacultyResourceData();
    $faculty = CVFaculty::create(collect($data)->except(['cvTeachings', 'cvWorks'])->all());
    foreach ($data['cvTeachings'] as $index => $row) {
        $faculty->cvTeachings()->create([...$row, 'sort_order' => $index]);
    }
    foreach ($data['cvWorks'] as $index => $row) {
        $faculty->cvWorks()->create([...$row, 'sort_order' => $index]);
    }
    $teachings = $faculty->cvTeachings;
    $works = $faculty->cvWorks;

    Livewire::test(EditCVFaculty::class, ['record' => $faculty->getRouteKey()])
        ->assertFormSet([
            'cvTeachings' => [
                'record-'.$teachings[0]->id => $teachings[0]->attributesToArray(),
                'record-'.$teachings[1]->id => $teachings[1]->attributesToArray(),
            ],
        ])
        ->set('data.cvTeachings', [
            'record-'.$teachings[1]->id => [...$data['cvTeachings'][1], 'event' => 'Updated event'],
            'record-'.$teachings[0]->id => $data['cvTeachings'][0],
        ])
        ->set('data.cvWorks', [
            'record-'.$works[1]->id => [...$data['cvWorks'][1], 'position' => 'Updated director'],
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    expect($faculty->fresh()->cvTeachings->pluck('event')->all())->toBe(['Updated event', 'First event'])
        ->and($faculty->fresh()->cvWorks->pluck('position')->all())->toBe(['Updated director'])
        ->and($faculty->fresh()->cvWorks->first()->id)->toBe($works[1]->id);
});

it('validates the experience fields and maximum entries', function () {
    $data = cvFacultyResourceData();
    $data['cvTeachings'][0]['year'] = '1949';
    $data['cvTeachings'][0]['country'] = 'Not a country';
    $data['cvWorks'] = array_fill(0, 6, $data['cvWorks'][0]);

    Livewire::test(CreateCVFaculty::class)
        ->fillForm(collect($data)->except(['cvTeachings', 'cvWorks'])->all())
        ->set('data.cvTeachings', $data['cvTeachings'])
        ->set('data.cvWorks', $data['cvWorks'])
        ->call('create')
        ->assertHasFormErrors(['cvTeachings.0.year', 'cvTeachings.0.country', 'cvWorks']);

    expect(CVFaculty::count())->toBe(0);
});

it('requires mandatory experience fields and limits teaching entries', function () {
    $data = cvFacultyResourceData();

    Livewire::test(CreateCVFaculty::class)
        ->fillForm(collect($data)->except(['cvTeachings', 'cvWorks'])->all())
        ->set('data.cvTeachings', array_fill(0, 6, []))
        ->set('data.cvWorks', [[]])
        ->call('create')
        ->assertHasFormErrors([
            'cvTeachings',
            'cvTeachings.0.year',
            'cvTeachings.0.event',
            'cvTeachings.0.country',
            'cvTeachings.0.role',
            'cvTeachings.0.topic',
            'cvWorks.0.period',
            'cvWorks.0.position',
            'cvWorks.0.institution',
            'cvWorks.0.country',
        ])
        ->assertHasNoFormErrors(['cvWorks.0.relevance']);

    expect(CVFaculty::count())->toBe(0);
});
