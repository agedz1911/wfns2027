<?php

namespace App\Livewire\Section;

use Livewire\Component;
use App\Models\Sponsor;

class CarouselSponsor extends Component
{
    public function render()
    {
        $sponsors = Sponsor::where('is_Active', true)->orderBy('no_urut', 'asc')->get();
        return view('livewire.section.carousel-sponsor', [
            'sponsors' => $sponsors
        ]);
    }
}
