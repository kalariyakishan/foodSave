<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getLogoPathAttribute()
    {
        if ($this->logo && file_exists(public_path('storage/restaurants/' . $this->logo))) {
            return asset('storage/restaurants/' . $this->logo);
        }

        // Return the path to the default image if the avatar is not found or is null
        return asset('bs5/assets/images/demo/users/face11.jpg');
    }

    public function getBannerImagePathAttribute()
    {
        if ($this->logo && file_exists(public_path('storage/restaurants/' . $this->banner_image))) {
            return asset('storage/restaurants/' . $this->banner_image);
        }

        // Return the path to the default image if the avatar is not found or is null
        return asset('bs5/assets/images/demo/users/face11.jpg');
    }

    public function user(){
        return $this->hasOne(User::class,'restaurant_id');
    }

    public function restaurantType(){
        return $this->belongsTo(RestaurantType::class,'restaurant_type_id');
    }
    public function country(){
        return $this->belongsTo(Country::class,'country_id');
    }
}
