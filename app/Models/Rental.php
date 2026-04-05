<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'order_id',
        'user_id',
        'status',
        'start_date',
        'end_date',
        'actual_return_date',
        'return_condition',
        'return_notes',
        'return_photo',
    ];

    // 🔗 Relasi ke Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // 🔗 Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
