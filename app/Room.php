<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'rmid',
        'tid',
        'nrimage',
        'capacity1',
        'reid',
        'nrstatus'
    ];
    public $timestamps = false;
}
