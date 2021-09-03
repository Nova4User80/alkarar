<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

//use PhpOffice\PhpSpreadsheet\Shared\Date;

class Employees extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $attFile;
    public $empFile;
    public $selectProject;

    public $withAlerts;
    public $searchTerm;
    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        return view('livewire.employees', [
            'employees' => Employee::with(['tags', 'projects'])
                ->where(function ($q) use ($searchTerm) {
                    $q->where('name', 'like', $searchTerm)
                        ->OrWhere('userid', 'like', $searchTerm);
                })->paginate(6), 'projects' => Project::all(),
        ]);
        //return view('livewire.employees', ['employees' => Employee::with('tag')->paginate(10)]);
    }
    //ua: update Attendance
    /*  public function ua()
{
ini_set('max_execution_time', 300);
//dd($this->selectProject);
$employees = Project::where('id', $this->selectProject)->first()->employeesPivot;
// dd($employees);
$array = Excel::toArray(new EmployeeImport, $this->attFile)[0];
//sort($array);
$users = [];
$alerts = [];

$auth_user = auth()->user()->name;

foreach ($employees as $e) {
foreach ($array as $u) {
if ($e->pivot->uid != null) {
if ($e->pivot->uid == $u['id']) {

if (isset($e->record[$this->year($u['date'])][$this->month($u['date'])][
$this->day($u['date'])])) {
array_push($alerts, [
'by' => $auth_user,
'msg' => 'Duplicate Intriy Due Bulk Inserting',
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
foreach ($employees as $e) {
foreach ($users as $k => $val) {
if ($k == $e->id) {

array_push($atts, [
'id' => $e->id,
'record' => $val,
'name' => $e->name,
]);

}

}
}
Employee::upsert($atts, ['id'], ['record']);
Alerts::insert($alerts);

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
$make = [];
$array = Excel::toArray(new EmployeeImport, $this->empFile)[0];
sort($array);

foreach ($array as $u) {
if ($u['name'] != null) {
array_push($make, [
'id' => $u['userid'],
'name' => $u['name'],
]);
}

}
$employees = Employee::doesntHave('att')->get();
Employee::insertOrIgnore($make);

$make2 = [];
foreach ($employees as $e) {

array_push($make2, [
'employee_id' => $e->id,
]);

}
// Att::insertOrIgnore($make2);
}*/

}
