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
        'discounts_id',
    ];
}
