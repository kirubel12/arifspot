<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'image',
        'latitude',
        'longitude',
        'priority',
    ];


}
