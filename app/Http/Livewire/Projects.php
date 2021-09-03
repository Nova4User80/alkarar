<?php

namespace App\Http\Livewire;



use App\Models\Project;
use Livewire\Component;



class Projects extends Component
{
    public function render()
    {
        return view('livewire.projects',['projects'=>Project::all()]);
    }

}
