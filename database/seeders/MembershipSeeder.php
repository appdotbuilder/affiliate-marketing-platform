<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Course;
use App\Models\Affiliate;
use App\Models\Order;
use App\Models\Commission;
use Illuminate\Database\Seeder;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create some sample products
        $products = Product::factory(6)->active()->create([
            'name' => function () {
                return collect([
                    'Kursus Digital Marketing Mastery',
                    'Panduan Lengkap Affiliate Marketing',
                    'Template Landing Page Converter',
                    'Kursus Copywriting untuk Penjualan',
                    'Social Media Marketing Blueprint',
                    'E-commerce Automation System'
                ])->random();
            },
            'type' => 'course',
            'price' => function () {
                return collect([297000, 497000, 997000, 1497000])->random();
            }
        ]);

        // Create courses for products
        foreach ($products as $product) {
            Course::factory()->active()->create([
                'product_id' => $product->id,
                'title' => $product->name,
            ]);
        }

        // Create commission structure for products
        foreach ($products as $product) {
            Commission::create([
                'product_id' => $product->id,
                'level' => 1,
                'percentage' => 30.00, // 30% commission for level 1
                'type' => 'percentage',
            ]);
            
            Commission::create([
                'product_id' => $product->id,
                'level' => 2,
                'percentage' => 10.00, // 10% commission for level 2
                'type' => 'percentage',
            ]);
        }

        // Get the authenticated user if exists, or create demo users
        $users = User::all();
        if ($users->count() === 0) {
            $users = User::factory(5)->create();
        }

        // Create affiliates for users
        foreach ($users as $user) {
            Affiliate::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'affiliate_code' => 'AF' . str_pad((string)$user->id, 6, '0', STR_PAD_LEFT),
                    'affiliate_link' => url('/?ref=AF' . str_pad((string)$user->id, 6, '0', STR_PAD_LEFT)),
                    'total_earnings' => random_int(0, 5000000),
                    'pending_earnings' => random_int(0, 1000000),
                    'paid_earnings' => random_int(0, 3000000),
                    'total_referrals' => random_int(0, 50),
                    'total_sales' => random_int(0, 25),
                    'status' => 'active',
                ]
            );
        }

        // Create some sample orders
        $affiliates = Affiliate::all();
        foreach ($products->take(3) as $product) {
            Order::factory(random_int(5, 15))->create([
                'product_id' => $product->id,
                'user_id' => $users->random()->id,
                'affiliate_id' => $affiliates->random()->id,
                'status' => collect(['paid', 'pending'])->random(),
            ]);
        }
    }
}