<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bfood extends Model
{
    protected $fillable = [
        'cid',
        'bfname',
        'bfstatus'
    ];
    public $timestamps = false;
}
