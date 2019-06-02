<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    public $fillable=[
        'lid',
        'u_name',
        'u_email',
        'u_gender',
        'dob',
        'u_mob',
        'u_did',
        'type',
        'status'
    ];
    public $timestamps = false;
}
