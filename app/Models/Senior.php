<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Senior extends Model
{
   // use HasFactory;
    protected $fillable = [
        'name',
        'age',
        'birthday',
        'guardian',
        'guardian_contact_no',
        'purok',
        'created',
    ];
}
