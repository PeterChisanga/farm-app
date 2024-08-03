<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'location', 'size', 'owner_id',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function fields()
    {
        return $this->hasMany(Field::class);
    }

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }

    public function inventoryitems()
    {
        return $this->hasMany(InventoryItem::class);
    }

    public function feedingredients()
    {
        return $this->hasMany(FeedIngredient::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function workers()
    {
        return $this->hasMany(Worker::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
