<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immunization extends Model
{
    use HasFactory;

    protected $fillable = [
        'checkup_id',
        'immuno_uniqid',
        'immunization',
        'dosage',
        'reaction',
        'date',
    ];
}
