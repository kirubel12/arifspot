<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcity extends Model
{
    protected $fillable = [
        'user_id',
        'name',
    ];


    public function vendors()
    {
        return $this->hasMany(Vendor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
