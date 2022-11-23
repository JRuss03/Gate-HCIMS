<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrenatalDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'prenatal_id',
        'detail_uniqid',
        'month',
        'dateofvisit',
        'general',
        'anemia',
        'danger',
        'swelling',
        'pulse',
        'temp',
        'weight',
        'bloodpressure',
        'proteininurine',
        'sugarinurine',
        'position',
        'vaccine',
        'birth',
        
    ];
}
