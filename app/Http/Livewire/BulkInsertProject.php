<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Exception;
use Livewire\Component;
use App\Models\Employee;

class BulkInsertProject extends Component
{
    public $project;
    public $arr = [];
    public function mount($id)
    {
        $this->project = Project::find($id);
        //  dd(  $this->project->employeesPivot);
    }
    public function render()
    {
      //  dd(Employee::with('projectsPivot')->get());
        return view('livewire.bulk-insert-project',[
                'emps' => Employee::with('projectsPivot')->get()]
        );
    }
    public function done()
    {
        $s = [];
        //   dd($this->arr);
        //if (!$this->array_has_dupes($this->arr)) {
        foreach ($this->arr as $k => $v) {
            //integer id because finger print depend on it
            $s[$k] = ['fid' => intval($v)];
            /*   array_push(
                $s,[$k=>['uid' => intval($v)]]
             //   ['uid' => intval($v), 'employee_id' => $k, 'project_id' =>  $this->project->id]
            );*/
        }
        $this->project->employees()->sync($s);
        return redirect('projects');
        //   }
        throw new Exception;
    }
    function array_has_dupes($array)
    {
        // streamline per @Felix
        return count($array) !== count(array_unique($array));
    }
}
