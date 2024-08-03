<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'date_generated', 'farm_id'];

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }
}
