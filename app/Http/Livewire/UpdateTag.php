<?php

namespace App\Http\Livewire;

use Spatie\Tags\Tag;
use Livewire\Component;
use App\Models\TaskStone;

class UpdateTag extends Component
{
    public $name;
    public $tag;

    public function mount($name)
    {
        $this->name = $name;
        $this->tag = Tag::findFromString($name);

    }

    public function render()
    {
        return view('livewire.update-tag');
    }
    public function edit()
    {
        TaskStone::create([
            'by' => auth()->user()->name,
            'action' =>'has update tage name from '.$this->tag->name.' to ' . $this->name,
        ]);

        $this->tag->update([
            'name' => $this->name,
        ]);

        return redirect('/tags');
    }
}
