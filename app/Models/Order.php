<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Заполняемые поля
    protected $fillable = [
        'user_id',
        'total_price',
        'total_count',
        'status',
        'index',
        'comment',
        'postal_branch_number',
        'post_id',
        'full_name',
        'address',
        'city',
        'country',
        'phone_number',
    ];

    // Определяем связь с моделью User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Определяем связь с моделью Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }


    public function historyOrders()
    {
        return $this->hasMany(HistoryOrder::class, 'order_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'StatusId'); // 'status' - це назва стовпця у таблиці orders
    }



}
