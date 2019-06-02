<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiclerent extends Model
{
    protected $fillable = [
        'vid',
        'rkm',
        'wtime',
        'reid',
        'vrstatus'
    ];
    public $timestamps = false;
}
