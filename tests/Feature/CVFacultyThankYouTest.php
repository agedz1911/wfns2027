<?php

use App\Livewire\Pages\CVFaculty;
use Livewire\Livewire;

it('reloads the form ten seconds after the thank-you message appears', function () {
    Livewire::test(CVFaculty::class)
        ->assertSee('Faculty Short Bio / CV Form')
        ->assertDontSee('window.location.reload()', false)
        ->set('submitted', true)
        ->assertSee('Thank you!')
        ->assertSee('setTimeout(() => window.location.reload(), 10000)', false)
        ->assertDontSee('Faculty Short Bio / CV Form');
});
