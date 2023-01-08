<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyConsultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'lastname',
        'firstname',
        'middlename',
        'gender',
        'age',
        'date_of_birth',
        'address',
        'ht_wt',
        'bp',
        'fbs',
        'service_provided',
        'med_given',
    ];
}
