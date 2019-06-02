<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'sid',
        'd_name',
        'status'
    ];
    public $timestamps = false;
}
