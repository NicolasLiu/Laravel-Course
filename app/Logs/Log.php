<?php

namespace App\Logs;

use Moloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Log extends Moloquent
{
    use SoftDeletes;

    protected $collection = 'logs';
    protected $connection = 'mongodb';
    protected $dates = ['deleted_at'];


    public function __construct()
    {
        $this->type = $this->name();
        parent::__construct();
    }

    public static function name()
    {
        return 'App\Logs';
    }

    public static function nameKey()
    {
        return '_name';
    }

    public static function all($columns = ['*'])
    {
        return static::where(static::nameKey(), '>=', static::name())->get($columns);
    }
}
