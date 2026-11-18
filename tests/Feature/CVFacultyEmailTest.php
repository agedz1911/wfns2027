<?php

use App\Livewire\Pages\CVFaculty;
use App\Mail\CVFacultySubmitted;
use App\Models\CVFaculty as CVFacultyModel;
use App\Models\CVTeaching;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

beforeEach(function () {
    config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:']);
    DB::purge('sqlite');

    foreach ([
        '2026_11_18_145621_create_c_v_faculties_table.php',
        '2026_11_18_145712_create_c_v_teachings_table.php',
        '2026_11_18_145739_create_c_v_works_table.php',
    ] as $migration) {
        (require database_path('migrations/'.$migration))->up();
    }

    Storage::fake('public');
});

function facultySubmission(): array
{
    return [
        'full_name' => 'Dr. Jane Doe',
        'profession' => 'Neurosurgeon',
        'institution' => 'Example Hospital',
        'city' => 'Jakarta',
        'country' => 'Indonesia',
        'sex' => 'Female',
        'phone' => '+62 812 3456 7890',
        'email' => 'faculty@example.com',
        'teaching' => [[
            'year' => '2026',
            'event' => 'Congress',
            'country' => 'Indonesia',
            'role' => 'Speaker',
            'topic' => 'Neurosurgery',
        ]],
        'work' => [[
            'period' => '2020 - 2026',
            'position' => 'Neurosurgeon',
            'institution' => 'Example Hospital',
            'country' => 'Indonesia',
            'relevance' => 'Clinical experience',
        ]],
        'bio' => implode(' ', array_fill(0, 30, 'experience')),
        'photo' => UploadedFile::fake()->image('photo.jpg'),
        'consent' => true,
    ];
}

it('sends a confirmation to the faculty after saving the CV', function () {
    Mail::fake();

    Livewire::test(CVFaculty::class)
        ->set(facultySubmission())
        ->call('save')
        ->assertHasNoErrors()
        ->assertSet('submitted', true)
        ->assertSet('emailFailed', false);

    $faculty = CVFacultyModel::where('email', 'faculty@example.com')->firstOrFail();
    expect($faculty->cvTeachings()->count())->toBe(1)
        ->and($faculty->cvWorks()->count())->toBe(1)
        ->and($faculty->photo_path)->toStartWith('cv-faculty-photos/');
    Storage::disk('public')->assertExists($faculty->photo_path);

    Mail::assertSent(CVFacultySubmitted::class, function (CVFacultySubmitted $mail) {
        return $mail->hasTo('faculty@example.com') && $mail->fullName === 'Dr. Jane Doe';
    });
    Mail::assertSentCount(1);
});

it('does not send a confirmation when validation fails', function () {
    Mail::fake();
    $data = facultySubmission();
    $data['bio'] = 'Too short';

    Livewire::test(CVFaculty::class)
        ->set($data)
        ->call('save')
        ->assertHasErrors(['bio'])
        ->assertSet('submitted', false);

    expect(CVFacultyModel::count())->toBe(0);
    Mail::assertNothingSent();
});

it('does not send a confirmation when the CV transaction fails', function () {
    Mail::fake();
    CVTeaching::creating(function () {
        throw new RuntimeException('Unable to save teaching experience');
    });

    try {
        Livewire::test(CVFaculty::class)->set(facultySubmission())->call('save');
        $this->fail('The transaction should have failed.');
    } catch (RuntimeException $exception) {
        expect($exception->getMessage())->toBe('Unable to save teaching experience');
    } finally {
        CVTeaching::flushEventListeners();
    }

    expect(CVFacultyModel::count())->toBe(0);
    Mail::assertNothingSent();
});

it('keeps the saved CV and warns the faculty when sending fails', function () {
    Mail::shouldReceive('to')
        ->once()
        ->with('faculty@example.com')
        ->andThrow(new RuntimeException('Mail transport failed'));

    Livewire::test(CVFaculty::class)
        ->set(facultySubmission())
        ->call('save')
        ->assertHasNoErrors()
        ->assertSet('submitted', true)
        ->assertSet('emailFailed', true)
        ->assertSee('Your information was saved, but we could not send the confirmation email.');

    expect(CVFacultyModel::where('email', 'faculty@example.com')->count())->toBe(1);
});

it('renders a personalized and escaped confirmation email', function () {
    $mail = new CVFacultySubmitted('<Dr. Jane Doe>');

    $mail->assertHasSubject('Thank you for submitting your faculty CV - WFNS 2027');
    $mail->assertSeeInHtml('Dear <Dr. Jane Doe>');
    $mail->assertSeeInHtml('We have received your information successfully.');
});
