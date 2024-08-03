<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedRation extends Model
{
    use HasFactory;

    protected $fillable = ['animal_type', 'nutritional_requirements', 'ingredient_blend', 'number_of_animals', 'feed_ingredient_id'];

    public function feedIngredient()
    {
        return $this->belongsTo(FeedIngredient::class);
    }
}
