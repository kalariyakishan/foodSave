<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    use HasFactory;


    public function images()
    {
        return $this->hasMany(FoodItemImage::class);
    }

    public function food_size(){
        return $this->belongsTo(FoodSize::class,'food_size_id');
    }

    public function food_type(){
        return $this->belongsTo(FoodType::class,'food_type_id');
    }
}
