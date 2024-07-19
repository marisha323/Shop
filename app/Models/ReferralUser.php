<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralUser extends Model
{
    use HasFactory;

    protected $fillable=[
        'referrer_id',
        'referred_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
