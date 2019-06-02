<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vrating extends Model
{
    public $fillable=[
        'vid',
        'vcount',
        'vrstatus'
    ];
    public $timestamps = false;
}
