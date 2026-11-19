<?php

use App\Livewire\Pages\SpeakerAbstract;
use App\Mail\SpeakerAbstractSubmitted;
use App\Models\SpeakerAbstract as SpeakerAbstractModel;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

beforeEach(function () {
    config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:']);
    DB::purge('sqlite');
    (require database_path('migrations/2026_11_19_153458_create_speaker_abstracts_table.php'))->up();
    Storage::fake('public');
});

function speakerAbstractData(): array
{
    return [
        'title' => 'Dr.',
        'full_name' => 'Jane Doe',
        'country' => 'Indonesia',
        'institution' => 'Hospital',
        'email' => 'jane@example.com',
        'consent' => true,
    ];
}

it('offers countries from the country list and rejects invalid selections', function (string $country, string $rule) {
    Mail::fake();
    Livewire::test(SpeakerAbstract::class)
        ->assertSee('<select wire:model.blur="country"', false)
        ->assertSee('<option value="">Select a country</option>', false)
        ->assertSee('<option value="Indonesia">Indonesia</option>', false)
        ->set(speakerAbstractData())
        ->set('files.0', UploadedFile::fake()->create('abstract.pdf', 10, 'application/pdf'))
        ->set('country', $country)
        ->call('save')
        ->assertHasErrors(['country' => $rule]);

    expect(SpeakerAbstractModel::count())->toBe(0);
    Mail::assertNothingSent();
})->with([
    ['', 'required'],
    ['Not a country', 'in'],
]);

it('starts with one file input and adds and saves more than three files', function () {
    Mail::fake();
    $component = Livewire::test(SpeakerAbstract::class)
        ->assertSee('Abstract File 1')
        ->assertSee('max. 5 MB each')
        ->assertDontSee('window.location.reload()', false)
        ->assertDontSee('Abstract File 2');

    foreach (range(2, 5) as $number) {
        $component->call('addFile')->assertSee("Abstract File $number");
    }

    foreach (range(1, 4) as $number) {
        $component->set('files.'.($number - 1), UploadedFile::fake()->create("abstract-$number.pdf", $number === 4 ? 5120 : 10, 'application/pdf'));
    }

    $component->set(speakerAbstractData())
        ->call('save')
        ->assertHasNoErrors()
        ->assertSet('emailFailed', false)
        ->assertSee('Your abstract files have been submitted successfully.')
        ->assertSee('setTimeout(() => window.location.reload(), 10000)', false)
        ->assertDontSee('WFNS 2027 Invited Speaker Abstract Form');

    Mail::assertSent(SpeakerAbstractSubmitted::class, fn (SpeakerAbstractSubmitted $mail) =>
        $mail->hasTo('jane@example.com') && $mail->fullName === 'Jane Doe'
    );
    Mail::assertSentCount(1);

    $abstract = SpeakerAbstractModel::firstOrFail();
    expect($abstract->country)->toBe('Indonesia');
    $stored = $abstract->files;
    expect(array_column($stored, 'name'))->toBe([
        'abstract-1.pdf', 'abstract-2.pdf', 'abstract-3.pdf', 'abstract-4.pdf',
    ]);
    foreach ($stored as $file) {
        expect($file['path'])->toStartWith('SpeakerAbstract/');
        Storage::disk('public')->assertExists($file['path']);
    }
});

it('requires the first file even after it is removed', function () {
    Mail::fake();
    Livewire::test(SpeakerAbstract::class)
        ->set(speakerAbstractData())
        ->set('files.0', UploadedFile::fake()->create('abstract.pdf', 10, 'application/pdf'))
        ->call('removeFile', 0)
        ->call('addFile')
        ->set('files.1', UploadedFile::fake()->create('second.pdf', 10, 'application/pdf'))
        ->call('save')
        ->assertHasErrors(['files.0' => 'required']);

    expect(SpeakerAbstractModel::count())->toBe(0);
    Mail::assertNothingSent();
});

it('keeps the saved submission and warns when the confirmation email fails', function () {
    Mail::shouldReceive('to')
        ->once()
        ->with('jane@example.com')
        ->andThrow(new RuntimeException('Mail transport failed'));

    Livewire::test(SpeakerAbstract::class)
        ->set(speakerAbstractData())
        ->set('files.0', UploadedFile::fake()->create('abstract.pdf', 10, 'application/pdf'))
        ->call('save')
        ->assertHasNoErrors()
        ->assertSet('submitted', true)
        ->assertSet('emailFailed', true)
        ->assertSee('Your abstract was saved, but we could not send the confirmation email.');

    expect(SpeakerAbstractModel::where('email', 'jane@example.com')->count())->toBe(1);
});

it('renders a personalized confirmation email', function () {
    $mail = new SpeakerAbstractSubmitted('<Jane Doe>');

    $mail->assertHasSubject('Thank you for submitting your speaker abstract - WFNS 2027');
    $mail->assertSeeInHtml('Dear <Jane Doe>');
    $mail->assertSeeInHtml('We have received your submission successfully.');
});

it('validates the type and size of files added beyond the third slot', function () {
    $component = Livewire::test(SpeakerAbstract::class)->set(speakerAbstractData());
    foreach (range(1, 3) as $number) {
        $component->call('addFile');
    }

    $component->set('files.0', UploadedFile::fake()->create('first.pdf', 10, 'application/pdf'))
        ->set('files.3', UploadedFile::fake()->create('invalid.txt', 10, 'text/plain'))
        ->call('save')
        ->assertHasErrors(['files.3' => 'mimes'])
        ->set('files.3', UploadedFile::fake()->create('large.pdf', 5121, 'application/pdf'))
        ->call('save')
        ->assertHasErrors(['files.3' => 'max']);

    expect(SpeakerAbstractModel::count())->toBe(0);
});
