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
        'grand_amount',
        'change_amount',
        'payment_method',
        'is_paid',
        'status',
        'paid_date',
        'note'
    ];

    public function waiter()
    {
        return $this->belongsTo(User::class, 'waiters_id');
    }

    public function casier()
    {
        return $this->belongsTo(User::class, 'casier_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}