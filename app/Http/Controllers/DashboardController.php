<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Models\Product;
use App\Models\Order;
use App\Models\Course;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display the main dashboard.
     */
    public function index()
    {
        $user = auth()->user();
        
        // Get or create affiliate for current user
        $affiliate = Affiliate::firstOrCreate(
            ['user_id' => $user->id],
            [
                'affiliate_code' => 'AF' . str_pad((string)$user->id, 6, '0', STR_PAD_LEFT),
                'affiliate_link' => url('/?ref=AF' . str_pad((string)$user->id, 6, '0', STR_PAD_LEFT)),
            ]
        );

        // Dashboard statistics
        $stats = [
            'total_products' => Product::active()->count(),
            'total_courses' => Course::active()->count(),
            'total_sales' => Order::paid()->count(),
            'total_earnings' => $affiliate->total_earnings,
            'pending_earnings' => $affiliate->pending_earnings,
            'total_referrals' => $affiliate->total_referrals,
        ];

        // Recent products
        $recentProducts = Product::active()
            ->latest()
            ->take(6)
            ->get();

        // Recent orders for affiliate
        $recentOrders = Order::with(['product', 'user'])
            ->where('affiliate_id', $affiliate->id)
            ->latest()
            ->take(5)
            ->get();

        return Inertia::render('dashboard', [
            'stats' => $stats,
            'affiliate' => $affiliate,
            'recentProducts' => $recentProducts,
            'recentOrders' => $recentOrders,
        ]);
    }
}