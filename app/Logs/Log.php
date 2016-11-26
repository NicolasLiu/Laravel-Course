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

    public $type;

    public function __construct($type)
    {
        $this->type = $type;
        parent::__construct();
    }
}
