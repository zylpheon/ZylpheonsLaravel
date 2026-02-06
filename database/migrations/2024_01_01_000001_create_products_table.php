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
            $table->string('name');
            $table->string('category'); // supercar, hypercar, gt, classic
            $table->decimal('price', 12, 2);
            $table->integer('year');
            $table->integer('horsepower');
            $table->string('torque');
            $table->string('acceleration');
            $table->string('top_speed');
            $table->text('description');
            $table->string('badge');
            $table->string('image');
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
