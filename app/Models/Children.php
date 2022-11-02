<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
   // use HasFactory;
    protected $fillable = [
        'pregnant_id',

        'name',
        'age',
        // 'problem',
       
        
    ];
    public function pregnant()
    {
        return $this->hasMany(Pregnant::class);
    }
}
