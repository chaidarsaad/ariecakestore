<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->tinyInteger('user_id')->nullable();
            $table->string('fname')->nullable();
            $table->string('phone')->nullable();
            $table->string('address1')->nullable();
            $table->tinyInteger('districts_id')->nullable();
            $table->bigInteger('total_price');
            $table->string('message')->nullable();
            $table->enum('status_pembayaran', ['Belum Dibayar', 'Sudah Dibayar']);
            $table->string('status_pesanan')->nullable();
            $table->string('tracking_no');
            $table->string('status_pickup')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
