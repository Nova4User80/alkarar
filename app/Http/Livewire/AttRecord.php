<?php

namespace App\Http\Livewire;


use App\Models\Employee;
use Livewire\Component;
use Livewire\WithPagination;

class AttRecord extends Component
{
    //use WithPagination;
    private $uid;
    public $month = 5;
    public $year = 2021;
    public function mount($id)
    {
        $this->uid = $id;
    }
    public function render()
    {
        $emp = Employee::find($this->uid);
        if ($emp != null) {
            $at = $emp->record[$this->year][$this->month];
        }

        return view('livewire.att-record', ['atts' => $at]);
    }
}
