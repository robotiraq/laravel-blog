<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FoodCategory extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function foodItems(): HasMany
    {
        return $this->hasMany(FoodItem::class,'food_category_id');
    }
}
