<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    //
        protected $fillable = [
        'name',
        'email',
        'phone',
        'type',
        'location',
        'is_active',
    ];
}
