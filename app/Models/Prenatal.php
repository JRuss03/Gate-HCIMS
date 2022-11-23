<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prenatal extends Model
{
    use HasFactory;

    protected $fillable = [
        'pregnant_id',
        'name',
        'last_childbirth',
        'details',
    ];

    function pregnant()
    {
        return $this->belongsTo(Pregnant::class, 'pregnant_id');
    }
}
