<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'variety', 'planting_date', 'expected_yield', 'field_id'];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}
