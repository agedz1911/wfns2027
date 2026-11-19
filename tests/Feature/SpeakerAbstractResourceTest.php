<?php

use App\Filament\Resources\SpeakerAbstractResource\Pages\CreateSpeakerAbstract;
use App\Filament\Resources\SpeakerAbstractResource\Pages\EditSpeakerAbstract;
use App\Filament\Resources\SpeakerAbstractResource\Pages\ListSpeakerAbstracts;
use App\Models\SpeakerAbstract;
use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

beforeEach(function () {
    config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:']);
    DB::purge('sqlite');

    foreach ([
        '0001_01_01_000000_create_users_table.php',
        '2026_11_19_153458_create_speaker_abstracts_table.php',
    ] as $migration) {
        (require database_path('migrations/'.$migration))->up();
    }

    Storage::fake('public');
    Filament::setCurrentPanel(Filament::getPanel('admin'));
    $this->actingAs(User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => 'password']));
});

it('accepts supported abstract files and rejects other types', function (string $filename, bool $valid) {
    $component = Livewire::test(CreateSpeakerAbstract::class)
        ->fillForm([
            'title' => 'Dr.',
            'full_name' => 'Jane Doe',
            'country' => 'Indonesia',
            'institution' => 'Hospital',
            'email' => 'jane@example.com',
            'consent' => true,
        ])
        ->set('data.files', [UploadedFile::fake()->create($filename, 10)])
        ->call('create');

    if ($valid) {
        $component->assertHasNoFormErrors();
        $file = SpeakerAbstract::firstOrFail()->files[0];
        expect($file['name'])->toBe($filename)
            ->and($file['path'])->toStartWith('SpeakerAbstract/');
        Storage::disk('public')->assertExists($file['path']);
    } else {
        $component->assertHasFormErrors(['files']);
        expect(SpeakerAbstract::count())->toBe(0);
    }
})->with([
    ['abstract.doc', true],
    ['abstract.docx', true],
    ['abstract.pdf', true],
    ['abstract.txt', false],
]);

it('opens and edits a public submission without losing file names', function () {
    Storage::disk('public')->put('SpeakerAbstract/first.pdf', 'first');
    Storage::disk('public')->put('SpeakerAbstract/second.pdf', 'second');
    $abstract = SpeakerAbstract::create([
        'title' => 'Dr.',
        'full_name' => 'Jane Doe',
        'country' => 'Indonesia',
        'institution' => 'Hospital',
        'email' => 'jane@example.com',
        'consent' => true,
        'files' => [
            ['path' => 'SpeakerAbstract/first.pdf', 'name' => 'original-first.pdf'],
            ['path' => 'SpeakerAbstract/second.pdf', 'name' => 'original-second.pdf'],
        ],
    ]);

    Livewire::test(ListSpeakerAbstracts::class)->assertSee('original-first.pdf');

    Livewire::test(EditSpeakerAbstract::class, ['record' => $abstract->getRouteKey()])
        ->assertFormSet(['title' => 'Dr.'])
        ->set('data.files', ['SpeakerAbstract/first.pdf'])
        ->set('data.files.new', UploadedFile::fake()->create('new.docx', 10))
        ->call('save')
        ->assertHasNoFormErrors();

    $files = $abstract->fresh()->files;
    expect($files)->toHaveCount(2)
        ->and($files[0])->toBe(['path' => 'SpeakerAbstract/first.pdf', 'name' => 'original-first.pdf'])
        ->and($files[1]['path'])->toStartWith('SpeakerAbstract/')
        ->and($files[1]['name'])->toBe('new.docx');
    Storage::disk('public')->assertExists($files[1]['path']);
});

it('preserves public form values and supports existing path-only files', function () {
    Storage::disk('public')->put('SpeakerAbstract/legacy.pdf', 'legacy');
    $abstract = SpeakerAbstract::create([
        'title' => 'Other',
        'title_other' => 'Surgeon',
        'full_name' => 'Jane Doe',
        'country' => 'Other country',
        'institution' => 'Hospital',
        'email' => 'jane@example.com',
        'consent' => true,
        'files' => ['SpeakerAbstract/legacy.pdf'],
    ]);

    Livewire::test(EditSpeakerAbstract::class, ['record' => $abstract->getRouteKey()])
        ->assertFormSet(['title' => 'Other', 'country' => 'Other country'])
        ->assertSee('value="Other"', false)
        ->call('save')
        ->assertHasNoFormErrors();

    expect($abstract->fresh()->files)->toBe([
        ['path' => 'SpeakerAbstract/legacy.pdf', 'name' => 'legacy.pdf'],
    ])->and($abstract->fresh()->title)->toBe('Other')
        ->and($abstract->fresh()->country)->toBe('Other country');
});
