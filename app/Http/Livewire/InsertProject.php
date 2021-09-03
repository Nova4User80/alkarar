<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;
use App\Models\TaskStone;


class InsertProject extends Component
{
    public  $name;
    public function render()
    {
        return view('livewire.insert-project');
    }
    public function insert()
    {
        Project::create([
            'name'=>$this->name
        ]);
        TaskStone::create([
            'by' => auth()->user()->name,
            'action' => 'has create new project with name => '. $this->name,
        ]);
        return redirect('/projects');
    }

}
