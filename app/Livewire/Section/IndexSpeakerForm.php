<?php

namespace App\Livewire\Section;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('WFNS 2027 Submission Abstract & CV')]
#[Layout('components.layouts.index')]
class IndexSpeakerForm extends Component
{
    public function render()
    {
        return view('livewire.section.index-speaker-form');
    }
}
