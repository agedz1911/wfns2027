<?php

use App\Http\Controllers\Api\AtGlanceController;
use App\Livewire\Pages\AseanRegion;
use App\Livewire\Pages\Accommodation;
use App\Livewire\Pages\AboutIns;
use App\Livewire\Pages\AboutWfns;
use App\Livewire\Pages\AtGlance;
use App\Livewire\Pages\Committee;
use App\Livewire\Pages\Faculty;
use App\Livewire\Pages\FreePaperSchedule;
use App\Livewire\Pages\GuidelineAbstract;
use App\Livewire\Pages\HomePage;
use App\Livewire\Pages\Registration;
use App\Livewire\Pages\Schedule;
use App\Livewire\Pages\Topic;
use App\Livewire\Pages\Visiting;
use App\Livewire\Pages\WelcomeMessage;
use App\Livewire\Section\Sponsor;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');
// Route::get('/welcome', function() {
//     return view('welcome');
// });
Route::get('/welcome-message', WelcomeMessage::class)->name('welcome-message');
Route::get('/organizing-committee', Committee::class)->name('organizing-committee');
Route::get('/program-at-glance', AtGlance::class)->name('program-at-glance');
Route::get('/scientific-schedule', Schedule::class)->name('scientific-schedule');
Route::get('/registration', Registration::class)->name('registration');
Route::get('/submission', GuidelineAbstract::class)->name('submission');
Route::get('/presentation-schedule', FreePaperSchedule::class)->name('presentation-schedule');
Route::get('/faculties', Faculty::class)->name('faculties');
Route::get('/accommodation', Accommodation::class)->name('accommodation');
Route::get('/sponsors', Sponsor::class)->name('sponsors');
Route::get('/visiting', Visiting::class)->name('visiting');
Route::get('/about-ins', AboutIns::class)->name('about-ins');
Route::get('/about-wfns', AboutWfns::class)->name('about-wfns');
Route::get('/wfns-congress-2027', AseanRegion::class)->name('wfns-congress-2027');
Route::get('/sponsorship', Sponsor::class)->name('sponsorship');