<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rbooking extends Model
{
    public $fillable=[
        'rid',
        'nrid',
        'bid',
        'cidate',
        'codate',
        'nop',
        'amount',
        'rbstatus'
    ];
    public $timestamps = false;
}
