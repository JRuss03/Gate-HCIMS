<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregnant extends Model
{
    //use HasFactory;
    protected $fillable = [
        'mother_name',
        'age',
        'numberofchildren',
        'children',
        'mensdate',
        'prob_bdate',
        'problem',
    ];

    public function prenatals()
    {
        return $this->hasMany(Prenatal::class);
    }
}
