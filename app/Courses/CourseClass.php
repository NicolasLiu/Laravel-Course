<?php

namespace App\Courses;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseClass extends Model
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

    public function terms()
    {
        return $this->belongsToMany('App\Courses\Term');
    }

    public function users()
    {
        return $this->belongsToMany('App\Users\User');
    }

    public function course()
    {
        return $this->belongsTo('App\Courses\Course');
    }
}
