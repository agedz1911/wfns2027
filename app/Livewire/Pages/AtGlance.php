<?php

namespace App\Livewire\Pages;

use App\Models\ScheduleSession;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Program at Glance - WFNS 2027')]
class AtGlance extends Component
{
    public $atglances;

    public $enambelas;
    public $tujuhbelas;
    public $delapanbelas;
    public $sembilanbelas;
    public $duapuluh;

    public $downloads;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->atglances = ScheduleSession::with('schedules')->get();

        $this->enambelas = $this->atglances->where('date', '2027-11-16')->sortBy('no_urut');
        $this->tujuhbelas = $this->atglances->where('date', '2027-11-17')->sortBy('no_urut');
        $this->delapanbelas = $this->atglances->where('date', '2027-11-18')->sortBy('no_urut');
        $this->sembilanbelas = $this->atglances->where('date', '2027-11-19')->sortBy('no_urut');
        $this->duapuluh = $this->atglances->where('date', '2027-11-20')->sortBy('no_urut');

        $this->downloads = \App\Models\DownloadSchedule::all();
    }

    private function scheduleDays(): array
    {
        $days = [
            ['date' => '2027-11-16', 'label' => '16 November', 'sessions' => $this->enambelas],
            ['date' => '2027-11-17', 'label' => '17 November', 'sessions' => $this->tujuhbelas],
            ['date' => '2027-11-18', 'label' => '18 November', 'sessions' => $this->delapanbelas],
            ['date' => '2027-11-19', 'label' => '19 November', 'sessions' => $this->sembilanbelas],
            ['date' => '2027-11-20', 'label' => '20 November', 'sessions' => $this->duapuluh],
        ];

        return array_map(function ($day) {
            $rooms = $day['sessions']
                ->map(fn ($session) => filled($session->room) ? $session->room : 'Unassigned')
                ->unique()
                ->sort(fn ($left, $right) => strnatcasecmp($left, $right))
                ->values();

            $timeSlots = $day['sessions']->groupBy('time')->map(function ($sessions, $time) use ($rooms) {
                return [
                    'time' => $time,
                    'rooms' => $rooms->map(fn ($room) => [
                        'name' => $room,
                        'sessions' => $sessions
                            ->filter(fn ($session) => (filled($session->room) ? $session->room : 'Unassigned') === $room)
                            ->values(),
                    ]),
                ];
            })->values();

            return [...$day, 'rooms' => $rooms, 'timeSlots' => $timeSlots];
        }, $days);
    }

    public function render()
    {
        return view('livewire.pages.at-glance', [
            'days' => $this->scheduleDays(),
        ]);
    }
}
