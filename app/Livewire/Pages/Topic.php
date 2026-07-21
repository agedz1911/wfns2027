<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Topics - WSSFN 2027')]
class Topic extends Component
{
    public function render()
    {
        $topics = \App\Models\Topic::orderBy('no_urut', 'asc')->where('is_active', true)->get();
        $uniqueCategories = $topics->pluck('category')->unique();

        return view('livewire.pages.topic', [
            'topics' => $topics,
            'uniqueCategories' => $uniqueCategories,
        ]);
    }
}
