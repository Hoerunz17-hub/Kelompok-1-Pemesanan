<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            // Tambah jika belum ada
            if (!Schema::hasColumn('orders', 'tendered')) {
                $table->integer('tendered')->default(0);
            }

            if (!Schema::hasColumn('orders', 'grand_amount')) {
                $table->integer('grand_amount')->default(0);
            }

        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['tendered', 'grand_amount']);
        });
    }
};