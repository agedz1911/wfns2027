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

    public $delapan;
    public $sembilan;
    public $sepuluh;
    public $sebelas;

    public $search = '';

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

        $this->delapan = $this->atglances->where('date', '2026-11-12')->sortBy('no_urut');
        $this->sembilan = $this->atglances->where('date', '2026-11-13')->sortBy('no_urut');
        $this->sepuluh = $this->atglances->where('date', '2026-11-14')->sortBy('no_urut');
        $this->sebelas = $this->atglances->where('date', '2026-11-15')->sortBy('no_urut');
    }

    public function render()
    {
        return view('livewire.pages.at-glance');
    }
}
