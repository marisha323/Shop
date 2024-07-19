<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Characteristics extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'type_of_material',
        'height',
        'width',
        'size_id',
        'brand_id',
    ];

    // Определите связь с моделью Size
    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brands::class, 'brand_id');
    }

//    public function brand()
//    {
//        return $this->belongsTo(Brand::class);
//    }
}
