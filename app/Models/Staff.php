<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use SoftDeletes;

    protected $table = 'staff';

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'gender',
        'role',
        'nursing_level',
        'years_of_experience',
        'care_specialty',
        'license_number',
        'license_verified',
        'skills',
        'photo',
        'is_available',
        'availability_type',
        'is_active',
        'is_featured',
        'bio',
    ];

    protected $casts = [
        'skills'            => 'array',
        'license_verified'  => 'boolean',
        'is_available'      => 'boolean',
        'is_active'         => 'boolean',
        'is_featured'       => 'boolean',
        'years_of_experience' => 'integer',
    ];



    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeAvailable($query)
    {
        return $query->where('is_available', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
