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
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('price')->nullable();
            $table->timestamps();
        });

        DB::table('districts')->insert([
            'name' => '',
            'price' => 0,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};
