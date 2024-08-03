<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    use HasFactory;

    protected $fillable = ['current_stock_level', 'feed_ingredient_id'];

    public function feedIngredient()
    {
        return $this->belongsTo(FeedIngredient::class);
    }
}
