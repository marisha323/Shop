<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'total_count',
        'status',
    ];

    // Определяем связь с моделью User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
