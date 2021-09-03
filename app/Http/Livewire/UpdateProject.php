<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;
use App\Models\TaskStone;

class UpdateProject extends Component
{

    public $proj;
    public $name;

    public function mount($id)
    {
        $this->proj = Project::find($id);
    }

    public function render()
    {
        return view('livewire.update-project');
    }
    public function edit()
    {
        TaskStone::create([
            'by' => auth()->user()->name,
            'action' =>'has update project name from '.$this->proj->name.' to ' . $this->name,
        ]);
        $this->proj->update([
            'name' => $this->name,
        ]);

        return redirect('/projects');
    }
}
