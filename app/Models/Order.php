<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $guarded = [];

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
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
