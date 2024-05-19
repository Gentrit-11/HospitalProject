<?php

namespace App\Http\Livewire;
use App\Models\Doctor;

use Livewire\Component;

class DoctorSearch extends Component
{
    public $search="";

    public function render()
    {
        $doctor = Doctor::where('name', 'like', '%' . $this->search . '%')->get();


         return view('livewire.doctor-search', [
            'doctors' => $doctor
        ]);
    }
}
