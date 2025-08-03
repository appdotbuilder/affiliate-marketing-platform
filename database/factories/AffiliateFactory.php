<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Affiliate>
 */
class AffiliateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userId = User::factory()->create()->id;
        $affiliateCode = 'AF' . str_pad((string)$userId, 6, '0', STR_PAD_LEFT);
        
        return [
            'user_id' => $userId,
            'affiliate_code' => $affiliateCode,
            'affiliate_link' => url('/?ref=' . $affiliateCode),
            'total_earnings' => $this->faker->randomFloat(2, 0, 10000),
            'pending_earnings' => $this->faker->randomFloat(2, 0, 1000),
            'paid_earnings' => $this->faker->randomFloat(2, 0, 5000),
            'total_referrals' => $this->faker->numberBetween(0, 100),
            'total_sales' => $this->faker->numberBetween(0, 50),
            'status' => $this->faker->randomElement(['active', 'inactive', 'suspended']),
        ];
    }
}