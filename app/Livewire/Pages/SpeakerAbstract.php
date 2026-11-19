<?php

namespace App\Livewire\Pages;

use App\Mail\SpeakerAbstractSubmitted;
use App\Models\SpeakerAbstract as SpeakerAbstractModel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Submission Invited Abstract - WFNS 2027')]
#[Layout('components.layouts.index')]
class SpeakerAbstract extends Component
{
    use WithFileUploads;

    public string $title = '';
    public ?string $title_other = null;
    public string $full_name = '';
    public string $country = '';
    public string $institution = '';
    public string $email = '';
    public string $lecture_title = '';

    public array $files = [null];

    public bool $consent = false;
    public bool $submitted = false;
    public bool $emailFailed = false;

    public function getTitleWordCountProperty(): int
    {
        $t = trim($this->lecture_title);

        return $t === '' ? 0 : count(preg_split('/\s+/', $t));
    }

    protected function rules(): array
    {
        return [
            'title' => 'required|in:Prof.,Dr.,Mr.,Ms.,Other',
            'title_other' => 'required_if:title,Other|nullable|string|max:50',
            'full_name' => 'required|string|max:255',
            'country' => ['required', 'string', 'max:255', Rule::in($this->countryOptions())],
            'institution' => 'required|string|max:255',
            'email' => 'required|email|max:255',
           
            'files' => 'required|array',
            'files.0' => 'required',
            'files.*' => 'nullable|file|mimes:doc,docx,pdf|max:5120',
            'consent' => 'accepted',
        ];
    }

    protected function validationAttributes(): array
    {
        return [
            'files.0' => 'abstract file 1',
            'files.*' => 'abstract file',
        ];
    }

    public function updated($property): void
    {
        if (! str_starts_with($property, 'files')) {
            $this->validateOnly($property);
        }
    }

    public function addFile(): void
    {
        $this->files[] = null;
    }

    public function removeFile(int $i): void
    {
        $this->files[$i] = null;
        $this->resetValidation("files.$i");
    }

    public function save(): void
    {
        $this->validate();

        $stored = collect($this->files)->filter()->map(fn ($f) => [
            'path' => $f->store('SpeakerAbstract', 'public'),
            'name' => $f->getClientOriginalName(),
        ])->values()->all();

        SpeakerAbstractModel::create([
            'title' => $this->title,
            'title_other' => $this->title === 'Other' ? $this->title_other : null,
            'full_name' => $this->full_name,
            'country' => $this->country,
            'institution' => $this->institution,
            'email' => $this->email,
            
            'files' => $stored,
            'consent' => true,
            'consented_at' => now(),
        ]);

        $this->submitted = true;

        try {
            Mail::to($this->email)->send(new SpeakerAbstractSubmitted($this->full_name));
        } catch (\Throwable $exception) {
            report($exception);
            $this->emailFailed = true;
        }
    }

    public function render()
    {
        return view('livewire.pages.speaker-abstract', [
            'countries' => $this->countryOptions(),
        ]);
    }

    private function countryOptions(): array
    {
        return collect(countries())
            ->pluck('name')
            ->sort(SORT_NATURAL | SORT_FLAG_CASE)
            ->values()
            ->all();
    }
}
