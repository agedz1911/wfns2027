<?php

namespace App\Livewire\Pages;

use App\Models\RegInfo;
use App\Models\Registration as ModelsRegistration;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Registration - WFNS 2027')]
class Registration extends Component
{
    public $regInfos;

    public function mount()
    {
        $this->regInfos = RegInfo::where('is_active', true)->orderBy('no_urut', 'asc')->get();
    }

    public function render()
    {
        $regLocals = ModelsRegistration::where('wilayah_reg', 'indonesia')->where('is_active', true)->get();
        $regForeigns = ModelsRegistration::where('wilayah_reg', 'foreign')->where('is_active', true)->get();
        $uniqueLocals = $regLocals->pluck('category_reg')->unique();
        $uniqueForeigns = $regForeigns->pluck('category_reg')->unique();
        return view('livewire.pages.registration', [
            'regInfos' => $this->regInfos, 
            'regLocals' => $regLocals, 
            'regForeigns' => $regForeigns,
            'uniqueLocals' => $uniqueLocals,
            'uniqueForeigns' => $uniqueForeigns,
        ]);
    }
}
