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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('thumbnail')->nullable();
            $table->text('learning_objectives')->nullable();
            $table->text('requirements')->nullable();
            $table->integer('estimated_duration')->nullable()->comment('in minutes');
            $table->boolean('certificate_enabled')->default(true);
            $table->string('certificate_template')->nullable();
            $table->integer('sort_order')->default(0);
            $table->enum('status', ['active', 'inactive', 'draft'])->default('draft');
            $table->timestamps();

            $table->index('product_id');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};