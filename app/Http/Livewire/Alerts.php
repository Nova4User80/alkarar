<?php

namespace App\Http\Livewire;

use App\Models\Alert;
use Livewire\Component;
use Livewire\WithPagination;
class Alerts extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.alerts',['alerts'=>Alert::paginate(10)]);
    }
}
