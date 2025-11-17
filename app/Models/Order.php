<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_invoice',
        'waiters_id',
        'casier_id',
        'table_no',
        'order_type',
        'order_date',
        'total_cost',
        'discount',
        'paid_amount',
        'change_amount',
        'payment_method',
        'is_paid',
        'status',
        'paid_date',
        'note',
    ];

    // RELATION KE USER
    public function waiter()
    {
        return $this->belongsTo(User::class, 'waiters_id');
    }

    public function casier()
    {
        return $this->belongsTo(User::class, 'casier_id');
    }

    // RELATION KE ORDER DETAIL
    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}