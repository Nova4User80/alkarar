<?php

namespace App\Models;


use Spatie\Tags\HasTags;
use App\Models\EmployeeProject;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Tags\Tag;

class Employee extends Model implements HasMedia
{

    use InteractsWithMedia;
    use HasFactory;
    use HasTags;
    protected $fillable  = ['name','userid','note','record','salary','id'];
    protected $casts  = ['record'=>'array'];

    public static function getTagClassName(): string
    {
        return Tag::class;
    }
/*
    public function getrecordAttribute($value)
    {
        return json_decode($value,true);
    }
    public function setrecordAttribute($value)
    {
        $this->record = json_encode($value);
    }*/
    /**
     * Get the dep that owns the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dep(): BelongsTo
    {
        return $this->belongsTo(Dep::class);
    }
    public function projects()
    {
        return $this->belongsToMany(Project::class,
        'employee_project',
        'employee_id',
        'project_id',
        'id', // old userid
        'id');
    }
    /*public function projectsByUserid()
    {
        return $this->belongsToMany(Project::class,
        'employee_project',
        'employee_id',
        'project_id',
        'userid', // old userid
        'id')->as('projectsByUserid');

    }*/
    public function projectsPivot()
    {
        return $this->belongsToMany(Project::class,'employee_project',
        'employee_id',
        'project_id',
        'id', // old userid
        'id')->withPivot('fid');
    }
}
