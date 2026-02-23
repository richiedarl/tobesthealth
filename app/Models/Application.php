<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'offer_id',
        'staff_id',
        'candidate_id',
        'name',
        'email',
        'phone',
        'resume',
        'linkedin_profile',
        'portfolio_url',
        'additional_info',
        'experience_level',
        'cover_letter',
        'status',
        'opened_at',
    ];

    protected $casts = [
        'opened_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

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

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    public function getTypeAttribute()
    {
        if ($this->staff_id) {
            return 'staff';
        } elseif ($this->candidate_id) {
            return 'candidate';
        } elseif ($this->offer_id) {
            return 'job';
        }
        return 'unknown';
    }

    public function getTypeLabelAttribute()
    {
        return match($this->type) {
            'staff' => '<span class="badge badge-info">Staff Application</span>',
            'candidate' => '<span class="badge badge-primary">Candidate Application</span>',
            'job' => '<span class="badge badge-secondary">Job Application</span>',
            default => '<span class="badge badge-dark">Unknown</span>',
        };
    }

    public function getStatusBadgeAttribute()
    {
        $colors = [
            'submitted' => 'warning',
            'pending' => 'info',
            'reviewed' => 'primary',
            'shortlisted' => 'success',
            'rejected' => 'danger',
        ];
        
        $color = $colors[$this->status] ?? 'secondary';
        
        return "<span class=\"badge badge-{$color}\">" . ucfirst($this->status) . "</span>";
    }

    public function getResumeUrlAttribute()
    {
        return $this->resume ? asset('storage/' . $this->resume) : null;
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopeByType($query, $type)
    {
        return match($type) {
            'staff' => $query->whereNotNull('staff_id'),
            'candidate' => $query->whereNotNull('candidate_id'),
            'job' => $query->whereNotNull('offer_id')->whereNull('staff_id')->whereNull('candidate_id'),
            default => $query,
        };
    }

    public function scopePending($query)
    {
        return $query->whereIn('status', ['submitted', 'pending']);
    }

    public function scopeReviewed($query)
    {
        return $query->whereIn('status', ['reviewed', 'shortlisted']);
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    public function scopeUnopened($query)
    {
        return $query->whereNull('opened_at')->orWhere('opened_at', 0);
    }

    /*
    |--------------------------------------------------------------------------
    | METHODS
    |--------------------------------------------------------------------------
    */

    public function markAsOpened()
    {
        if (!$this->opened_at || $this->opened_at === 0) {
            $this->update(['opened_at' => now()]);
        }
    }

    public function updateStatus($newStatus)
    {
        $allowedStatuses = ['submitted', 'pending', 'reviewed', 'shortlisted', 'rejected'];
        
        if (in_array($newStatus, $allowedStatuses)) {
            $this->update(['status' => $newStatus]);
            return true;
        }
        
        return false;
    }
}