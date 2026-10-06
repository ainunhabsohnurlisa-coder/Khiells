<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Khiells — Aesthetic & Cute Fashion Boutique ✨</title>
    <meta name="description" content="Toko baju aesthetic, korean style, dan lucu dengan bahan premium ternyaman. Koleksi cardigan, crop tops, dress, hoodies dan aksesoris imut.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        khiells: {
                            50: '#fff5f7',
                            100: '#ffe4e9',
                            200: '#fecdd7',
                            300: '#fda4b8',
                            400: '#fb7193',
                            500: '#f43f6e',
                            600: '#e11d54',
                            700: '#be1243',
                            800: '#9f133d',
                            900: '#841538',
                        },
                        cream: '#FDFBF7',
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['"Playfair Display"', 'serif'],
                        outfit: ['"Outfit"', 'sans-serif'],
                    },
                    boxShadow: {
                        'soft': '0 10px 30px -5px rgba(244, 63, 110, 0.12), 0 4px 10px -3px rgba(0, 0, 0, 0.04)',
                        'cute': '0 8px 25px -4px rgba(251, 113, 147, 0.25)',
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.3/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        body {
            background-color: #FAF8F5;
            color: #33272A;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .cute-glass {
            background: rgba(255, 255, 255, 0.90);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
        }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #FDF2F4; }
        ::-webkit-scrollbar-thumb { background: #F472B6; border-radius: 999px; }
    </style>
</head>
<body x-data="storeApp()" x-cloak class="min-h-screen flex flex-col selection:bg-rose-200 selection:text-rose-900">

    <!-- Top Announcement Bar -->
    <div class="bg-gradient-to-r from-rose-400 via-pink-400 to-rose-300 text-white text-xs sm:text-sm py-2 px-4 text-center font-medium shadow-sm flex items-center justify-center gap-2">
        <span>✨ <strong>Promo Grand Opening Khiells!</strong> Gunakan voucher <span class="bg-white/20 px-2 py-0.5 rounded-full font-bold">KHIELLS10</span> diskon 10% • Gratis Ongkir se-Indonesia 🌸</span>
    </div>

    <!-- Main Navigation Header -->
    <header class="sticky top-0 z-40 cute-glass border-b border-rose-100 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo & Brand -->
                <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                    <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-rose-500 to-pink-300 flex items-center justify-center text-white shadow-cute transform group-hover:rotate-6 transition-transform">
                        <i class="fa-solid fa-wand-magic-sparkles text-lg"></i>
                    </div>
                    <div>
                        <span class="font-serif text-2xl sm:text-3xl font-bold tracking-tight bg-gradient-to-r from-rose-600 via-pink-500 to-rose-400 bg-clip-text text-transparent">
                            Khiells
                        </span>
                        <span class="block text-[10px] uppercase font-bold tracking-widest text-rose-400 -mt-1">
                            Aesthetic Apparel
                        </span>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex items-center gap-7 text-sm font-semibold text-gray-600">
                    <a href="{{ route('home') }}#home" class="hover:text-rose-500 transition-colors py-1">Beranda</a>
                    <a href="{{ route('home') }}#koleksi" class="hover:text-rose-500 transition-colors py-1 flex items-center gap-1.5">
                        <span>Koleksi Lucu</span>
                        <span class="px-1.5 py-0.5 text-[10px] font-bold bg-rose-100 text-rose-600 rounded-full">Baru</span>
                    </a>
                    <a href="{{ route('home') }}#lookbook" class="hover:text-rose-500 transition-colors py-1">OOTD Inspo</a>
                    <a href="{{ route('home') }}#testimoni" class="hover:text-rose-500 transition-colors py-1">Review</a>
                    <a href="{{ route('home') }}#tentang" class="hover:text-rose-500 transition-colors py-1">Tentang Kami</a>
                </nav>

                <!-- Action Icons (Auth, Wishlist, Cart) -->
                <div class="flex items-center gap-2.5 sm:gap-3">

                    <!-- Direct WA Chat Header Button -->
                    <a 
                        href="https://wa.me/6285174383657?text=Halo%20Admin%20Khiells%20✨%20saya%20mau%20tanya%20seputar%20koleksi%20baju%20aesthetic-nya" 
                        target="_blank"
                        class="hidden sm:flex items-center gap-1.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 px-3 py-1.5 rounded-full text-xs font-bold transition-all border border-emerald-200"
                        title="Chat WA: 0851-7438-3657"
                    >
                        <i class="fa-brands fa-whatsapp text-emerald-500 text-sm"></i>
                        <span>0851-7438-3657</span>
                    </a>

                    <!-- Auth Status Indicator -->
                    @auth
                        @if(auth()->user()->isAdmin())
                            <a 
                                href="{{ route('admin.dashboard') }}" 
                                class="bg-gradient-to-r from-amber-500 to-rose-500 hover:from-amber-600 hover:to-rose-600 text-white px-3.5 py-2 rounded-full font-bold text-xs shadow-sm flex items-center gap-1.5 transition-all transform hover:scale-105"
                            >
                                <i class="fa-solid fa-crown text-xs"></i>
                                <span>Dashboard Admin</span>
                            </a>
                        @else
                            <div class="relative" x-data="{ userMenu: false }">
                                <button @click="userMenu = !userMenu" class="flex items-center gap-1.5 bg-rose-50 text-rose-700 px-3 py-1.5 rounded-full text-xs font-bold hover:bg-rose-100 transition-all">
                                    <i class="fa-solid fa-circle-user text-rose-500 text-sm"></i>
                                    <span class="hidden sm:inline">{{ Str::limit(auth()->user()->name, 12) }}</span>
                                    <i class="fa-solid fa-chevron-down text-[10px]"></i>
                                </button>
                                <div x-show="userMenu" @click.away="userMenu = false" class="absolute right-0 mt-2 w-44 bg-white rounded-2xl shadow-xl border border-rose-100 p-2 text-xs space-y-1 z-50">
                                    <span class="block px-3 py-1.5 text-gray-400 text-[10px] font-bold uppercase">Akun Member</span>
                                    <span class="block px-3 py-1 font-semibold text-gray-800">{{ auth()->user()->name }}</span>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-3 py-1.5 text-rose-600 font-bold hover:bg-rose-50 rounded-xl flex items-center gap-1.5">
                                            <i class="fa-solid fa-right-from-bracket"></i>
                                            <span>Keluar (Logout)</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @else
                        <a 
                            href="{{ route('login') }}" 
                            class="text-xs font-bold text-gray-700 hover:text-rose-600 bg-white border border-rose-200 px-3.5 py-2 rounded-full transition-all flex items-center gap-1.5 shadow-sm"
                        >
                            <i class="fa-regular fa-user text-rose-400"></i>
                            <span>Masuk / Admin</span>
                        </a>
                    @endauth

                    <!-- Wishlist button -->
                    <button 
                        @click="showWishlistModal = true" 
                        class="relative w-10 h-10 rounded-full bg-rose-50 hover:bg-rose-100 text-rose-500 flex items-center justify-center transition-all hover:scale-105"
                        title="Wishlist Saya"
                    >
                        <i class="fa-regular fa-heart text-base"></i>
                        <span 
                            x-show="wishlist.length > 0" 
                            x-text="wishlist.length" 
                            class="absolute -top-1 -right-1 bg-rose-500 text-white text-[10px] font-bold w-5 h-5 rounded-full flex items-center justify-center border-2 border-white"
                        ></span>
                    </button>

                    <!-- Cart button -->
                    <button 
                        @click="isCartOpen = true" 
                        class="relative flex items-center gap-2 bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 text-white px-3.5 sm:px-4 py-2 rounded-full font-semibold text-xs sm:text-sm shadow-cute transition-all transform hover:scale-105"
                    >
                        <i class="fa-solid fa-bag-shopping"></i>
                        <span class="hidden sm:inline">Keranjang</span>
                        <span 
                            x-text="cartCount" 
                            class="bg-white text-rose-600 font-extrabold text-xs w-5 h-5 rounded-full flex items-center justify-center shadow-inner"
                        ></span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Page Content Slot -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer id="tentang" class="bg-white border-t border-rose-100 pt-16 pb-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <div class="space-y-4">
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-rose-500 to-pink-300 flex items-center justify-center text-white shadow-cute">
                            <i class="fa-solid fa-wand-magic-sparkles text-base"></i>
                        </div>
                        <span class="font-serif text-2xl font-bold bg-gradient-to-r from-rose-600 to-pink-500 bg-clip-text text-transparent">
                            Khiells
                        </span>
                    </div>
                    <p class="text-xs sm:text-sm text-gray-500 leading-relaxed">
                        Toko busana aesthetic dan trendi masa kini. Menghadirkan pakaian bernuansa Korea, coquette, dan pastel yang nyaman dengan bahan premium pilihan. ✨
                    </p>
                    <div class="flex items-center gap-3 text-rose-500 pt-2">
                        <a href="https://wa.me/6285174383657?text=Halo%20Admin%20Khiells%20✨" target="_blank" class="w-9 h-9 rounded-full bg-emerald-50 text-emerald-600 hover:bg-emerald-500 hover:text-white flex items-center justify-center transition-all" title="WhatsApp 0851-7438-3657"><i class="fa-brands fa-whatsapp text-base"></i></a>
                        <a href="#" class="w-9 h-9 rounded-full bg-rose-50 hover:bg-rose-500 hover:text-white flex items-center justify-center transition-all"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="w-9 h-9 rounded-full bg-rose-50 hover:bg-rose-500 hover:text-white flex items-center justify-center transition-all"><i class="fa-brands fa-tiktok"></i></a>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-gray-800 text-sm mb-4 tracking-wide uppercase font-outfit">Akses Toko & Akun</h4>
                    <ul class="space-y-2.5 text-xs sm:text-sm text-gray-500">
                        <li><a href="{{ route('login') }}" class="hover:text-rose-500 transition-colors">👑 Login Portal Admin</a></li>
                        <li><a href="{{ route('register') }}" class="hover:text-rose-500 transition-colors">🌸 Daftar Akun Pelanggan</a></li>
                        <li><a href="{{ route('home') }}#koleksi" class="hover:text-rose-500 transition-colors">✨ Koleksi Pakaian Terbaru</a></li>
                        <li><a href="{{ route('home') }}#testimoni" class="hover:text-rose-500 transition-colors">⭐ Ulasan Asli Pembeli</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-gray-800 text-sm mb-4 tracking-wide uppercase font-outfit">Layanan & Kontak Resmi</h4>
                    <ul class="space-y-2.5 text-xs sm:text-sm text-gray-500">
                        <li>
                            <a href="https://wa.me/6285174383657?text=Halo%20Admin%20Khiells%20✨%20saya%20mau%20konsultasi%20order" target="_blank" class="text-emerald-600 font-bold hover:underline flex items-center gap-1.5">
                                <i class="fa-brands fa-whatsapp"></i>
                                <span>WA Order: 0851-7438-3657</span>
                            </a>
                        </li>
                        <li><a href="#" class="hover:text-rose-500 transition-colors">Panduan Ukuran (Size Chart)</a></li>
                        <li><a href="#" class="hover:text-rose-500 transition-colors">Garansi Tukar Size 100%</a></li>
                        <li><a href="#" class="hover:text-rose-500 transition-colors">Cek Status Pengiriman</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-gray-800 text-sm mb-4 tracking-wide uppercase font-outfit">Pembayaran QRIS Resmi</h4>
                    <p class="text-xs text-gray-500 mb-2">
                        Merchant Resmi: <strong>AINUN HABSOH NURLISA, DIGITAL & KREATIF</strong><br>
                        NMID: <span class="font-mono text-gray-700">ID1026596814115</span>
                    </p>
                    <button 
                        @click="openQrisDirectModal()" 
                        class="mt-1 text-xs font-bold text-rose-600 bg-rose-50 hover:bg-rose-100 border border-rose-200 px-3 py-1.5 rounded-xl transition-all flex items-center gap-1.5"
                    >
                        <i class="fa-solid fa-qrcode"></i>
                        <span>Lihat Barcode QRIS Toko</span>
                    </button>
                    <div class="pt-3">
                        <span class="text-[11px] text-gray-400 block mb-1.5 font-medium">Bisa di-scan dari seluruh aplikasi:</span>
                        <div class="flex flex-wrap gap-1.5 text-xs text-gray-500 items-center">
                            <span class="px-2 py-0.5 bg-gray-50 rounded border border-gray-200 font-bold text-[10px]">GoPay</span>
                            <span class="px-2 py-0.5 bg-gray-50 rounded border border-gray-200 font-bold text-[10px]">BCA</span>
                            <span class="px-2 py-0.5 bg-gray-50 rounded border border-gray-200 font-bold text-[10px]">Mandiri</span>
                            <span class="px-2 py-0.5 bg-gray-50 rounded border border-gray-200 font-bold text-[10px]">BNI</span>
                            <span class="px-2 py-0.5 bg-gray-50 rounded border border-gray-200 font-bold text-[10px]">BRI</span>
                            <span class="px-2 py-0.5 bg-gray-50 rounded border border-gray-200 font-bold text-[10px]">ShopeePay</span>
                            <span class="px-2 py-0.5 bg-gray-50 rounded border border-gray-200 font-bold text-[10px]">Dana</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-12 pt-8 border-t border-rose-100 flex flex-col sm:flex-row items-center justify-between text-xs text-gray-400 gap-4">
                <p>© {{ date('Y') }} <strong>Khiells Apparel</strong>. All rights reserved. Dibuat dengan cinta & penuh estetika 🌸</p>
                <p class="flex items-center gap-1">
                    WhatsApp: <strong>0851-7438-3657</strong> • QRIS Gopay Merchant Aktif
                </p>
            </div>
        </div>
    </footer>

    <!-- ==================== INTERACTIVE SLIDE-OVER CART ==================== -->
    <div x-show="isCartOpen" class="fixed inset-0 z-50 overflow-hidden" role="dialog" aria-modal="true" x-cloak>
        <div x-show="isCartOpen" @click="isCartOpen = false" class="fixed inset-0 bg-black/40 backdrop-blur-sm transition-opacity"></div>

        <div class="fixed inset-y-0 right-0 max-w-full flex pl-10">
            <div x-show="isCartOpen" class="w-screen max-w-md bg-white shadow-2xl flex flex-col">
                <div class="p-6 bg-gradient-to-r from-rose-50 to-pink-50 border-b border-rose-100 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-rose-500 text-white flex items-center justify-center text-xs">
                            <i class="fa-solid fa-bag-shopping"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-gray-800">Keranjang Belanja</h2>
                            <p class="text-xs text-rose-500 font-medium" x-text="cart.length + ' jenis pakaian pilihan'"></p>
                        </div>
                    </div>
                    <button @click="isCartOpen = false" class="w-8 h-8 rounded-full bg-white text-gray-400 hover:text-gray-600 flex items-center justify-center shadow-sm">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <!-- Free Shipping Progress -->
                <div class="px-6 py-3 bg-rose-100/50 border-b border-rose-100">
                    <div class="flex justify-between items-center text-xs mb-1.5">
                        <span class="font-semibold text-rose-700">
                            <template x-if="cartTotal >= 150000">
                                <span>🎉 Selamat! Kamu dapat <strong>GRATIS ONGKIR!</strong></span>
                            </template>
                            <template x-if="cartTotal < 150000">
                                <span>Tambah <strong x-text="formatRupiah(150000 - cartTotal)"></strong> lagi untuk Gratis Ongkir! 🚚</span>
                            </template>
                        </span>
                    </div>
                    <div class="w-full bg-white rounded-full h-2 overflow-hidden shadow-inner">
                        <div class="bg-gradient-to-r from-pink-400 to-rose-500 h-2 rounded-full transition-all duration-500" :style="'width: ' + Math.min(100, (cartTotal / 150000) * 100) + '%'"></div>
                    </div>
                </div>

                <!-- Cart Items List -->
                <div class="flex-1 overflow-y-auto p-6 space-y-4">
                    <template x-if="cart.length === 0">
                        <div class="text-center py-16">
                            <div class="w-20 h-20 rounded-full bg-rose-50 text-rose-300 flex items-center justify-center mx-auto text-3xl mb-4">
                                <i class="fa-solid fa-bag-shopping"></i>
                            </div>
                            <h3 class="font-bold text-gray-700 text-base mb-1">Keranjangmu masih kosong 🥺</h3>
                            <p class="text-xs text-gray-400 max-w-xs mx-auto mb-6">Yuk intip koleksi cardigan, blouse, dan dress lucu Khiells untuk mengisi harimu!</p>
                            <button @click="isCartOpen = false" class="bg-rose-500 hover:bg-rose-600 text-white text-xs font-bold px-6 py-2.5 rounded-full shadow-cute transition-all">
                                Mulai Belanja Sekarang ✨
                            </button>
                        </div>
                    </template>

                    <template x-for="(item, index) in cart" :key="item.id + '-' + item.selectedSize + '-' + item.selectedColor">
                        <div class="flex gap-4 p-3 bg-rose-50/40 rounded-2xl border border-rose-100/60 relative group">
                            <img :src="item.image" :alt="item.name" class="w-20 h-24 object-cover rounded-xl shadow-sm">
                            <div class="flex-1 flex flex-col justify-between">
                                <div>
                                    <div class="flex justify-between items-start">
                                        <h4 class="text-xs font-bold text-gray-800 line-clamp-1" x-text="item.name"></h4>
                                        <button @click="removeFromCart(index)" class="text-gray-300 hover:text-rose-500 text-xs p-1">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </div>
                                    <p class="text-[11px] text-gray-500 mt-0.5">
                                        Size: <span class="font-medium text-rose-600" x-text="item.selectedSize"></span> | 
                                        Warna: <span class="font-medium text-gray-700" x-text="item.selectedColor"></span>
                                    </p>
                                </div>

                                <div class="flex items-center justify-between mt-2">
                                    <span class="text-xs font-bold text-rose-600" x-text="formatRupiah(item.price)"></span>
                                    <div class="flex items-center gap-2 bg-white rounded-lg border border-rose-200 px-2 py-0.5 shadow-sm">
                                        <button @click="updateQty(index, -1)" class="text-gray-400 hover:text-rose-600 text-xs px-1 font-bold">-</button>
                                        <span class="text-xs font-bold text-gray-700 min-w-[16px] text-center" x-text="item.qty"></span>
                                        <button @click="updateQty(index, 1)" class="text-gray-400 hover:text-rose-600 text-xs px-1 font-bold">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Cart Footer & Checkout Button -->
                <div x-show="cart.length > 0" class="p-6 bg-white border-t border-rose-100 space-y-4">
                    <div class="flex gap-2">
                        <input 
                            type="text" 
                            x-model="voucherCode" 
                            placeholder="Voucher (coba: KHIELLS10)" 
                            class="flex-1 text-xs px-3 py-2 rounded-xl border border-rose-200 bg-rose-50/30 uppercase font-semibold text-gray-700 focus:outline-none focus:ring-1 focus:ring-rose-400"
                        >
                        <button 
                            @click="applyVoucher()" 
                            class="bg-gray-800 hover:bg-black text-white text-xs font-semibold px-4 py-2 rounded-xl transition-all"
                        >
                            Pakai
                        </button>
                    </div>
                    <div x-show="discountAmount > 0" class="text-xs text-emerald-600 font-semibold flex items-center justify-between">
                        <span>Diskon Voucher (10%):</span>
                        <span x-text="'- ' + formatRupiah(discountAmount)"></span>
                    </div>

                    <div class="space-y-1.5 text-xs text-gray-500 pt-2 border-t border-dashed border-rose-200">
                        <div class="flex justify-between">
                            <span>Subtotal:</span>
                            <span class="font-bold text-gray-800" x-text="formatRupiah(cartTotal)"></span>
                        </div>
                        <div class="flex justify-between">
                            <span>Ongkos Kirim:</span>
                            <span class="font-bold" :class="cartTotal >= 150000 ? 'text-emerald-600' : 'text-gray-800'">
                                <template x-if="cartTotal >= 150000"><span>GRATIS (Rp 0)</span></template>
                                <template x-if="cartTotal < 150000"><span>Rp 15.000</span></template>
                            </span>
                        </div>
                        <div class="flex justify-between text-sm font-extrabold text-gray-800 pt-2 border-t border-rose-100">
                            <span>Total Tagihan:</span>
                            <span class="text-rose-600 text-base font-extrabold" x-text="formatRupiah(finalTotal)"></span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-2 pt-2">
                        <!-- Checkout Database Button -->
                        <button 
                            @click="openCheckoutModal()" 
                            class="w-full bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 text-white font-bold text-xs py-3 px-3 rounded-2xl shadow-cute transition-all transform hover:-translate-y-0.5 flex items-center justify-center gap-1.5"
                        >
                            <i class="fa-solid fa-credit-card"></i>
                            <span>Bayar & QRIS</span>
                        </button>
                        <!-- WhatsApp Direct Order Button -->
                        <button 
                            @click="checkoutViaWhatsApp()" 
                            class="w-full bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-xs py-3 px-3 rounded-2xl shadow-sm transition-all transform hover:-translate-y-0.5 flex items-center justify-center gap-1.5"
                            title="Kirim Pesanan ke WA 0851-7438-3657"
                        >
                            <i class="fa-brands fa-whatsapp text-base"></i>
                            <span>Order via WA</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==================== QUICK VIEW & REVIEW MODAL ==================== -->
    <div x-show="quickViewModal" class="fixed inset-0 z-50 overflow-y-auto" x-cloak>
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div @click="quickViewModal = false" class="fixed inset-0 bg-black/40 backdrop-blur-sm transition-opacity"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">
                <template x-if="selectedProduct">
                    <div>
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <!-- Image -->
                            <div class="relative bg-rose-50/50 p-6 flex items-center justify-center">
                                <img :src="selectedProduct.image" :alt="selectedProduct.name" class="w-full h-80 sm:h-96 object-cover rounded-2xl shadow-md">
                                <span class="absolute top-8 left-8 text-[10px] font-bold text-white px-2.5 py-1 rounded-full uppercase" :class="selectedProduct.badge_color" x-text="selectedProduct.badge"></span>
                            </div>

                            <!-- Details -->
                            <div class="p-6 sm:p-8 flex flex-col justify-between">
                                <div>
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <span class="text-[10px] font-bold uppercase tracking-wider text-rose-500 font-outfit" x-text="selectedProduct.category_name || selectedProduct.category"></span>
                                            <h3 class="text-xl font-bold text-gray-800 mt-1" x-text="selectedProduct.name"></h3>
                                        </div>
                                        <button @click="quickViewModal = false" class="w-8 h-8 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-500 flex items-center justify-center text-xs">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </div>

                                    <div class="flex items-center gap-2 mt-2 text-xs">
                                        <div class="flex text-amber-400">
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                        <span class="font-bold text-gray-700" x-text="selectedProduct.rating"></span>
                                        <span class="text-gray-300">•</span>
                                        <span class="text-gray-500" x-text="(selectedProduct.reviews ? selectedProduct.reviews.length : 0) + ' Ulasan Pembeli'"></span>
                                        <span class="text-gray-300">•</span>
                                        <span class="text-emerald-600 font-bold" x-text="'Stok: ' + selectedProduct.stock + ' pcs'"></span>
                                    </div>

                                    <div class="flex items-baseline gap-2 mt-4">
                                        <span class="text-2xl font-extrabold text-rose-600" x-text="formatRupiah(selectedProduct.price)"></span>
                                        <span class="text-xs text-gray-400 line-through" x-text="formatRupiah(selectedProduct.original_price)"></span>
                                        <span class="text-[11px] font-bold text-rose-500 bg-rose-100 px-2 py-0.5 rounded-full" x-text="'-' + selectedProduct.discount + '%'"></span>
                                    </div>

                                    <p class="text-xs text-gray-600 mt-3 leading-relaxed" x-text="selectedProduct.description"></p>

                                    <div class="mt-4 p-3 bg-rose-50/60 rounded-xl border border-rose-100 text-xs">
                                        <span class="font-bold text-rose-900 block mb-0.5">🧶 Bahan & Material:</span>
                                        <span class="text-gray-600" x-text="selectedProduct.material"></span>
                                    </div>

                                    <!-- Colors Selection -->
                                    <div class="mt-4">
                                        <label class="block text-xs font-bold text-gray-700 mb-2">Pilih Warna:</label>
                                        <div class="flex flex-wrap gap-2">
                                            <template x-for="c in selectedProduct.colors" :key="c.name">
                                                <button 
                                                    @click="activeColor = c.name" 
                                                    :class="activeColor === c.name ? 'ring-2 ring-rose-500 border-rose-500 bg-rose-50' : 'border-gray-200 hover:border-rose-300'"
                                                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-xl border text-xs font-medium transition-all"
                                                >
                                                    <span class="w-3.5 h-3.5 rounded-full border border-black/10 inline-block shadow-inner" :style="'background-color: ' + c.hex"></span>
                                                    <span x-text="c.name"></span>
                                                </button>
                                            </template>
                                        </div>
                                    </div>

                                    <!-- Size Selection -->
                                    <div class="mt-4">
                                        <label class="block text-xs font-bold text-gray-700 mb-2">Pilih Ukuran:</label>
                                        <div class="flex flex-wrap gap-2">
                                            <template x-for="s in selectedProduct.sizes" :key="s">
                                                <button 
                                                    @click="activeSize = s" 
                                                    :class="activeSize === s ? 'bg-rose-500 text-white font-bold' : 'bg-gray-50 text-gray-700 hover:bg-rose-50'"
                                                    class="px-3.5 py-1.5 rounded-xl text-xs border border-rose-100 transition-all"
                                                    x-text="s"
                                                ></button>
                                            </template>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6 pt-4 border-t border-gray-100 flex items-center gap-3">
                                    <button 
                                        @click="toggleWishlist(selectedProduct)" 
                                        class="w-12 h-12 rounded-2xl border border-rose-200 text-rose-500 hover:bg-rose-50 flex items-center justify-center transition-all shrink-0"
                                    >
                                        <i :class="isWishlisted(selectedProduct.id) ? 'fa-solid fa-heart text-rose-500' : 'fa-regular fa-heart'"></i>
                                    </button>
                                    <button 
                                        @click="addToCart(selectedProduct, activeColor, activeSize); quickViewModal = false;" 
                                        class="flex-1 bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 text-white font-bold py-3 px-6 rounded-2xl shadow-cute transition-all flex items-center justify-center gap-2 text-sm"
                                    >
                                        <i class="fa-solid fa-bag-shopping"></i>
                                        <span>Masukkan Keranjang</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Real Reviews Tab inside Quick View -->
                        <div class="p-6 sm:p-8 bg-gray-50/70 border-t border-gray-100">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="font-bold text-gray-800 text-sm flex items-center gap-2">
                                    <span>Ulasan Asli Pembeli</span>
                                    <span class="bg-rose-100 text-rose-600 px-2 py-0.5 rounded-full text-xs" x-text="selectedProduct.reviews ? selectedProduct.reviews.length : 0"></span>
                                </h4>
                                <button @click="showWriteReview = !showWriteReview" class="text-xs font-bold text-rose-500 hover:underline flex items-center gap-1">
                                    <i class="fa-solid fa-pencil"></i>
                                    <span>Tulis Ulasan & Rating</span>
                                </button>
                            </div>

                            <!-- Write Review Form -->
                            <div x-show="showWriteReview" class="mb-6 p-4 bg-white rounded-2xl border border-rose-100 shadow-sm text-xs space-y-3">
                                <h5 class="font-bold text-gray-800">Beri Bintang & Ceritakan Pengalamanmu ✨</h5>
                                <form @submit.prevent="submitReview(selectedProduct.id)">
                                    <div class="grid grid-cols-2 gap-3 mb-3">
                                        <div>
                                            <label class="block font-semibold text-gray-600 mb-1">Nama Kamu:</label>
                                            <input type="text" x-model="reviewForm.name" required placeholder="Aurel / @aurel_ootd" class="w-full px-3 py-2 border border-gray-200 rounded-xl focus:outline-none focus:ring-1 focus:ring-rose-400">
                                        </div>
                                        <div>
                                            <label class="block font-semibold text-gray-600 mb-1">Beri Bintang (1-5 ⭐):</label>
                                            <select x-model="reviewForm.rating" class="w-full px-3 py-2 border border-gray-200 rounded-xl focus:outline-none focus:ring-1 focus:ring-rose-400 bg-white">
                                                <option value="5">⭐⭐⭐⭐⭐ 5 Bintang (Suka Banget!)</option>
                                                <option value="4">⭐⭐⭐⭐ 4 Bintang (Bagus & Puas)</option>
                                                <option value="3">⭐⭐⭐ 3 Bintang (Lumayan)</option>
                                                <option value="2">⭐⭐ 2 Bintang (Kurang Pas)</option>
                                                <option value="1">⭐ 1 Bintang (Kecewa)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="block font-semibold text-gray-600 mb-1">Komentar & Ulasan Bahan:</label>
                                        <textarea x-model="reviewForm.comment" required rows="2" placeholder="Ceritakan bagaimana bahan, warna, dan kecocokan bajunya..." class="w-full px-3 py-2 border border-gray-200 rounded-xl focus:outline-none focus:ring-1 focus:ring-rose-400"></textarea>
                                    </div>
                                    <div class="flex justify-end gap-2">
                                        <button type="button" @click="showWriteReview = false" class="px-3 py-1.5 border border-gray-200 rounded-xl text-gray-600">Batal</button>
                                        <button type="submit" class="px-4 py-1.5 bg-rose-500 text-white rounded-xl font-bold shadow-cute">Kirim Ulasan</button>
                                    </div>
                                </form>
                            </div>

                            <!-- Reviews List -->
                            <div class="space-y-3 max-h-48 overflow-y-auto">
                                <template x-if="!selectedProduct.reviews || selectedProduct.reviews.length === 0">
                                    <p class="text-xs text-gray-400 text-center py-4">Jadilah yang pertama memberikan ulasan untuk pakaian ini! 💕</p>
                                </template>
                                <template x-for="r in selectedProduct.reviews" :key="r.id">
                                    <div class="p-3 bg-white rounded-2xl border border-gray-100 text-xs space-y-1">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-2">
                                                <span class="font-bold text-gray-800" x-text="r.customer_name"></span>
                                                <span class="text-[10px] text-gray-400" x-text="r.customer_city"></span>
                                            </div>
                                            <div class="flex text-amber-400 text-[10px]">
                                                <template x-for="star in r.rating" :key="star">
                                                    <i class="fa-solid fa-star"></i>
                                                </template>
                                            </div>
                                        </div>
                                        <p class="text-gray-600 italic text-[11px]" x-text="'\"' + r.comment + '\"'"></p>
                                    </div>
                                </template>
                            </div>
                        </div>

                    </div>
                </template>
            </div>
        </div>
    </div>

    <!-- ==================== REAL DATABASE CHECKOUT MODAL ==================== -->
    <div x-show="showCheckoutModal" class="fixed inset-0 z-50 overflow-y-auto" x-cloak>
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div @click="showCheckoutModal = false" class="fixed inset-0 bg-black/40 backdrop-blur-sm transition-opacity"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full p-6 sm:p-8">
                <div class="flex justify-between items-center pb-4 border-b border-rose-100 mb-4">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-rose-500 text-white flex items-center justify-center text-xs">
                            <i class="fa-solid fa-receipt"></i>
                        </div>
                        <h3 class="text-base font-bold text-gray-800">Form Pemesanan & Alamat</h3>
                    </div>
                    <button @click="showCheckoutModal = false" class="text-gray-400 hover:text-gray-600">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <form @submit.prevent="submitDatabaseOrder()" class="space-y-3.5 text-xs">
                    <div>
                        <label class="block font-semibold text-gray-700 mb-1">Nama Lengkap Pemesan:</label>
                        <input type="text" x-model="checkoutForm.name" required placeholder="Aurelia Putri" class="w-full px-3.5 py-2 rounded-xl border border-rose-200 focus:outline-none focus:ring-2 focus:ring-rose-400">
                    </div>
                    <div>
                        <label class="block font-semibold text-gray-700 mb-1">Nomor WhatsApp Kamu (Aktif):</label>
                        <input type="text" x-model="checkoutForm.phone" required placeholder="081234567890" class="w-full px-3.5 py-2 rounded-xl border border-rose-200 focus:outline-none focus:ring-2 focus:ring-rose-400">
                    </div>
                    <div>
                        <label class="block font-semibold text-gray-700 mb-1">Alamat Lengkap Pengiriman:</label>
                        <textarea x-model="checkoutForm.address" required rows="2" placeholder="Nama jalan, nomor rumah, RT/RW, Kecamatan, Kota / Kabupaten" class="w-full px-3.5 py-2 rounded-xl border border-rose-200 focus:outline-none focus:ring-2 focus:ring-rose-400"></textarea>
                    </div>
                    <div>
                        <label class="block font-semibold text-gray-700 mb-1">Pilih Metode Pembayaran:</label>
                        <select x-model="checkoutForm.payment" class="w-full px-3.5 py-2.5 rounded-xl border border-rose-200 focus:outline-none focus:ring-2 focus:ring-rose-400 bg-white font-bold text-gray-800">
                            <option value="QRIS">⚡ QRIS Gopay Merchant (BCA, GoPay, Dana, Mandiri, ShopeePay)</option>
                            <option value="BCA">Transfer Bank BCA</option>
                            <option value="Mandiri">Transfer Bank Mandiri</option>
                            <option value="COD">Bayar di Tempat (COD)</option>
                        </select>
                    </div>

                    <!-- Highlight QRIS Real Info -->
                    <template x-if="checkoutForm.payment === 'QRIS'">
                        <div class="p-3 bg-sky-50 rounded-2xl border border-sky-200 text-sky-900 flex items-start gap-2.5">
                            <div class="w-6 h-6 rounded-lg bg-sky-500 text-white flex items-center justify-center shrink-0 text-xs mt-0.5">
                                <i class="fa-solid fa-qrcode"></i>
                            </div>
                            <div class="text-[11px] leading-relaxed">
                                <strong class="text-sky-800">QRIS Resmi: AINUN HABSOH NURLISA</strong><br>
                                Barcode QRIS asli akan langsung tampil setelah Anda klik konfirmasi pesanan.
                            </div>
                        </div>
                    </template>

                    <div class="p-3 bg-rose-50/60 rounded-2xl border border-rose-100 text-xs space-y-1">
                        <div class="flex justify-between font-medium text-gray-600">
                            <span>Total Pembayaran:</span>
                            <span class="font-extrabold text-rose-600 text-sm" x-text="formatRupiah(finalTotal)"></span>
                        </div>
                        <p class="text-[11px] text-gray-400 italic">Pesanan akan tersimpan otomatis di Database Khiells & siap dikonfirmasi via WhatsApp 0851-7438-3657.</p>
                    </div>

                    <div class="mt-6 flex gap-3">
                        <button type="button" @click="showCheckoutModal = false" class="w-1/3 py-2.5 rounded-xl border border-gray-200 text-xs font-semibold text-gray-600 hover:bg-gray-50">
                            Batal
                        </button>
                        <button type="submit" :disabled="isSubmitting" class="w-2/3 bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 text-white text-xs font-bold py-2.5 rounded-xl shadow-cute transition-all flex items-center justify-center gap-1.5">
                            <span x-show="!isSubmitting">Proses & Lanjut Bayar ✨</span>
                            <span x-show="isSubmitting"><i class="fa-solid fa-spinner fa-spin"></i> Memproses...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ==================== REAL QRIS PAYMENT MODAL ==================== -->
    <div x-show="showQrisModal" class="fixed inset-0 z-50 overflow-y-auto" x-cloak>
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div @click="showQrisModal = false" class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-3xl text-center overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md sm:w-full p-6 sm:p-8">
                
                <!-- QRIS Header -->
                <div class="flex justify-between items-center pb-3 border-b border-gray-100 mb-4">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-sky-500 text-white flex items-center justify-center text-xs">
                            <i class="fa-solid fa-qrcode"></i>
                        </div>
                        <div class="text-left">
                            <h3 class="text-sm font-bold text-gray-800">Scan QRIS Pembayaran</h3>
                            <span class="text-[10px] text-gray-400">Gopay Merchant Standar Nasional</span>
                        </div>
                    </div>
                    <button @click="showQrisModal = false" class="text-gray-400 hover:text-gray-600">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <!-- Nominal Card -->
                <div class="bg-gradient-to-r from-rose-50 to-pink-50 p-4 rounded-2xl border border-rose-200 mb-4 text-center">
                    <span class="text-[11px] font-bold text-gray-500 uppercase tracking-wider block">Jumlah yang Harus Dibayar:</span>
                    <div class="flex items-center justify-center gap-2 mt-1">
                        <span class="text-2xl font-extrabold text-rose-600" x-text="formatRupiah(confirmedTotalAmount || finalTotal)"></span>
                        <button 
                            @click="navigator.clipboard.writeText(confirmedTotalAmount || finalTotal); triggerToast('Nominal berhasil disalin! ✨');" 
                            class="text-xs bg-white text-rose-600 px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-100 font-bold shadow-sm"
                            title="Salin Angka"
                        >
                            <i class="fa-regular fa-copy"></i>
                        </button>
                    </div>
                    <span class="text-[10px] text-gray-400 block mt-1">
                        No. Pesanan: <strong class="text-gray-700" x-text="confirmedOrderNumber || '#KH-ONLINE'"></strong>
                    </span>
                </div>

                <!-- Real User QRIS Image Display -->
                <div class="relative bg-white p-3 rounded-2xl border border-gray-200 shadow-sm max-w-[280px] mx-auto mb-4">
                    <img 
                        src="{{ asset('images/qris-khiells.jpg') }}" 
                        alt="QRIS AINUN HABSOH NURLISA" 
                        class="w-full h-auto rounded-xl object-contain mx-auto shadow"
                    >
                    <a 
                        href="{{ asset('images/qris-khiells.jpg') }}" 
                        download="QRIS-Khiells-Boutique.jpg"
                        class="mt-2.5 inline-flex items-center gap-1.5 text-[11px] font-bold text-gray-600 hover:text-rose-600 bg-gray-50 hover:bg-rose-50 px-3 py-1.5 rounded-xl border border-gray-200 transition-all w-full justify-center"
                    >
                        <i class="fa-solid fa-download"></i>
                        <span>Download Gambar QRIS</span>
                    </a>
                </div>

                <!-- Merchant Credentials Info -->
                <div class="text-[11px] text-gray-600 bg-gray-50 p-3 rounded-xl mb-5 space-y-0.5 text-left border border-gray-100">
                    <p><strong>Merchant:</strong> AINUN HABSOH NURLISA, DIGITAL & KREATIF</p>
                    <p><strong>NMID:</strong> <span class="font-mono">ID1026596814115</span></p>
                    <p class="text-[10px] text-emerald-600 font-semibold pt-1">
                        ✓ Mendukung pembayaran dari BCA, Mandiri, BRI, BNI, GoPay, OVO, ShopeePay, Dana & Bank Lainnya.
                    </p>
                </div>

                <!-- Action Buttons: Kirim Bukti ke WhatsApp -->
                <div class="space-y-2">
                    <button 
                        @click="sendProofToWhatsApp()" 
                        class="w-full bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-3 px-4 rounded-2xl text-xs sm:text-sm shadow-md transition-all flex items-center justify-center gap-2 transform hover:scale-105"
                    >
                        <i class="fa-brands fa-whatsapp text-lg"></i>
                        <span>Kirim Bukti Bayar ke WA (0851-7438-3657)</span>
                    </button>

                    <button 
                        @click="showQrisModal = false; orderSuccessModal = true;" 
                        class="w-full py-2.5 text-gray-500 hover:text-gray-700 text-xs font-semibold"
                    >
                        Saya Sudah Bayar, Tutup Halaman Ini
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- ==================== ORDER SUCCESS MODAL ==================== -->
    <div x-show="orderSuccessModal" class="fixed inset-0 z-50 overflow-y-auto" x-cloak>
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div @click="orderSuccessModal = false" class="fixed inset-0 bg-black/40 backdrop-blur-sm transition-opacity"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-3xl text-center overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md sm:w-full p-8">
                <div class="w-16 h-16 rounded-full bg-emerald-100 text-emerald-500 flex items-center justify-center mx-auto text-2xl mb-4 animate-bounce">
                    <i class="fa-solid fa-check"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-1">Pesanan Berhasil Dicatat! 🎉</h3>
                <p class="text-xs text-gray-500 mb-6 leading-relaxed">
                    Terima kasih telah berbelanja di <strong>Khiells</strong>! Data pesanan Anda telah tersimpan rapi di database toko dan siap kami proses.
                </p>
                <div class="bg-rose-50 p-4 rounded-2xl border border-rose-100 mb-6 text-xs text-left space-y-1.5">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Nomor Pesanan:</span>
                        <span class="font-bold text-rose-600" x-text="confirmedOrderNumber"></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Total Pembayaran:</span>
                        <span class="font-bold text-gray-800" x-text="formatRupiah(confirmedTotalAmount)"></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Metode Bayar:</span>
                        <span class="font-semibold text-gray-700" x-text="confirmedPaymentMethod"></span>
                    </div>
                </div>

                <div class="space-y-2">
                    <a 
                        :href="'https://wa.me/6285174383657?text=' + encodeURIComponent('Halo Admin Khiells ✨, saya mau konfirmasi pesanan ' + confirmedOrderNumber + ' atas nama ' + checkoutForm.name + ' sebesar ' + formatRupiah(confirmedTotalAmount))" 
                        target="_blank" 
                        class="w-full bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold py-3 rounded-2xl shadow-sm transition-all flex items-center justify-center gap-2"
                    >
                        <i class="fa-brands fa-whatsapp text-base"></i>
                        <span>Konfirmasi ke WhatsApp Toko</span>
                    </a>

                    <button @click="orderSuccessModal = false; isCartOpen = false;" class="w-full bg-rose-500 hover:bg-rose-600 text-white text-xs font-bold py-3 rounded-2xl shadow-cute transition-all">
                        Kembali Berbelanja ✨
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ==================== TOAST NOTIFICATION ==================== -->
    <div 
        x-show="showToast" 
        x-transition:enter="transform ease-out duration-300 transition"
        x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
        x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed bottom-6 right-6 z-50 bg-gray-900 text-white px-5 py-3.5 rounded-2xl shadow-2xl flex items-center gap-3 text-xs font-medium border border-white/10"
        x-cloak
    >
        <span class="text-rose-400 text-base"><i class="fa-solid fa-sparkles"></i></span>
        <span x-text="toastMessage"></span>
    </div>

    <!-- Floating WhatsApp Button (Real WA: 0851-7438-3657) -->
    <a 
        href="https://wa.me/6285174383657?text=Halo%20Admin%20Khiells%20✨%20saya%20mau%20tanya%20seputar%20koleksi%20baju%20aesthetic-nya" 
        target="_blank" 
        class="fixed bottom-6 left-6 z-40 bg-emerald-500 hover:bg-emerald-600 text-white w-12 h-12 sm:w-14 sm:h-14 rounded-full flex items-center justify-center shadow-lg transition-transform hover:scale-110 group"
        title="Chat WhatsApp: 0851-7438-3657"
    >
        <i class="fa-brands fa-whatsapp text-2xl"></i>
        <span class="absolute left-16 bg-gray-900 text-white text-xs font-medium px-3 py-1.5 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none shadow-md">
            WA Resmi: 0851-7438-3657 ✨
        </span>
    </a>

    <!-- Application Script Data Store (Alpine.js) -->
    <script>
        function storeApp() {
            return {
                isCartOpen: false,
                quickViewModal: false,
                showCheckoutModal: false,
                showQrisModal: false,
                orderSuccessModal: false,
                showWishlistModal: false,
                showWriteReview: false,
                showToast: false,
                toastMessage: '',
                searchQuery: '',
                isSubmitting: false,
                
                selectedProduct: null,
                activeColor: '',
                activeSize: '',

                voucherCode: '',
                discountAmount: 0,
                confirmedOrderNumber: '',
                confirmedTotalAmount: 0,
                confirmedPaymentMethod: 'QRIS',

                wishlist: [],
                cart: [],

                checkoutForm: {
                    name: '{{ auth()->check() ? auth()->user()->name : "" }}',
                    phone: '{{ auth()->check() ? auth()->user()->phone : "" }}',
                    address: '',
                    payment: 'QRIS'
                },

                reviewForm: {
                    name: '{{ auth()->check() ? auth()->user()->name : "" }}',
                    rating: 5,
                    comment: ''
                },

                init() {
                    const savedCart = localStorage.getItem('khiells_cart');
                    if (savedCart) {
                        try { this.cart = JSON.parse(savedCart); } catch(e){}
                    }
                    const savedWish = localStorage.getItem('khiells_wishlist');
                    if (savedWish) {
                        try { this.wishlist = JSON.parse(savedWish); } catch(e){}
                    }
                },

                get cartCount() {
                    return this.cart.reduce((total, item) => total + item.qty, 0);
                },

                get cartTotal() {
                    return this.cart.reduce((total, item) => total + (item.price * item.qty), 0);
                },

                get shippingFee() {
                    if (this.cart.length === 0) return 0;
                    return this.cartTotal >= 150000 ? 0 : 15000;
                },

                get finalTotal() {
                    const total = this.cartTotal + this.shippingFee - this.discountAmount;
                    return total > 0 ? total : 0;
                },

                formatRupiah(number) {
                    return 'Rp ' + Number(number).toLocaleString('id-ID');
                },

                triggerToast(msg) {
                    this.toastMessage = msg;
                    this.showToast = true;
                    setTimeout(() => { this.showToast = false; }, 3000);
                },

                openQuickView(product) {
                    this.selectedProduct = product;
                    this.activeColor = product.colors && product.colors.length ? product.colors[0].name : '';
                    this.activeSize = product.sizes && product.sizes.length ? product.sizes[0] : '';
                    this.showWriteReview = false;
                    this.quickViewModal = true;
                },

                addToCart(product, color = null, size = null) {
                    const chosenColor = color || (product.colors && product.colors.length ? product.colors[0].name : 'Standard');
                    const chosenSize = size || (product.sizes && product.sizes.length ? product.sizes[0] : 'All Size');

                    const existingIndex = this.cart.findIndex(
                        item => item.id === product.id && item.selectedColor === chosenColor && item.selectedSize === chosenSize
                    );

                    if (existingIndex > -1) {
                        this.cart[existingIndex].qty += 1;
                    } else {
                        this.cart.push({
                            id: product.id,
                            name: product.name,
                            price: product.price,
                            image: product.image,
                            selectedColor: chosenColor,
                            selectedSize: chosenSize,
                            qty: 1
                        });
                    }

                    this.saveCart();
                    this.triggerToast(`✨ "${product.name}" masuk ke keranjang!`);
                    this.isCartOpen = true;
                },

                updateQty(index, change) {
                    this.cart[index].qty += change;
                    if (this.cart[index].qty <= 0) {
                        this.cart.splice(index, 1);
                    }
                    this.saveCart();
                },

                removeFromCart(index) {
                    this.cart.splice(index, 1);
                    this.saveCart();
                    this.triggerToast('Item berhasil dihapus dari keranjang.');
                },

                saveCart() {
                    localStorage.setItem('khiells_cart', JSON.stringify(this.cart));
                },

                applyVoucher() {
                    if (this.voucherCode.trim().toUpperCase() === 'KHIELLS10') {
                        this.discountAmount = Math.round(this.cartTotal * 0.10);
                        this.triggerToast('🎉 Kode KHIELLS10 aktif! Diskon 10% berhasil dipasang.');
                    } else {
                        alert('Kode voucher tidak valid. Coba gunakan: KHIELLS10');
                    }
                },

                toggleWishlist(product) {
                    const idx = this.wishlist.findIndex(item => item.id === product.id);
                    if (idx > -1) {
                        this.wishlist.splice(idx, 1);
                        this.triggerToast(`Dihapus dari wishlist.`);
                    } else {
                        this.wishlist.push(product);
                        this.triggerToast(`💕 "${product.name}" ditambahkan ke wishlist!`);
                    }
                    localStorage.setItem('khiells_wishlist', JSON.stringify(this.wishlist));
                },

                isWishlisted(productId) {
                    return this.wishlist.some(item => item.id === productId);
                },

                openCheckoutModal() {
                    if (this.cart.length === 0) return;
                    this.isCartOpen = false;
                    this.showCheckoutModal = true;
                },

                openQrisDirectModal() {
                    this.confirmedTotalAmount = this.finalTotal > 0 ? this.finalTotal : 150000;
                    this.confirmedOrderNumber = 'KH-DIRECT';
                    this.showQrisModal = true;
                },

                // Real Database Checkout AJAX
                async submitDatabaseOrder() {
                    this.isSubmitting = true;
                    try {
                        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        const res = await fetch('{{ route("order.checkout") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': token,
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({
                                customer_name: this.checkoutForm.name,
                                customer_phone: this.checkoutForm.phone,
                                shipping_address: this.checkoutForm.address,
                                payment_method: this.checkoutForm.payment,
                                cart_items: this.cart,
                                voucher_code: this.voucherCode
                            })
                        });

                        const data = await res.json();
                        if (data.success) {
                            this.confirmedOrderNumber = data.order_number;
                            this.confirmedTotalAmount = data.total_amount;
                            this.confirmedPaymentMethod = this.checkoutForm.payment;
                            
                            this.showCheckoutModal = false;
                            this.cart = [];
                            this.saveCart();

                            // If QRIS selected, show Real QRIS Modal
                            if (this.checkoutForm.payment === 'QRIS') {
                                this.showQrisModal = true;
                            } else {
                                this.orderSuccessModal = true;
                            }
                        } else {
                            alert(data.message || 'Terjadi kesalahan saat memproses pesanan.');
                        }
                    } catch (err) {
                        alert('Gagal menghubungi server database.');
                    } finally {
                        this.isSubmitting = false;
                    }
                },

                // Send QRIS proof directly to WhatsApp 0851-7438-3657
                sendProofToWhatsApp() {
                    const orderNum = this.confirmedOrderNumber || '#KH-ORDER';
                    const name = this.checkoutForm.name || 'Pelanggan Khiells';
                    const amount = this.formatRupiah(this.confirmedTotalAmount || this.finalTotal);

                    const message = `Halo Admin Khiells ✨,\n\nSaya sudah melakukan pembayaran via *QRIS Gopay Merchant* untuk pesanan:\n` +
                        `• *No. Pesanan:* ${orderNum}\n` +
                        `• *Nama Pemesan:* ${name}\n` +
                        `• *Total Bayar:* ${amount}\n` +
                        `• *Merchant:* AINUN HABSOH NURLISA, DIGITAL & KREATIF\n\n` +
                        `Berikut saya kirimkan bukti screenshot transfernya ya kak. Mohon segera diproses pengirimannya. Terima kasih banyak! 💕🌸`;

                    const url = `https://wa.me/6285174383657?text=${encodeURIComponent(message)}`;
                    window.open(url, '_blank');
                },

                // Real Review Submission AJAX
                async submitReview(productId) {
                    try {
                        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        const res = await fetch('{{ route("review.store") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': token,
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({
                                product_id: productId,
                                customer_name: this.reviewForm.name,
                                rating: parseInt(this.reviewForm.rating),
                                comment: this.reviewForm.comment,
                                customer_city: 'Indonesia'
                            })
                        });

                        const data = await res.json();
                        if (data.success) {
                            this.triggerToast('⭐ Ulasan & rating berhasil disimpan ke database!');
                            this.showWriteReview = false;
                            this.reviewForm.comment = '';
                            if (this.selectedProduct && this.selectedProduct.reviews) {
                                this.selectedProduct.reviews.unshift({
                                    id: data.review.id,
                                    customer_name: data.review.customer_name,
                                    customer_city: data.review.customer_city,
                                    rating: data.review.rating,
                                    comment: data.review.comment
                                });
                            }
                        }
                    } catch (e) {
                        alert('Gagal mengirim ulasan.');
                    }
                },

                // Directly Order via WhatsApp 0851-7438-3657
                checkoutViaWhatsApp() {
                    if (this.cart.length === 0) return;
                    let message = `Halo Kak Admin Khiells ✨,\nSaya ingin order koleksi pakaian aesthetic ini:\n\n`;
                    this.cart.forEach((item, i) => {
                        message += `${i+1}. *${item.name}*\n   Size: ${item.selectedSize} | Warna: ${item.selectedColor}\n   Jumlah: ${item.qty} pcs = ${this.formatRupiah(item.price * item.qty)}\n\n`;
                    });
                    message += `----------------------------\n`;
                    message += `Subtotal: ${this.formatRupiah(this.cartTotal)}\n`;
                    if (this.discountAmount > 0) {
                        message += `Diskon Voucher: -${this.formatRupiah(this.discountAmount)}\n`;
                    }
                    message += `Ongkir: ${this.shippingFee === 0 ? 'GRATIS' : this.formatRupiah(this.shippingFee)}\n`;
                    message += `*Total Tagihan: ${this.formatRupiah(this.finalTotal)}*\n\n`;

                    if (this.checkoutForm.name) {
                        message += `Nama: ${this.checkoutForm.name}\n`;
                    }
                    if (this.checkoutForm.address) {
                        message += `Alamat Kirim: ${this.checkoutForm.address}\n\n`;
                    }
                    message += `Saya ingin bayar via *QRIS (Ainun Habsoh Nurlisa)*. Mohon konfirmasi ketersediaan stoknya ya kak 💕 Terima kasih!`;
                    
                    const url = `https://wa.me/6285174383657?text=${encodeURIComponent(message)}`;
                    window.open(url, '_blank');
                }
            }
        }
    </script>
</body>
</html>
