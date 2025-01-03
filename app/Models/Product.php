<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'count',
        'description',
        'price',
        'category_id',
        'characteristics_id',
        'discount_products_id',
    ];

    // Определите связь с моделью Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function firstColor()
    {
        return $this->hasOne(ProductColor::class, 'product_id')->with('color');
    }

    // Определите связь с моделью Characteristic
    public function characteristics()
    {
        return $this->belongsTo(Characteristics::class, 'characteristics_id');
    }

    // Определите связь с моделью DiscountProduct
    public function discountProduct()
    {
        return $this->belongsTo(DiscountProducts::class, 'discount_products_id');
    }

    public function images()
    {
        return $this->belongsToMany(Image::class, 'product_images', 'product_id', 'image_id');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_colors', 'product_id', 'color_id');
    }

    public function firstImage()
    {
        return $this->images()->first(); // Отримує перше зображення
    }
}
