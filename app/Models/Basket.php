<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sum_price',
        'count',
        'product_id',
    ];

    // Определяем связь с моделью product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Определяем связь с моделью User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
