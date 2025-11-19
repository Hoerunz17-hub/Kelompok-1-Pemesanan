<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('no_invoice')->unique();
            $table->string('name')->nullable();

            $table->foreignId('waiters_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('casier_id')->nullable()->constrained('users')->nullOnDelete();

            $table->string('table_no')->nullable();
            $table->enum('order_type', ['dine_in', 'takeaway'])->default('dine_in');
            $table->dateTime('order_date')->nullable();

            $table->integer('total_cost')->default(0);
            $table->integer('discount')->default(0);

            $table->integer('paid_amount')->default(0);

            $table->integer('change_amount')->default(0);

            $table->enum('payment_method', ['cash','transfer','qris'])->default('cash');
            $table->enum('is_paid', ['paid','unpaid'])->default('unpaid');

            $table->enum('status', ['accepted','in_progress','served','finished','cancelled'])
                  ->default('accepted');

            $table->dateTime('paid_date')->nullable();
            $table->text('note')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
