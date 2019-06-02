<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prating extends Model
{
    public $fillable=[
        'pkid',
        'pcount',
        'prstatus'
    ];
    public $timestamps = false;
}
