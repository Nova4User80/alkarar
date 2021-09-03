<?php

namespace App\Http\Livewire;


use DateTime;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;

class TodayAttendance extends Component
{
    use WithPagination;
    public $selected = [];
    public $searchTerm;
    public $timeIn;
    public $timeOut;
    protected $casts = [
        'timeIn' => 'datetime:H:i',
        'timeOut' => 'datetime:H:i',
      ];
      public function time($time)
      {
          return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(\PhpOffice\PhpSpreadsheet\Shared\Date::dateTimeToExcel(new DateTime($time)))->format('h:i A');
      }
    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $emps = Employee::where('name', 'like', $searchTerm)->OrWhere('userid', 'like', $searchTerm)->paginate(10);
        return view('livewire.today-attendance', ['emps' => $emps]);
    }
    public function add()
    {
       $employees = Employee::whereIn('userid',$this->selected)->get();
      //  $users = [];
        $att=[];
        if($this->timeOut==null || $this->timeIn==null){
             dd('please fill time field');
        }

        foreach ($employees as $k) {
            $rec=$k->record;
            $rec[intval(date('y'))][intval(date('m'))][intval(date('d'))] = [
                'in' => $this->time($this->timeIn),
                'out' =>$this->time($this->timeOut),
            ];
            array_push($att,[
                'name'=>$k->name,
                'userid'=>$k->userid,
                'record'=>json_encode($rec)
            ]);
        }
        Employee::upsert($att, ['userid'], ['record']);
        return redirect('dashboard');

    }
}
