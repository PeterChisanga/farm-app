<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfitabilityAnalysis extends Model
{
    use HasFactory;

    protected $fillable = ['total_income', 'total_expenses', 'net_profit', 'farm_id'];

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }
}
