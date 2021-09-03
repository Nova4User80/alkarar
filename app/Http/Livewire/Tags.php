<?php

namespace App\Http\Livewire;


use Spatie\Tags\Tag;
use Livewire\Component;
use Livewire\WithPagination;


class Tags extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.tags',['tags'=>Tag::paginate(5)]);
    }

}
