<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'rid',
        'pkname',
        'pkinfo',
        'nrid',
        'bid',
        'vid',
        'pstime',
        'petime',
        'pkimage',
        'reid', 
        'rmstatus'
    ];
    public $timestamps = false;
}
