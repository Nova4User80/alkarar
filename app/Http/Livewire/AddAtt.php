<?php

namespace App\Http\Livewire;

use App\Models\Alert;
use App\Models\Employee;
use App\Models\TaskStone;
use DateTime;
use Livewire\Component;

class AddAtt extends Component
{
    public $uid;
    public $date;
    public $timeIn;
    public $timeOut;
    public $xfile;
    protected $casts = [
        'timeIn' => 'datetime:H:i',
        'timeOut' => 'datetime:H:i',
      ];

    public function mount($id)
    {
        $this->uid = $id;
    }

    public function render()
    {
        return view('livewire.add-att');
    }

    public function add()
    {

        $emp = Employee::where('userid',$this->uid)->first();
        $finded = false;
        $att=array();
        $att = $emp->record;

        if ($this->timeIn != null && !empty($this->timeIn)) {
         //   dd('in');
            if ($finded) {
                if (isset($att[$this->year()][$this->month()][$this->day()]['in'])) {
                    Alert::create(
                        ['msg' =>
                            $emp->name . ' which update by  has already data with Type [ IN ]!',
                            'by' => auth()->user()->name,
                        ]
                    );
                }
            }

            $att[$this->year()][$this->month()][$this->day()]['in'] = $this->time($this->timeIn);

        }
        if ($this->timeOut != null && !empty($this->timeOut)) {
           // dd('out');
            if ($finded) {
                if (isset($att[$this->year()][$this->month()][$this->day()]['out'])) {
                    Alert::create(
                        ['msg' =>
                            $emp->name . ' which update by  has already data with Type [ OUT ]!',
                            'by' => auth()->user()->name,
                        ]
                    );
                }
            }
            $att[$this->year()][$this->month()][$this->day()]['out'] = $this->time($this->timeOut);
        }

        $emp->record = $att;
        $emp->save();
        TaskStone::create([
            'by'=>auth()->user()->name,
            'action'=>'has added new attendance to employee
            '.$emp->name.' ['.$emp->id.'] ['.$emp->userid.'] ||
            with Time OUT : ['.$this->timeOut.' ] || Time IN ['.$this->timeIn.']
            || with Date : ['.$this->dateString().']',
        ]);
        return redirect('dashboard');
    }
    public function month()
    {
        return intval(date("m", strtotime($this->replace_str())));
    }
    public function dateString()
    {
        return $this->year().'/'.$this->month().'/'.$this->day();
    }
    public function year()
    {
        return intval(date("Y", strtotime($this->replace_str())));
    }
    public function day()
    {
        return intval(date("d", strtotime($this->replace_str())));
    }
    public function replace_str()
    {
        return str_replace('-', '/', $this->date);
    }
    public function time($time)
    {
        return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(\PhpOffice\PhpSpreadsheet\Shared\Date::dateTimeToExcel(new DateTime($time)))->format('h:i A');
    }
    public function decimal_to_time($decimal)
    {
        $hours = floor((int) $decimal / 60);
        $minutes = floor((int) $decimal % 60);
        $seconds = $decimal - (int) $decimal;
        $seconds = round($seconds * 60);

        return str_pad($hours, 2, "0", STR_PAD_LEFT) . ":" . str_pad($minutes, 2, "0", STR_PAD_LEFT) . ":" . str_pad($seconds, 2, "0", STR_PAD_LEFT);
    }
}
