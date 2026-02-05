<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    //
    protected $fillable = [
        'offer_id',
        'staff_id',
        'name',
        'email',
        'phone',
        'resume',
        'linkedin_profile', //Optional
        'portfolio_url',   //Optional
        'additional_info', //Optional
        'experience_level',
        'candidate_id',
        'cover_letter',
        'status',
        'opened_at',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
