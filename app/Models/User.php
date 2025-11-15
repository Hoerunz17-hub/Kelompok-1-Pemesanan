<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'address',
        'phonenumber',
        'email',
        'password',
        'role',
        'is_active'
    ];

    public function ordersAsWaiter()
    {
        return $this->hasMany(Order::class, 'waiters_id');
    }

    public function ordersAsCasier()
    {
        return $this->hasMany(Order::class, 'casier_id');
    }
}