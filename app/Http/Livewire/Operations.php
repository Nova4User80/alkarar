<?php

namespace App\Http\Livewire;

use App\Imports\EmployeeImport;
use App\Models\Employee;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Tags\Tag;

class Operations extends Component
{
    use WithFileUploads;
    public $attFile;
    public $empFile;
    public $selectProject;
    public $useDefaults;
    public $closeAlerts;
    public function render()
    {
        return view('livewire.operations', ['projects' => Project::all()]);
    }
    public function ua()
    {
        ini_set('max_execution_time', 60000);
     //   dd($this->selectProject);
        $employees = Project::find(intval($this->selectProject))->employeesPivot;

        // dd($employees);
        $array = Excel::toArray(new EmployeeImport, $this->attFile)[0];
        //sort($array);
        $users = [];
        $alerts = [];

        $auth_user = auth()->user();

        foreach ($employees as $e) {
            foreach ($array as $u) {
                //     dd('find match ' .$e->pivot->uid.' with '.$e->id .' / ' .$u['id']);
                if ($e->pivot->fid != null) {
                    if ($e->pivot->fid == $u['id']) {

                        if (isset($e->record[$this->year($u['date'])][$this->month($u['date'])][
                            $this->day($u['date'])])) {
                            array_push($alerts, [
                                'user_id' => $auth_user->id,
                                'employee_id' => $u['id'],
                                'msg' => 'Duplicate Intriy for ' . $u['name'],
                            ]);
                        }

                        $users[$u['id']][$this->year($u['date'])][$this->month($u['date'])][
                            $this->day($u['date'])] = [
                            'in' => !ctype_space($u['in']) ? \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($u['in'])->format('h:i A') : null,
                            'out' => !ctype_space($u['out']) ? \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($u['out'])->format('h:i A') : null,

                        ];

                    }
                }

            }

        }
        // dd($users);
        //dd($users);//for ($i =0 ; $i<count($users);$i++) {
        $atts = array();
        $ids = array();
        foreach ($employees as $e) {
            foreach ($users as $k => $val) {
                if ($k == $e->id) {

                    array_push($atts, [
                        'userid' => $e->id,
                        'record' => json_encode($val),
                        'name' => $e->name,
                    ]);
                    array_push($ids, $e->id);
                }

            }
        }

        Employee::upsert($atts, ['userid'], ['record']);
      // DB::table('employees')->upsert($atts, ['userid'],['record']);
        // Employee::whereIn('id', $ids)->update($atts);
        DB::table('alerts')->insert($alerts);
        return redirect('employees');

    }

    public function month($date)
    {
        return intval(date("m", strtotime($this->replace_str($date))));
    }
    public function year($date)
    {
        return date("Y", strtotime($this->replace_str($date)));
    }
    public function day($date)
    {
        return intval(date("d", strtotime($this->replace_str($date))));
    }
    public function replace_str($date)
    {
        return str_replace('-', '/', $date);
    }
    //add employees from excel
    public function ea()
    {
        ini_set('max_execution_time', 60000);
        $make = [];
        $array = Excel::toArray(new EmployeeImport, $this->empFile)[0];
        sort($array);

        foreach ($array as $u) {
            if ($u['name'] != null) {
                array_push($make, [
                    'userid' => $u['id'],
                    'name' => $u['name'],
                ]);
            }

        }
        Employee::insertOrIgnore($make);
        $this->makeTags(Excel::toArray(new EmployeeImport, $this->empFile)[0]);
        /* $employees = Employee::all();
        $make2 = [];
        foreach ($employees as $e) {

        array_push($make2, [
        'employee_id' => $e->id,
        ]);

        }*/
        // Att::insertOrIgnore($make2);
        return redirect('employees');
    }
    //add employees from excel & sync
    public function addWithIDs()
    {
        ini_set('max_execution_time', 60000);
        $make = [];
        $make2 = [];
        $array = Excel::toArray(new EmployeeImport, $this->empFile)[0];
        $project = $this->selectProject!= null ?Project::find($this->selectProject) :Project::find(1) ;
        sort($array);

        foreach ($array as $u) {
            if ($u['name'] != null) {
                array_push($make, [
                    'userid' => $u['id'],
                    //  'fid' => $u['fid'],
                    'name' => $u['name'],
                ]);
            }

        }


         $ie= Employee::insertOrIgnore($make);
         dd($ie);
        $userIds=[];

     foreach ($array as $u) {
            if ($u['name'] != null) {
                array_push($userIds, $u['id']);
            }
        }
        //dd($userIds);
        $us= Employee::whereIn('userid',$userIds)->get();

        foreach ($array as $u) {
            if ($u['name'] != null) {
                foreach($us as $i){
                   if($i->userid == $u['id']){
                    array_push($make2, [
                        'id' => $i->id,
                        'fid' => $u['fid'],
                    ]);
                   }
                }

            }
        }
        $s = [];

        foreach ($make2 as $k) {
            $s[$k['id']] = ['fid' => $k['fid']];
        }
        // dd($make2);
        $project->employees()->syncWithoutDetaching($s);
        $this->makeTags(Excel::toArray(new EmployeeImport, $this->empFile)[0]);
        return redirect('employees');
    }
    public function makeTags($arr)
    {
        ini_set('max_execution_time', 60000);
        $employeesAll = Employee::all();
        foreach ($employeesAll as $e) {
            foreach ($arr as $u) {
                if ($u['id'] == $e->userid) {
                    if ($u['dep'] != null) {
                        $tag = Tag::findOrCreateFromString($u['dep']);
                        $e->attachTag($tag);
                      /*  if ($tag == null) {
                            $tag = new Tag;
                            $tag->name = $u['dep'];
                            $tag->save();
                            $tag = Tag::find($u['dep']);

                        } else {
                            $e->tags()->sync($tag->name, ['name' => $tag]);
                        }*/
                    }}

            }
        }

    }

}
