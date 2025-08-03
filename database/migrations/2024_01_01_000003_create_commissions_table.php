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
        Schema::create('commissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('level')->default(1);
            $table->decimal('percentage', 5, 2);
            $table->decimal('fixed_amount', 10, 2)->nullable();
            $table->enum('type', ['percentage', 'fixed', 'hybrid'])->default('percentage');
            $table->timestamps();

            $table->index(['product_id', 'level']);
            $table->index('level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commissions');
    }
};