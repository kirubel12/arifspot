<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        "user_id",
        "name",
        "description",
        "phone_number",
        "images",
        "rating",
        "city_id",
        "category_id",

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
