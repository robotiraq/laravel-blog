<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FoodItem extends Model
{
    use HasFactory;

    public $timestamps = false;


    public function category(): BelongsTo
    {
        return $this->belongsTo(FoodCategory::class,'food_category_id');
    }
}
