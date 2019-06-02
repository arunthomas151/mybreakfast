<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vbooking extends Model
{
    public $fillable=[
        'rid',
        'vid',
        'nrid',
        'vcidate',
        'vcodate',
        'vnop',
        'vamount',
        'vbstatus'
    ];
    public $timestamps = false;
}
