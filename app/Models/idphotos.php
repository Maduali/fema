<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class idphotos extends Model
{
	  protected $fillable = [
        'main_id',
        'household_name',
        'photo'
        ];

    use HasFactory;
}
