<?php

namespace App\Livewire\Pages;

use App\Models\Faculty as ModelsFaculty;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Faculties - WSSFN 2027')]
class Faculty extends Component
{
    public $searchTerm = "";
    public $readyToLoad = false;

    public function loadFaculties()
    {
        $this->readyToLoad = true;
    }

    public function render()
    {
        if (!$this->readyToLoad) {
            return view('livewire.pages.faculty', [
                'indofaculties' => collect(),
                'foreignfaculties' => collect(),
                'readyToLoad' => $this->readyToLoad,
            ]);
        }

        // $indofaculties = ModelsFaculty::where('is_active', true)->where('country', 'indonesia')->with('schedules')->orderBy('name', 'asc')->get();
        // $foreignfaculties = ModelsFaculty::where('is_active', true)->where('country', '!=', 'indonesia')->with('schedules')->orderBy('name', 'asc')->get();
        $queryIndo = ModelsFaculty::where('is_active', true)->orderBy('no_urut', 'asc')->with('schedules')->where('country', 'Indonesia');
        $queryForeign = ModelsFaculty::where('is_active', true)->orderBy('no_urut', 'asc')->with('schedules')->where('country', '!=', 'Indonesia');
        if (strlen($this->searchTerm) >= 3) {
            $queryIndo->where(function ($q) {
                $q->where('name', 'like', '%' . $this->searchTerm . '%');
            });
        }
        if (strlen($this->searchTerm) >= 3) {
            $queryForeign->where(function ($q) {
                $q->where('name', 'like', '%' . $this->searchTerm . '%');
            });
        }
        $indofaculties = $queryIndo
            ->orderBy('name', 'asc')
            ->get();

        $foreignfaculties = $queryForeign
            ->orderBy('name', 'asc')
            ->get();

        return view('livewire.pages.faculty', [
            'indofaculties' => $indofaculties,
            'foreignfaculties' => $foreignfaculties,
            'readyToLoad' => $this->readyToLoad,
        ]);
    }
}
