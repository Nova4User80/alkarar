<?php

namespace App\Http\Livewire;

use Spatie\Tags\Tag;
use App\Models\Project;
use Livewire\Component;
use App\Models\Employee;
use App\Models\TaskStone;
use App\Models\EmployeeProject;
use Illuminate\Support\Facades\DB;

class UpdateEmployee extends Component
{
    public $name;
    public $salary;
    public $eid;
    public $feid;
    public $selectTags = [];
    public $selectProj = [];
    public $preSelectedTags= [];
    public function mount($id)
    {
        $e = Employee::with('tags')->where('id', $id)->first();
        $this->name = $e->name;
        $this->feid = $e->id;
        $this->eid = $e->userid;
        $this->preSelectedTags=$e->tags;
        $e->tags->each(function ($item, $key) {
            array_push( $this->selectTags , $item->name);
        });

    }

    public function render()
    {

        $tags = Tag::all();
        $pre = $this->preSelectedTags;
        $action = $tags->diff($pre);

      //  $this->selectTags = array_merge($this->selectTags, $pre->toArray());

        return view('livewire.update-employee', ['tags' => $action,
         'proj' => Project::all(),'pres'=> $this->preSelectedTags]);
    }
    public function edit()
    {
        $e = Employee::find($this->feid);
        TaskStone::create([
            'by' => auth()->user()->name,
            'action' => 'has update  Employee with name : [ new : '. $this->name .' , old:'. $e->name .'  ] ||
            userid : [ new : '. $this->userid.' , old : '. $e->userid.' ] || with tags => {'.$this->selectTags.'}',
        ]);
        $e->name = $this->name;
        $e->salary = $this->salary;
        $e->userid = $this->eid;
        $e->save();
//dd($this->selectTags);
        $e->syncTags($this->selectTags);
        foreach ($this->selectProj as $k => $v) {
            if ( !is_null($v)) {

                // wrong $emp = Project::find($k)->employees()->where('fid', '=', $v);
                $emp = DB::table('employee_project')->where('fid', '=', $v)->where('project_id', '=', $k)->first();

                $pr = Project::find($k);


                if (DB::table('employee_project')->where('employee_id', '=', $e->id)->where('project_id', '=', $k)->first() != null) {
                          //delete becaus there is an old value
                          DB::table('employee_project')->where('employee_id', '=', $e->id)->where('project_id', '=', $k)->delete();
                }

                if ($emp == null) {
                    $s = [];
                    $s[$e->id] = ['fid' => intval($v)];
                    $pr->employees()->attach($s);
                } else {
                    $s = [];
                    $s[$e->id] = ['fid' => intval($v)];

                    $pr->employees()->attach($s);
                    dd(' Error there is a user with this id => ' . $v . ' , in project ' . $pr->name);
                }}
        }

        return redirect('/employees');
    }
}
