<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowUp extends Model
{
    use HasFactory;

    protected $fillable = [
        'checkup_id',
        'uniqid',
        'date',
        'weight',
        'length',
        'age_in_mos',
        'nutritional_status',
        'physical_exam',
        'management',
    ];
}
