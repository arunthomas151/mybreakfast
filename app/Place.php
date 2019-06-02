<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
        'did',
        'pname',
        'status'
    ];
    public $timestamps = false;
}
