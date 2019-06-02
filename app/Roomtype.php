<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roomtype extends Model
{
    protected $fillable = [
        'type',
        'roomcpty',
        'tstatus'
    ];
    public $timestamps = false;
}
