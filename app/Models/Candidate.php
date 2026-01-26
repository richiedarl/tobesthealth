<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    //
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'profession',
        'cv_path',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
