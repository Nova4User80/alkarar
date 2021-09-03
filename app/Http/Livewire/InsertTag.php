<?php

namespace App\Http\Livewire;

use Spatie\Tags\Tag;
use Livewire\Component;
use App\Models\TaskStone;


class InsertTag extends Component
{
    public  $name;
    public function render()
    {
        return view('livewire.insert-tag');
    }
    public function insert()
    {
        Tag::create([
            'name'=>$this->name
        ]);
        TaskStone::create([
            'by' => auth()->user()->name,
            'action' => 'has create new tag with name => '. $this->name,
        ]);
        return redirect('/tags');
    }

}
