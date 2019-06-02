<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'bankid',
        'holdername',
        'cardno',
        'eprydate',
        'ccv',
        'balance',
        'bankstatus'
    ];
    public $timestamps = false;
}
