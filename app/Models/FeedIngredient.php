<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedIngredient extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'weight', 'price', 'farm_id'];

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }

    public function nutritionalValue()
    {
        return $this->hasOne(NutritionalValue::class);
    }

    public function inventoryItem()
    {
        return $this->hasOne(InventoryItem::class);
    }

    public function feedRations()
    {
        return $this->hasMany(FeedRation::class);
    }
}
