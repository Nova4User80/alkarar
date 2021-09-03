<?php

namespace App\Http\Livewire;

use App\Exports\AttExport;
use App\Models\Employee;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Tags\Tag;

class AttTable extends Component
{
    use WithPagination;
    public $month = 5;
    public $year = 2021;
    public $sections = 31;
    public $searchTerm;
    public $selectedTags = [];


    public function query()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        // $emps =null;

        if (!empty($this->selectedTags)) {

            return Employee::withAnyTags($this->selectedTags)->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm)
                    ->orWhere('userid', 'like', $searchTerm);
            })->paginate(5);
        } else {
            return Employee::where('name', 'like', $searchTerm)
                ->OrWhere('userid', 'like', $searchTerm)->paginate(5);
        }

        // return $emps;
    }
    /*public function updatedSelectedTags($value)
    {

    //   array_push($this->arr,$value[0]);
    // dd($this->query());
    //   dd($e);
    dd($this->selectedTags);
    }*/

    public function render()
    {

        return view('livewire.att-table', [
            'emps' => $this->query(),
            'tags' => Tag::all(),
        ]);

    }

    public function todayAtt()
    {
        return redirect('todayatt');
    }
    public function export()
    {

        $searchTerm = '%' . $this->searchTerm . '%';
        $emps = null;
        if (!empty($this->selectedTags)) {
            $emps = Employee::withAnyTags($this->selectedTags)->where('name', 'like', $searchTerm)->OrWhere('userid', 'like', $searchTerm)->get();
        } else {
            $emps = Employee::where('name', 'like', $searchTerm)->OrWhere('userid', 'like', $searchTerm)->get();
        }
        return Excel::download(new AttExport($this->year, $this->month, $this->sections, $emps), 'Attendances.xlsx');
    }

}
