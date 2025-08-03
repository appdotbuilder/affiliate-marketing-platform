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
        Schema::create('affiliate_earnings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('affiliate_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('buyer_id')->constrained('users')->onDelete('cascade');
            $table->string('order_reference');
            $table->decimal('order_amount', 10, 2);
            $table->decimal('commission_amount', 10, 2);
            $table->decimal('commission_percentage', 5, 2);
            $table->integer('commission_level')->default(1);
            $table->enum('status', ['pending', 'approved', 'paid', 'cancelled'])->default('pending');
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();

            $table->index('affiliate_id');
            $table->index('product_id');
            $table->index('status');
            $table->index('order_reference');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliate_earnings');
    }
};