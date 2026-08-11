<?php

namespace App\Livewire\Pages;

use App\Models\WelcomeMessage as ModelsWelcomeMessage;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Welcome Message - WFNS 2027')]

class WelcomeMessage extends Component
{
    public function render()
    {
        $messages = ModelsWelcomeMessage::where('is_active', true)->orderby('no_urut', 'asc')->get();
        return view('livewire.pages.welcome-message', ['messages' => $messages]);
    }
}
