<?php

namespace App\Courses;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Term extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'start', 'end',
    ];

    protected $dates = ['deleted_at'];

    public function courseclasses()
    {
        return $this->belongsToMany('App\Courses\CourseClass');
    }
}
