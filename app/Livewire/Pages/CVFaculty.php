<?php

namespace App\Livewire\Pages;

use App\Mail\CVFacultySubmitted;
use App\Models\CVFaculty as CVFacultyModel;
use App\Support\CVFacultyForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Submit Form CV Faculty - WFNS 2027')]
#[Layout('components.layouts.index')]
class CVFaculty extends Component
{
    use WithFileUploads;

    public const MAX_ENTRIES = CVFacultyForm::MAX_ENTRIES;

    // A. Personal data
    public string $full_name = '';

    public ?string $nik = null;

    public ?string $nip = null;

    public string $profession = '';

    public string $institution = '';

    public string $city = '';

    public string $country = '';

    public string $sex = '';

    public ?string $birth_place = null;

    public ?string $birth_date = null;

    public ?string $highest_education = null;

    public string $phone = '';

    public string $email = '';

    // B & C
    public array $teaching = [];

    public array $work = [];

    // D
    public string $bio = '';

    public $photo;

    public bool $consent = false;

    public bool $submitted = false;

    public bool $emailFailed = false;

    public function mount(): void
    {
        $this->addTeaching();
        $this->addWork();
    }

    public function addTeaching(): void
    {
        if (count($this->teaching) < self::MAX_ENTRIES) {
            $this->teaching[] = ['year' => '', 'event' => '', 'country' => '', 'role' => '', 'topic' => ''];
        }
    }

    public function removeTeaching(int $i): void
    {
        unset($this->teaching[$i]);
        $this->teaching = array_values($this->teaching);
    }

    public function addWork(): void
    {
        if (count($this->work) < self::MAX_ENTRIES) {
            $this->work[] = ['period' => '', 'position' => '', 'institution' => '', 'country' => '', 'relevance' => ''];
        }
    }

    public function removeWork(int $i): void
    {
        unset($this->work[$i]);
        $this->work = array_values($this->work);
    }

    public function getBioWordCountProperty(): int
    {
        $t = trim($this->bio);

        return $t === '' ? 0 : count(preg_split('/\s+/', $t));
    }

    protected function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'nik' => 'nullable|digits:16|unique:c_v_faculties,nik',
            'nip' => 'nullable|string|max:30',
            'profession' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => ['required', 'string', Rule::in($this->countryOptions())],
            'sex' => 'required|in:Male,Female',
            'birth_place' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date|before:today',
            'highest_education' => 'nullable|string|max:255',
            'phone' => ['required', 'regex:/^\+?[0-9\s\-]{8,20}$/'],
            'email' => 'required|email|max:255|unique:c_v_faculties,email',

            'teaching' => 'array|max:'.self::MAX_ENTRIES,
            'teaching.*.year' => 'required|digits:4|integer|between:1950,2035',
            'teaching.*.event' => 'required|string|max:255',
            'teaching.*.country' => ['required', 'string', Rule::in($this->countryOptions())],
            'teaching.*.role' => 'required|string|max:255',
            'teaching.*.topic' => 'required|string|max:255',

            'work' => 'array|max:'.self::MAX_ENTRIES,
            'work.*.period' => 'required|string|max:100',
            'work.*.position' => 'required|string|max:255',
            'work.*.institution' => 'required|string|max:255',
            'work.*.country' => ['required', 'string', Rule::in($this->countryOptions())],
            'work.*.relevance' => 'nullable|string|max:1000',

            'bio' => ['required', 'string', function ($attr, $value, $fail) {
                $n = $this->bioWordCount;
                if ($n < 30) {
                    $fail("The bio must be at least 30 words (currently {$n}).");
                }
            }],
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            'consent' => 'accepted',
        ];
    }

    protected function validationAttributes(): array
    {
        return [
            'teaching.*.year' => 'year',
            'teaching.*.event' => 'event or institution',
            'teaching.*.country' => 'country',
            'teaching.*.role' => 'role',
            'teaching.*.topic' => 'topic',
            'work.*.period' => 'period',
            'work.*.position' => 'position',
            'work.*.institution' => 'institution',
            'work.*.country' => 'country',
            'work.*.relevance' => 'relevance',
        ];
    }

    public function updated($property): void
    {
        if ($property !== 'bio' && ($property !== 'photo' || $this->photo)) {
            $this->validateOnly($property);
        }
    }

    public function save(): void
    {
        $data = $this->validate();

        DB::transaction(function () use ($data) {
            $profile = CVFacultyModel::create([
                ...collect($data)->only([
                    'full_name', 'nik', 'nip', 'profession', 'institution', 'city', 'country',
                    'sex', 'birth_place', 'birth_date', 'highest_education', 'phone', 'email', 'bio',
                ])->all(),
                'photo_path' => $this->photo->store('cv-faculty-photos', 'public'),
                'consent' => true,
                'consented_at' => now(),
            ]);

            foreach (array_values($this->teaching) as $i => $row) {
                $profile->cvTeachings()->create([...$row, 'sort_order' => $i]);
            }
            foreach (array_values($this->work) as $i => $row) {
                $profile->cvWorks()->create([...$row, 'sort_order' => $i]);
            }
        });

        $this->submitted = true;

        try {
            Mail::to($data['email'])->send(new CVFacultySubmitted($data['full_name']));
        } catch (\Throwable $exception) {
            report($exception);
            $this->emailFailed = true;
        }
    }

    public function render()
    {
        return view('livewire.pages.c-v-faculty', [
            'countries' => $this->countryOptions(),
        ]);
    }

    private function countryOptions(): array
    {
        return CVFacultyForm::countries();
    }
}
