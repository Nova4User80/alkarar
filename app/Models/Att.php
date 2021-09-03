<?php

namespace App\Models;
/*
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Att extends Model
{
    use HasFactory;

    public $primaryKey = 'employee_id';
    protected $fillable = [
        'employee_id',
        'record',
    ];
    /* protected $casts = [
    'record' => 'array',
    ];*//*
    public function getrecordAttribute($value)
    {
        return json_decode($value,true);
    }
    public function setrecordAttribute($value)
    {
        $this->record = json_encode($value);
    }
    public $keyType = 'string';

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }*/
/*
    public function &__get($index)
    {

        if (is_array(json_decode($this->attributes['record'], true))
            && array_key_exists($index, json_decode($this->attributes['record'], true))) {
            return $this->record[$index];
        }
        dd($index);
        return json_decode($this->attributes['record'], true)[$index];
    }

    public function &__set($index, $value)
    {
        if (!empty($index)) {
            if (is_object($value) || is_array($value)) {
                $this->record[$index] = &$value;
            } else {
                $this->record = &$value;
            }
        }
    }
}*/
