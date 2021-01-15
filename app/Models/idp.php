<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class idp extends Model
{
     protected $fillable = [
        
        'main_id',
        'household_name',
        'location',
        'dob',
        'gender',
        'state',
        'lga',
        'village',
        'education',
        'occupation',
        'preferred_skill',
        'cause',
        'status',
        'telly',
        'email',
        ];

        use HasFactory;
}
