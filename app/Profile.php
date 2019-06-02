<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $fillable=[
        'rid',
        'address',
        'image',
        'placeid',
        'adharno',
        'status'
    ];
    public $timestamps = false;
}
