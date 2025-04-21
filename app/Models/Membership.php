<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

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
    ];


    public function plan()
{
    return $this->hasOne(Plan::class);
}

}

