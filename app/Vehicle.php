<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'rid',
        'vrno',
        'voname',
        'vdname',
        'vdlicence',
        'nofseat',
        'vcontact',
        'vimage',
        'vstatus'
    ];
    public $timestamps = false;
}
