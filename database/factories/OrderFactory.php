<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use App\Models\Affiliate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $originalAmount = $this->faker->randomFloat(2, 100000, 2000000);
        $discountAmount = $this->faker->randomFloat(2, 0, $originalAmount * 0.3);
        $amount = $originalAmount - $discountAmount;
        
        return [
            'order_number' => 'ORD-' . date('Ymd') . '-' . str_pad((string)random_int(1, 9999), 4, '0', STR_PAD_LEFT),
            'user_id' => User::factory(),
            'product_id' => Product::factory(),
            'affiliate_id' => $this->faker->boolean(70) ? Affiliate::factory() : null,
            'amount' => $amount,
            'original_amount' => $originalAmount,
            'discount_amount' => $discountAmount,
            'discount_code' => $discountAmount > 0 ? $this->faker->word() : null,
            'status' => $this->faker->randomElement(['pending', 'paid', 'cancelled', 'refunded']),
            'payment_method' => $this->faker->randomElement(['manual', 'midtrans', 'paypal', 'stripe']),
            'payment_reference' => $this->faker->uuid(),
            'paid_at' => $this->faker->boolean(60) ? $this->faker->dateTimeBetween('-30 days', 'now') : null,
            'metadata' => [
                'ip_address' => $this->faker->ipv4(),
                'user_agent' => $this->faker->userAgent(),
            ],
        ];
    }

    /**
     * Indicate that the order is paid.
     */
    public function paid(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'paid',
            'paid_at' => $this->faker->dateTimeBetween('-30 days', 'now'),
        ]);
    }
}