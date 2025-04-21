<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'membership_id',
        'diet_plan',
        'workout_plan',
    ];

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }
}
