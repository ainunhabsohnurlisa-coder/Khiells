<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'customer_name',
        'customer_phone',
        'shipping_address',
        'payment_method',
        'payment_status',
        'order_status',
        'subtotal',
        'discount_amount',
        'shipping_fee',
        'total_amount',
        'items_json',
        'notes',
    ];

    protected $casts = [
        'items_json' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
