<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class idpkids extends Model
{
     protected $fillable = [
        'main_id',
        'household_name',
        'child_name',
        'dob',
        'gender',
        'disability',
        'education',
        'occupation',
        'preferred_skill'
        ];

        use HasFactory;
}
