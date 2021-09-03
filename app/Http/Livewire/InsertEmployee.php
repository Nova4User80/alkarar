<?php

namespace App\Http\Livewire;

use Spatie\Tags\Tag;
use App\Models\Project;
use Livewire\Component;
use App\Models\Employee;
use App\Models\TaskStone;
use Illuminate\Support\Facades\DB;

class InsertEmployee extends Component
{
    public $name;
    public $salary;
    public $did;
    public $selectTags = [];
    public $selectProj = [];
    public function render()
    {
        return view('livewire.insert-employee', ['tags' => Tag::all(), 'proj' => Project::all()]);
    }
    public function insert()
    {
        $a = new Employee();
        $a->name = $this->name;
        $a->salary = $this->salary;
        $a->userid = $this->did;
        $a->save();

        $a->attachTags($this->selectTags);

        foreach ($this->selectProj as $k => $v) {
            if ( !is_null($v)) {

                // wrong $emp = Project::find($k)->employees()->where('fid', '=', $v);
                $emp = DB::table('employee_project')->where('fid', '=', $v)->where('project_id', '=', $k)->first();

                $pr = Project::find($k);

                if ($emp == null) {
                    $s = [];
                    $s[$a->id] = ['fid' => intval($v)];
                    $pr->employees()->attach($s);
                } else {
                    $a->delete();
                    dd(' Error there is a user with this id => ' . $v . ' , in project ' . $pr->name);
                }}
        }
        TaskStone::create([
            'by' => auth()->user()->name,
            'action' => 'has create new Employee with name : [ '. $this->name .'] ||
            userid : ['. $this->userid.'] || with tags => {'.$this->selectTags.'}',
        ]);
        return redirect('/employees');
    }

}
