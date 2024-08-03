<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $fillable = ['category', 'amount', 'date', 'farm_id'];

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }
}
