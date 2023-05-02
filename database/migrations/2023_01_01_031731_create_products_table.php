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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('cate_id');
            $table->string('name');
            $table->string('slug');
            $table->mediumText('small_description');
            $table->integer('price');
            $table->string('image');
            $table->bigInteger('qty');
            $table->tinyInteger('status');
            $table->tinyInteger('trending');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
