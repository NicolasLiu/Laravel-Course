<?php

namespace App\Courses;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'summary',
    ];

    protected $dates = ['deleted_at'];

    public function courseclasses()
    {
        return $this->hasMany('App\Courses\CourseClass');
    }
}
