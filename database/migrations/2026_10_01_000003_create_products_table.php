<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('price');
            $table->integer('original_price')->nullable();
            $table->integer('discount')->default(0);
            $table->integer('stock')->default(50);
            $table->string('sold_count')->default('0');
            $table->string('image')->nullable();
            $table->string('badge')->nullable();
            $table->string('badge_color')->default('bg-rose-500');
            $table->text('colors')->nullable(); // json or comma-separated
            $table->text('sizes')->nullable(); // json or comma-separated
            $table->string('material')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_featured')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
