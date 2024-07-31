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

}
