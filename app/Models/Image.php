<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['ImageUrl'];
    public function getUrlAttribute()
    {
        return url($this->path);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_images', 'image_id', 'product_id');
    }
}
