<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Visiting - WFNS 2027')]
class Visiting extends Component
{
    public $currentSlide = 1;
    public $totalSlides = 3;
    public $autoplayInterval = 5000;

    public function nextSlide()
    {
        $this->currentSlide = $this->currentSlide >= $this->totalSlides ? 1 : $this->currentSlide + 1;
    }

    public function previousSlide()
    {
        $this->currentSlide = $this->currentSlide <= 1 ? $this->totalSlides : $this->currentSlide - 1;
    }

    public function goToSlide($slide)
    {
        $this->currentSlide = $slide;
    }
    
    public function render()
    {
        return view('livewire.pages.visiting');
    }
}
