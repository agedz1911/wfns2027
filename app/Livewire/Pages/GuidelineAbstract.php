<?php

namespace App\Livewire\Pages;

use App\Models\GuidelineAbstract as ModelsGuidelineAbstract;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Submission - WFNS 2027')]
class GuidelineAbstract extends Component
{
    public function render()
    {
        $guidelineAbstracts = ModelsGuidelineAbstract::where('category', 'Free Paper')->orderBy('no_urut', 'asc')->get();
        $guidelineVideos = ModelsGuidelineAbstract::where('category', 'Abstract Video')->orderBy('no_urut', 'asc')->get();
        $eduvideos = ModelsGuidelineAbstract::where('category', 'Educative Video')->orderBy('no_urut', 'asc')->get();
        return view('livewire.pages.guideline-abstract', ['guidelineAbstracts' => $guidelineAbstracts, 'guidelineVideos' => $guidelineVideos, 'eduvideos' => $eduvideos]);
    }
}
