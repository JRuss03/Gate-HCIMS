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
        'mensdate',
        'prob_bdate',
        
    ];
}
