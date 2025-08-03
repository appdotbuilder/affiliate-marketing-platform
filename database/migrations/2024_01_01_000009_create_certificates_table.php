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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('certificate_number')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->string('student_name');
            $table->string('course_name');
            $table->timestamp('issued_at');
            $table->timestamp('completed_at');
            $table->string('certificate_url')->nullable();
            $table->json('metadata')->nullable()->comment('Template data, colors, etc');
            $table->timestamps();

            $table->index('certificate_number');
            $table->index(['user_id', 'course_id']);
            $table->index('issued_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};