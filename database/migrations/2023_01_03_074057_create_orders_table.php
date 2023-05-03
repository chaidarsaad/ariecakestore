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

            $table->tinyInteger('user_id');
            $table->string('fname');
            $table->string('phone');
            $table->string('address1')->nullable();
            $table->tinyInteger('districts_id')->nullable();
            $table->integer('total_price');
            $table->string('message')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->string('tracking_no');


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
