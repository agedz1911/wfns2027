<?php

namespace App\Livewire\Pages;

use App\Models\Flyer;
use App\Models\RunningText;
use App\Models\Sponsor;
use App\Models\WelcomeMessage;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('WSSFN 2027')]
class HomePage extends Component
{
    public function render()
    {
        $welcomeMessages = WelcomeMessage::where('is_Active', true)->orderBy('no_urut', 'asc')->get();
        $sponsors = Sponsor::where('is_Active', true)->orderBy('company', 'asc')->take(10)->get();
        return view('livewire.pages.home-page', [
            'sponsors' => $sponsors,
            'welcomeMessages' => $welcomeMessages
        ]);
    }
}
