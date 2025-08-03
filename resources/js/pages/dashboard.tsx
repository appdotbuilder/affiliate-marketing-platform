import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

interface Props {
    stats: {
        total_products: number;
        total_courses: number;
        total_sales: number;
        total_earnings: number;
        pending_earnings: number;
        total_referrals: number;
    };
    affiliate: {
        id: number;
        affiliate_code: string;
        affiliate_link: string;
        total_earnings: number;
        pending_earnings: number;
        paid_earnings: number;
        total_referrals: number;
        total_sales: number;
        status: string;
    };
    recentProducts: Array<{
        id: number;
        name: string;
        price: number;
        type: string;
        status: string;
        image?: string;
    }>;
    recentOrders: Array<{
        id: number;
        order_number: string;
        amount: number;
        status: string;
        created_at: string;
        product: {
            name: string;
        };
        user: {
            name: string;
        };
    }>;
    [key: string]: unknown;
}

export default function Dashboard({ stats, affiliate, recentProducts, recentOrders }: Props) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard - Sistem Membership" />
            
            <div className="space-y-6">
                {/* Welcome Section */}
                <div className="bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl p-6 text-white">
                    <h1 className="text-2xl font-bold mb-2">🚀 Selamat Datang di MembershipPro!</h1>
                    <p className="opacity-90">Platform all-in-one untuk mengembangkan bisnis digital Anda</p>
                </div>

                {/* Quick Stats */}
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div className="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border">
                        <div className="flex items-center justify-between">
                            <div>
                                <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Total Produk</p>
                                <p className="text-2xl font-bold text-gray-900 dark:text-white">{stats.total_products}</p>
                            </div>
                            <div className="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center">
                                <span className="text-2xl">📦</span>
                            </div>
                        </div>
                    </div>

                    <div className="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border">
                        <div className="flex items-center justify-between">
                            <div>
                                <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Total Kursus</p>
                                <p className="text-2xl font-bold text-gray-900 dark:text-white">{stats.total_courses}</p>
                            </div>
                            <div className="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-lg flex items-center justify-center">
                                <span className="text-2xl">📚</span>
                            </div>
                        </div>
                    </div>

                    <div className="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border">
                        <div className="flex items-center justify-between">
                            <div>
                                <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Total Penjualan</p>
                                <p className="text-2xl font-bold text-gray-900 dark:text-white">{stats.total_sales}</p>
                            </div>
                            <div className="w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-lg flex items-center justify-center">
                                <span className="text-2xl">💰</span>
                            </div>
                        </div>
                    </div>

                    <div className="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border">
                        <div className="flex items-center justify-between">
                            <div>
                                <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Total Referral</p>
                                <p className="text-2xl font-bold text-gray-900 dark:text-white">{stats.total_referrals}</p>
                            </div>
                            <div className="w-12 h-12 bg-orange-100 dark:bg-orange-900 rounded-lg flex items-center justify-center">
                                <span className="text-2xl">🤝</span>
                            </div>
                        </div>
                    </div>
                </div>

                {/* Affiliate Section */}
                <div className="bg-white dark:bg-gray-800 rounded-xl shadow-sm border">
                    <div className="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h2 className="text-xl font-bold text-gray-900 dark:text-white flex items-center">
                            <span className="mr-2">🤝</span>
                            Dashboard Afiliasi Anda
                        </h2>
                    </div>
                    <div className="p-6">
                        <div className="grid md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label className="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Kode Afiliasi Anda
                                </label>
                                <div className="flex">
                                    <input
                                        type="text"
                                        value={affiliate.affiliate_code}
                                        readOnly
                                        className="flex-1 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-l-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white"
                                    />
                                    <button
                                        onClick={() => navigator.clipboard.writeText(affiliate.affiliate_code)}
                                        className="px-4 py-2 bg-blue-600 text-white rounded-r-lg hover:bg-blue-700 transition-colors"
                                    >
                                        📋 Copy
                                    </button>
                                </div>
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Link Afiliasi Anda
                                </label>
                                <div className="flex">
                                    <input
                                        type="text"
                                        value={affiliate.affiliate_link}
                                        readOnly
                                        className="flex-1 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-l-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white text-sm"
                                    />
                                    <button
                                        onClick={() => navigator.clipboard.writeText(affiliate.affiliate_link)}
                                        className="px-4 py-2 bg-purple-600 text-white rounded-r-lg hover:bg-purple-700 transition-colors"
                                    >
                                        📋 Copy
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div className="grid md:grid-cols-3 gap-4">
                            <div className="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                                <p className="text-sm text-green-600 dark:text-green-400 font-medium">Total Penghasilan</p>
                                <p className="text-xl font-bold text-green-800 dark:text-green-300">
                                    Rp {affiliate.total_earnings.toLocaleString('id-ID')}
                                </p>
                            </div>
                            <div className="bg-yellow-50 dark:bg-yellow-900/20 p-4 rounded-lg">
                                <p className="text-sm text-yellow-600 dark:text-yellow-400 font-medium">Pending</p>
                                <p className="text-xl font-bold text-yellow-800 dark:text-yellow-300">
                                    Rp {affiliate.pending_earnings.toLocaleString('id-ID')}
                                </p>
                            </div>
                            <div className="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                                <p className="text-sm text-blue-600 dark:text-blue-400 font-medium">Sudah Dicairkan</p>
                                <p className="text-xl font-bold text-blue-800 dark:text-blue-300">
                                    Rp {affiliate.paid_earnings.toLocaleString('id-ID')}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {/* Two Column Layout */}
                <div className="grid lg:grid-cols-2 gap-6">
                    {/* Recent Products */}
                    <div className="bg-white dark:bg-gray-800 rounded-xl shadow-sm border">
                        <div className="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h3 className="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                                <span className="mr-2">📦</span>
                                Produk Terbaru
                            </h3>
                        </div>
                        <div className="p-6">
                            {recentProducts.length === 0 ? (
                                <div className="text-center py-8">
                                    <p className="text-gray-500 dark:text-gray-400 mb-4">Belum ada produk</p>
                                    <button className="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                        ➕ Tambah Produk Pertama
                                    </button>
                                </div>
                            ) : (
                                <div className="space-y-4">
                                    {recentProducts.map((product) => (
                                        <div key={product.id} className="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                            <div>
                                                <p className="font-medium text-gray-900 dark:text-white">{product.name}</p>
                                                <p className="text-sm text-gray-500 dark:text-gray-400">
                                                    {product.type} • Rp {product.price.toLocaleString('id-ID')}
                                                </p>
                                            </div>
                                            <span className={`px-2 py-1 text-xs rounded-full ${
                                                product.status === 'active' 
                                                    ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300'
                                                    : 'bg-gray-100 text-gray-800 dark:bg-gray-600 dark:text-gray-300'
                                            }`}>
                                                {product.status === 'active' ? 'Aktif' : 'Draft'}
                                            </span>
                                        </div>
                                    ))}
                                </div>
                            )}
                        </div>
                    </div>

                    {/* Recent Orders */}
                    <div className="bg-white dark:bg-gray-800 rounded-xl shadow-sm border">
                        <div className="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h3 className="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                                <span className="mr-2">🛒</span>
                                Penjualan Afiliasi Terbaru
                            </h3>
                        </div>
                        <div className="p-6">
                            {recentOrders.length === 0 ? (
                                <div className="text-center py-8">
                                    <p className="text-gray-500 dark:text-gray-400 mb-2">Belum ada penjualan afiliasi</p>
                                    <p className="text-sm text-gray-400 dark:text-gray-500">
                                        Bagikan link afiliasi Anda untuk mulai mendapatkan komisi
                                    </p>
                                </div>
                            ) : (
                                <div className="space-y-4">
                                    {recentOrders.map((order) => (
                                        <div key={order.id} className="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                            <div>
                                                <p className="font-medium text-gray-900 dark:text-white">{order.product.name}</p>
                                                <p className="text-sm text-gray-500 dark:text-gray-400">
                                                    {order.user.name} • {new Date(order.created_at).toLocaleDateString('id-ID')}
                                                </p>
                                            </div>
                                            <div className="text-right">
                                                <p className="font-medium text-gray-900 dark:text-white">
                                                    Rp {order.amount.toLocaleString('id-ID')}
                                                </p>
                                                <span className={`px-2 py-1 text-xs rounded-full ${
                                                    order.status === 'paid' 
                                                        ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300'
                                                        : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300'
                                                }`}>
                                                    {order.status === 'paid' ? 'Lunas' : 'Pending'}
                                                </span>
                                            </div>
                                        </div>
                                    ))}
                                </div>
                            )}
                        </div>
                    </div>
                </div>

                {/* Quick Actions */}
                <div className="bg-white dark:bg-gray-800 rounded-xl shadow-sm border">
                    <div className="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 className="text-lg font-semibold text-gray-900 dark:text-white">⚡ Aksi Cepat</h3>
                    </div>
                    <div className="p-6">
                        <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <button className="p-4 text-left bg-blue-50 dark:bg-blue-900/20 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors">
                                <div className="text-2xl mb-2">📦</div>
                                <p className="font-medium text-gray-900 dark:text-white">Tambah Produk</p>
                                <p className="text-sm text-gray-500 dark:text-gray-400">Buat produk digital baru</p>
                            </button>
                            <button className="p-4 text-left bg-green-50 dark:bg-green-900/20 rounded-lg hover:bg-green-100 dark:hover:bg-green-900/30 transition-colors">
                                <div className="text-2xl mb-2">📚</div>
                                <p className="font-medium text-gray-900 dark:text-white">Buat Kursus</p>
                                <p className="text-sm text-gray-500 dark:text-gray-400">Siapkan materi pembelajaran</p>
                            </button>
                            <button className="p-4 text-left bg-purple-50 dark:bg-purple-900/20 rounded-lg hover:bg-purple-100 dark:hover:bg-purple-900/30 transition-colors">
                                <div className="text-2xl mb-2">📱</div>
                                <p className="font-medium text-gray-900 dark:text-white">Broadcast Campaign</p>
                                <p className="text-sm text-gray-500 dark:text-gray-400">Kirim email/WA massal</p>
                            </button>
                            <button className="p-4 text-left bg-orange-50 dark:bg-orange-900/20 rounded-lg hover:bg-orange-100 dark:hover:bg-orange-900/30 transition-colors">
                                <div className="text-2xl mb-2">🎯</div>
                                <p className="font-medium text-gray-900 dark:text-white">Sales Funnel</p>
                                <p className="text-sm text-gray-500 dark:text-gray-400">Buat funnel konversi</p>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}