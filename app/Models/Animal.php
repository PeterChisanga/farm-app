<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'mother_name', 'sex', 'date_of_birth', 'weight', 'type', 'breed', 'farm_id'];

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }
}
