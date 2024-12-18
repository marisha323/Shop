<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sum_price',
        'count',
        'product_id',
        'StatusId',
        'order_id',
         'color_id',

    ];

    // Определяем связь с моделью Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Определяем связь с моделью User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'StatusId');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

}
