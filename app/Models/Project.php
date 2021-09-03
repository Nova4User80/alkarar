<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name','id'];
   // protected $keyType = 'string';
   // protected $table = 'projects';
   // protected $primaryKey = 'id';
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_project', 'project_id', 'employee_id', 'id',
            'id', // old userid
        );
    }
   /*public function employeesByUserid()
    {
        return $this->belongsToMany(Employee::class, 'employee_project', 'project_id', 'employee_id', 'id',
            'userid', // old userid
        );
    }*/
    public function employeesPivot()
    {
        return $this->belongsToMany(Employee::class, 'employee_project', 'project_id', 'employee_id', 'id',
            'id', // old userid
        )->withPivot('fid');
    }

}
