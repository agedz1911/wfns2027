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
    public $developingCountries = [
        'Afghanistan',
        'Bangladesh',
        'Benin',
        'Bhutan',
        'Burkina Faso',
        'Burundi',
        'Cambodia',
        'Cameroon',
        'Central African Republic',
        'Chad',
        'Comoros',
        'Congo',
        'Democratic Republic of the Congo',
        "Republic of Cote d'Ivoire",
        'Djibouti',
        'Eritrea',
        'Ethiopia',
        'Gambia, The',
        'Ghana',
        'Guinea',
        'Guinea-Bissau',
        'Haiti',
        'Honduras',
        'Kenya',
        'Kiribati',
        'Kyrgyz Republic',
        'Lao P.D.R.',
        'Lesotho',
        'Liberia',
        'Madagascar',
        'Malawi',
        'Mali',
        'Mauritania',
        'Moldova',
        'Mozambique',
        'Myanmar',
        'Nepal',
        'Nicaragua',
        'Niger',
        'Nigeria',
        'Papua New Guinea',
        'Rwanda',
        'Sao Tome and Principe',
        'Senegal',
        'Sierra Leone',
        'Solomon Islands',
        'South Sudan',
        'Somalia',
        'Sudan',
        'Tajikistan',
        'Tanzania',
        'Timor-Leste',
        'Togo',
        'Uganda',
        'Uzbekistan',
        'Yemen',
        'Zambia',
        'Zimbabwe',
    ];

    public function mount()
    {
        $this->regInfos = RegInfo::where('is_active', true)->orderBy('no_urut', 'asc')->get();
        $this->developingCountries = collect($this->developingCountries)->map(function ($country) {
            return strtolower($country);
        })->toArray();
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
