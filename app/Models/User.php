<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table ='users';

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Mutator: setiap password baru langsung otomatis di-hash.
     */
    public function setPasswordAttribute($value)
    {
        if ($value) {
            // Kalau value sudah di-hash, jangan hash dua kali
            $this->attributes['password'] = Hash::needsRehash($value)
                ? Hash::make($value)
                : $value;
        }
    }

    /**
     * Relasi ke tabel orders (user sebagai waiter)
     */
    public function waiterOrders()
    {
        return $this->hasMany(Order::class, 'waiters_id');
    }

    /**
     * Relasi ke tabel orders (user sebagai cashier)
     */
    public function cashierOrders()
    {
        return $this->hasMany(Order::class, 'casier_id');
    }
}
