<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breakfast extends Model
{
    protected $fillable = [
        'rid',
        'bfid',
        'description',
        'bimage',
        'reid', 
        'bstatus'
    ];
    public $timestamps = false;
}
