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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('content_type', ['video', 'text', 'pdf', 'quiz'])->default('video');
            $table->text('content')->nullable();
            $table->string('video_url')->nullable();
            $table->string('video_provider')->nullable()->comment('youtube, vimeo, etc');
            $table->text('materials')->nullable()->comment('Additional materials JSON');
            $table->integer('duration')->nullable()->comment('in minutes');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_preview')->default(false);
            $table->enum('status', ['active', 'inactive', 'draft'])->default('draft');
            $table->timestamps();

            $table->index('course_id');
            $table->index('status');
            $table->index('sort_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};