<?php

namespace App\Livewire\Pages;

use App\Models\atGlance as ModelsAtGlance;
use App\Models\ScheduleSession;
use App\Models\Time;
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

    public $search = '';

    public function resetSearch()
    {
        $this->search = '';
    }

    public function mount()
    {
        $this->loadData();
    }

    public function updatedSearch()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $query = ScheduleSession::with('schedules');

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('title_ses', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('moderator', 'LIKE', '%' . $this->search . '%');
            })->orWhereHas('schedules', function ($q) {
                $q->where('topic_title', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('speaker', 'LIKE', '%' . $this->search . '%');
            });
        }

        $this->atglances = $query->get();

        $this->enambelas = $this->atglances->where('date', '2027-11-16')->sortBy('no_urut');
        $this->tujuhbelas = $this->atglances->where('date', '2027-11-17')->sortBy('no_urut');
        $this->delapanbelas = $this->atglances->where('date', '2027-11-18')->sortBy('no_urut');
        $this->sembilanbelas = $this->atglances->where('date', '2027-11-19')->sortBy('no_urut');
        $this->duapuluh = $this->atglances->where('date', '2027-11-20')->sortBy('no_urut');
    }

    public function render()
    {
        return view('livewire.pages.at-glance');
    }
}
