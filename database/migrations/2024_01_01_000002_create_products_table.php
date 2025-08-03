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
            $table->text('description');
            $table->text('short_description')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('original_price', 10, 2)->nullable();
            $table->string('image')->nullable();
            $table->enum('type', ['course', 'ebook', 'software', 'template', 'other'])->default('course');
            $table->enum('status', ['active', 'inactive', 'draft'])->default('draft');
            $table->json('features')->nullable();
            $table->boolean('has_certificate')->default(false);
            $table->integer('duration_hours')->nullable();
            $table->integer('total_lessons')->default(0);
            $table->timestamps();

            $table->index('status');
            $table->index('type');
            $table->index('price');
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