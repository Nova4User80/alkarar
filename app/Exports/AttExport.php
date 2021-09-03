<?php

namespace App\Exports;

use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AttExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private $m;
    private $y;
    private $s;
    private $emps;
    public function __construct($year, $month,$sections,$emps)
    {
        $this->y = $year;
        $this->m = $month;
        $this->s = $sections;
        $this->emps = $emps;
    }
    public function view(): View
    {
       // dd($this->emps);
        return view('exports.att', [
            'emps' => $this->emps,
            'year' => $this->y,
            'month' => $this->m,
            'sections'=>$this->s
        ]);
    }
}
