<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        's_name',
        'status'
    ];
    public $timestamps = false;
}
