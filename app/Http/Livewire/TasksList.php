<?php

namespace App\Http\Livewire;

use App\Models\TaskStone;
use Livewire\Component;

class TasksList extends Component
{
    public function render()
    {
        return view('livewire.tasks-list',['tasks'=>TaskStone::paginate(6)]);
    }
}
