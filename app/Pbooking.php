<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pbooking extends Model
{
    public $fillable=[
        'rid',
        'pkid',
        'pbdate',
        'pnop',
        'pbstatus'
    ];
    public $timestamps = false;
}
