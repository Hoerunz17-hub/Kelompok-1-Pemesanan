<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('username')->unique()->nullable();
            $table->string('address')->nullable();
            $table->string('phonenumber', 20)->nullable();
            $table->string('email')->unique();
            $table->string('password');

            // Role SESUAI database
            $table->enum('role', ['waiters', 'admin', 'super_admin'])->default('waiters');

            // Status
            $table->enum('is_active', ['active', 'nonactive'])->default('active');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};