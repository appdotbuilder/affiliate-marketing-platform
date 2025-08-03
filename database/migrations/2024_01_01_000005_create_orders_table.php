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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('affiliate_id')->nullable()->constrained()->onDelete('set null');
            $table->decimal('amount', 10, 2);
            $table->decimal('original_amount', 10, 2);
            $table->decimal('discount_amount', 10, 2)->default(0);
            $table->string('discount_code')->nullable();
            $table->enum('status', ['pending', 'paid', 'cancelled', 'refunded'])->default('pending');
            $table->enum('payment_method', ['manual', 'midtrans', 'paypal', 'stripe'])->default('manual');
            $table->string('payment_reference')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();

            $table->index('order_number');
            $table->index('user_id');
            $table->index('status');
            $table->index('affiliate_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};