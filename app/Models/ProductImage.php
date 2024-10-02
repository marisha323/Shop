<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image_id',
    ];

    // Определите связь с моделью product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Определите связь с моделью Image
    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
