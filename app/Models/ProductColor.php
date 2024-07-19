<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'color_id',
    ];

    // Определите связь с моделью Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Определите связь с моделью Color
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}
