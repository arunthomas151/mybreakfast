<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $fillable = [
        'rid',
        'rname',
        'rcontact',
        'did',
        'pid',
        'lmark',
        'himage',
        'rmstatus'
    ];
    public $timestamps = false;
}
