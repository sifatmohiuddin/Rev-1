<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::creating(function ($membership) {
            // If not manually set, default it to created_at
            if (empty($membership->membership_start_date)) {
                $membership->membership_start_date = now(); // Or: $membership->created_at
            }
        });
    }

    protected $fillable = [
        'name',
        'phone',
        'age',
        'gender',
        'current_body_type',
        'desired_body_type',
        'weight',
        'target_weight',
        'height',
        'workout_time',
        'medical_history',
        'membership_plan',
        'membership_start_date',
    ];


    public function plan()
{
    return $this->hasMany(Plan::class);
}



}

