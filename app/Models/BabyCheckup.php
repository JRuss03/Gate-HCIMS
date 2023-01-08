<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BabyCheckup extends Model
{
    use HasFactory;

    protected $fillable = [
        'baby_id',
        'gender',
        'mother_occupation',
        'mother_birthday',
        'father_occupation',
        'father_birthday',
        'address',
        'cp_no',
        'birth_weight',
        'birth_length',
        'h_circum',
        'nbs',
        'immunization',
        'follow_up',
    ];
}
