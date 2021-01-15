<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class idpspouse extends Model
{
     protected $fillable = [
      	'main_id',
        'household_name',
        'spouse_name',
        'dob',
        'gender',
        'disability',
        'education',
        'occupation',
        'preferred_skill',
        'telly',
        ];

        use HasFactory;
}
