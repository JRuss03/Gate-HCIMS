<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baby extends Model
{
   // use HasFactory;
   protected $fillable = [
    'name',
    'age',
    'birthday',
    'mother_name',
    'father_name',
    'guardian',
    'guardian_contact_no',
    'purok',
];
}
