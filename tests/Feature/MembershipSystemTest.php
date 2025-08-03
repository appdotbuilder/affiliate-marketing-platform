<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Affiliate;
use App\Models\Product;
use App\Models\Course;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MembershipSystemTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_access_dashboard(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
    }

    public function test_affiliate_is_created_automatically_for_user(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get('/dashboard');

        $this->assertDatabaseHas('affiliates', [
            'user_id' => $user->id,
            'affiliate_code' => 'AF' . str_pad($user->id, 6, '0', STR_PAD_LEFT),
        ]);
    }

    public function test_dashboard_displays_statistics(): void
    {
        $user = User::factory()->create();
        
        // Create some test data
        Product::factory(3)->active()->create();
        Course::factory(2)->active()->create();
        
        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
        $response->assertInertia(fn ($page) => 
            $page->has('stats')
                 ->has('affiliate')
                 ->has('recentProducts')
                 ->has('recentOrders')
        );
    }

    public function test_product_can_be_created(): void
    {
        $product = Product::factory()->create([
            'name' => 'Test Digital Product',
            'price' => 297000,
            'status' => 'active'
        ]);

        $this->assertDatabaseHas('products', [
            'name' => 'Test Digital Product',
            'price' => 297000,
        ]);
    }

    public function test_course_can_be_associated_with_product(): void
    {
        $product = Product::factory()->create();
        $course = Course::factory()->create([
            'product_id' => $product->id,
            'title' => 'Test Course',
        ]);

        $this->assertEquals($product->id, $course->product_id);
        $this->assertEquals('Test Course', $course->title);
    }

    public function test_order_can_track_affiliate_referral(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();
        $affiliate = Affiliate::factory()->create();
        
        $order = Order::factory()->create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'affiliate_id' => $affiliate->id,
            'amount' => 297000,
            'status' => 'paid',
        ]);

        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'product_id' => $product->id,
            'affiliate_id' => $affiliate->id,
            'amount' => 297000,
        ]);
    }
}