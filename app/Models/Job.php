<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
     protected $fillable = [
        'title',
        'location',
        'role_id',
        'service_type_id',
        'care_setting_id',
        'salary_range',
        'description',
        'requirements',
        'is_active',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class);
    }

    public function careSetting()
    {
        return $this->belongsTo(CareSetting::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
