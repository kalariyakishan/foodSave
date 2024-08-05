<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItemImage extends Model
{
    use HasFactory;

    protected $fillable = ['food_item_id', 'image_path'];

    public function foodItem()
    {
        return $this->belongsTo(FoodItem::class);
    }
}
