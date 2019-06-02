<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rrating extends Model
{
    public $fillable=[
        'rrid',
        'rcount',
        'rtstatus'
    ];
    public $timestamps = false;
}
