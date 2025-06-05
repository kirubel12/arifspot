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
        "cancellation_policy",
        "safety_property",
        "house_rules",
        "google_map_url",
        "images",
        "rating",
        "subscity_id",
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
    public function subcity()
    {
        return $this->belongsTo(Subcity::class);
    }
}
