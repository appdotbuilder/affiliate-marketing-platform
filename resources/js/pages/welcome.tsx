import { type SharedData } from '@/types';
import { Head, Link, usePage } from '@inertiajs/react';

export default function Welcome() {
    const { auth } = usePage<SharedData>().props;

    return (
        <>
            <Head title="Sistem Membership Digital Indonesia">
                <meta name="description" content="Platform all-in-one untuk pemasaran produk digital dengan sistem afiliasi otomatis, LMS, dan broadcast WhatsApp & Email" />
            </Head>
            <div className="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-purple-900">
                {/* Header */}
                <header className="container mx-auto px-6 py-4">
                    <nav className="flex items-center justify-between">
                        <div className="flex items-center space-x-2">
                            <div className="w-8 h-8 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                                <span className="text-white font-bold text-sm">M</span>
                            </div>
                            <span className="font-bold text-xl text-gray-800 dark:text-white">MembershipPro</span>
                        </div>
                        <div className="flex items-center space-x-4">
                            {auth.user ? (
                                <Link
                                    href={route('dashboard')}
                                    className="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-2 rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg"
                                >
                                    Dashboard
                                </Link>
                            ) : (
                                <>
                                    <Link
                                        href={route('login')}
                                        className="text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-white transition-colors"
                                    >
                                        Masuk
                                    </Link>
                                    <Link
                                        href={route('register')}
                                        className="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-2 rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg"
                                    >
                                        Daftar Gratis
                                    </Link>
                                </>
                            )}
                        </div>
                    </nav>
                </header>

                {/* Hero Section */}
                <section className="container mx-auto px-6 py-20 text-center">
                    <div className="max-w-4xl mx-auto">
                        <h1 className="text-5xl md:text-6xl font-bold text-gray-800 dark:text-white mb-6">
                            🚀 Sistem Membership Digital 
                            <span className="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent"> All-in-One</span>
                        </h1>
                        <p className="text-xl text-gray-600 dark:text-gray-300 mb-8">
                            Platform lengkap untuk pebisnis digital dengan sistem afiliasi otomatis, 
                            LMS profesional, dan campaign broadcast WhatsApp & Email
                        </p>
                        
                        {!auth.user && (
                            <div className="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">
                                <Link
                                    href={route('register')}
                                    className="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-xl"
                                >
                                    🎯 Mulai Gratis Sekarang
                                </Link>
                                <Link
                                    href={route('login')}
                                    className="border-2 border-gray-300 text-gray-700 dark:text-gray-300 dark:border-gray-600 px-8 py-4 rounded-lg text-lg font-semibold hover:border-blue-500 hover:text-blue-600 transition-all duration-200"
                                >
                                    Sudah Punya Akun?
                                </Link>
                            </div>
                        )}
                    </div>
                </section>

                {/* Features Section */}
                <section className="container mx-auto px-6 py-16">
                    <div className="text-center mb-16">
                        <h2 className="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                            ✨ Fitur Lengkap untuk Kesuksesan Digital Anda
                        </h2>
                        <p className="text-gray-600 dark:text-gray-300 text-lg">
                            Semua yang Anda butuhkan dalam satu platform terintegrasi
                        </p>
                    </div>

                    <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div className="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                            <div className="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center mb-4">
                                <span className="text-2xl">🤝</span>
                            </div>
                            <h3 className="font-bold text-xl mb-3 text-gray-800 dark:text-white">Sistem Afiliasi Otomatis</h3>
                            <p className="text-gray-600 dark:text-gray-300">
                                Setiap user otomatis jadi afiliasi dengan link unik, tracking komisi real-time, dan sistem multi-tier
                            </p>
                        </div>

                        <div className="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                            <div className="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-lg flex items-center justify-center mb-4">
                                <span className="text-2xl">📚</span>
                            </div>
                            <h3 className="font-bold text-xl mb-3 text-gray-800 dark:text-white">LMS Profesional</h3>
                            <p className="text-gray-600 dark:text-gray-300">
                                Platform learning lengkap dengan video YouTube, tracking progress, dan sertifikat digital otomatis
                            </p>
                        </div>

                        <div className="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                            <div className="w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-lg flex items-center justify-center mb-4">
                                <span className="text-2xl">📱</span>
                            </div>
                            <h3 className="font-bold text-xl mb-3 text-gray-800 dark:text-white">Broadcast WhatsApp & Email</h3>
                            <p className="text-gray-600 dark:text-gray-300">
                                Kirim pesan massal, buat template, dan campaign terjadwal untuk nurturing leads otomatis
                            </p>
                        </div>

                        <div className="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                            <div className="w-12 h-12 bg-orange-100 dark:bg-orange-900 rounded-lg flex items-center justify-center mb-4">
                                <span className="text-2xl">🎯</span>
                            </div>
                            <h3 className="font-bold text-xl mb-3 text-gray-800 dark:text-white">Sales Funnel Otomatis</h3>
                            <p className="text-gray-600 dark:text-gray-300">
                                Landing page builder, form capture, email sequence, dan tracking konversi lengkap
                            </p>
                        </div>

                        <div className="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                            <div className="w-12 h-12 bg-red-100 dark:bg-red-900 rounded-lg flex items-center justify-center mb-4">
                                <span className="text-2xl">🏆</span>
                            </div>
                            <h3 className="font-bold text-xl mb-3 text-gray-800 dark:text-white">Sertifikat Digital</h3>
                            <p className="text-gray-600 dark:text-gray-300">
                                Generate sertifikat otomatis setelah menyelesaikan kursus dengan template yang dapat dikustomisasi
                            </p>
                        </div>

                        <div className="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                            <div className="w-12 h-12 bg-yellow-100 dark:bg-yellow-900 rounded-lg flex items-center justify-center mb-4">
                                <span className="text-2xl">📊</span>
                            </div>
                            <h3 className="font-bold text-xl mb-3 text-gray-800 dark:text-white">Analytics & Reporting</h3>
                            <p className="text-gray-600 dark:text-gray-300">
                                Dashboard lengkap dengan statistik penjualan, komisi afiliasi, dan performance tracking
                            </p>
                        </div>
                    </div>
                </section>

                {/* Target Users */}
                <section className="bg-gradient-to-r from-blue-600 to-purple-600 py-16">
                    <div className="container mx-auto px-6 text-center text-white">
                        <h2 className="text-3xl font-bold mb-8">🎯 Cocok untuk Siapa Saja</h2>
                        <div className="grid md:grid-cols-3 lg:grid-cols-6 gap-6">
                            <div className="text-center">
                                <div className="text-3xl mb-2">💼</div>
                                <p className="font-semibold">Pebisnis Digital</p>
                            </div>
                            <div className="text-center">
                                <div className="text-3xl mb-2">🎨</div>
                                <p className="font-semibold">Content Creator</p>
                            </div>
                            <div className="text-center">
                                <div className="text-3xl mb-2">👨‍🏫</div>
                                <p className="font-semibold">Trainer & Mentor</p>
                            </div>
                            <div className="text-center">
                                <div className="text-3xl mb-2">🤝</div>
                                <p className="font-semibold">Affiliate Marketer</p>
                            </div>
                            <div className="text-center">
                                <div className="text-3xl mb-2">📦</div>
                                <p className="font-semibold">Pemilik Produk</p>
                            </div>
                            <div className="text-center">
                                <div className="text-3xl mb-2">🛒</div>
                                <p className="font-semibold">Reseller</p>
                            </div>
                        </div>
                    </div>
                </section>

                {/* CTA Section */}
                {!auth.user && (
                    <section className="container mx-auto px-6 py-20 text-center">
                        <div className="max-w-3xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-12">
                            <h2 className="text-3xl font-bold text-gray-800 dark:text-white mb-6">
                                🚀 Siap Memulai Bisnis Digital Anda?
                            </h2>
                            <p className="text-xl text-gray-600 dark:text-gray-300 mb-8">
                                Bergabung dengan ribuan entrepreneur yang sudah sukses menggunakan platform kami
                            </p>
                            <Link
                                href={route('register')}
                                className="inline-block bg-gradient-to-r from-blue-600 to-purple-600 text-white px-12 py-4 rounded-lg text-xl font-bold hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-xl"
                            >
                                💎 Daftar Sekarang - GRATIS!
                            </Link>
                            <p className="text-sm text-gray-500 dark:text-gray-400 mt-4">
                                ✅ Tanpa biaya bulanan • ✅ Setup dalam 5 menit • ✅ Support 24/7
                            </p>
                        </div>
                    </section>
                )}

                {/* Footer */}
                <footer className="bg-gray-800 dark:bg-gray-900 text-white py-8">
                    <div className="container mx-auto px-6 text-center">
                        <div className="flex items-center justify-center space-x-2 mb-4">
                            <div className="w-8 h-8 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                                <span className="text-white font-bold text-sm">M</span>
                            </div>
                            <span className="font-bold text-xl">MembershipPro</span>
                        </div>
                        <p className="text-gray-400 mb-4">
                            Platform All-in-One untuk Kesuksesan Bisnis Digital Indonesia
                        </p>
                        <p className="text-sm text-gray-500">
                            Built with ❤️ by{" "}
                            <a 
                                href="https://app.build" 
                                target="_blank" 
                                className="text-blue-400 hover:underline"
                            >
                                app.build
                            </a>
                        </p>
                    </div>
                </footer>
            </div>
        </>
    );
}