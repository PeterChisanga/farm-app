<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NutritionalValue extends Model
{
    use HasFactory;

    protected $fillable = ['protein_content', 'fiber_content', 'calcium_content', 'fat_content', 'feed_ingredient_id'];

    public function feedIngredient()
    {
        return $this->belongsTo(FeedIngredient::class);
    }
}
