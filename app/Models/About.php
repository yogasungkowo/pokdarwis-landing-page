<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'year_founded',
        'history',
        'vision',
        'mission',
        'location',
        'image',
        'latitude',
        'longitude',
        'location_desc',
    ];
}
