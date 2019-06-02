<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $fillable = [
        'rent',
        'rstatus'
    ];
    public $timestamps = false;
}
