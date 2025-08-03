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
        Schema::create('funnels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('landing_page_url')->nullable();
            $table->json('steps')->nullable()->comment('Funnel steps configuration');
            $table->json('settings')->nullable()->comment('Funnel settings and automation');
            $table->enum('status', ['active', 'inactive', 'draft'])->default('draft');
            $table->integer('total_visitors')->default(0);
            $table->integer('total_conversions')->default(0);
            $table->decimal('conversion_rate', 5, 2)->default(0);
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
        Schema::dropIfExists('funnels');
    }
};