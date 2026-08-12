<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('About INS - WFNS 2027')]
class AboutIns extends Component
{
    public function render()
    {
        return view('livewire.pages.about-ins');
    }
}
