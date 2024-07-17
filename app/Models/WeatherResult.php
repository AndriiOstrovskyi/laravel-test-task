<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'region',
        'country',
        'localtime',
        'condition_text',
        'condition_icon'
    ];
}
