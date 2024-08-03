<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    
    protected $fillable = ['farm_id', 'first_name', 'last_name', 'phone_number', 'start_date', 'salary'];

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }
}
