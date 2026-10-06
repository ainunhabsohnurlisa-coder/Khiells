@extends('layouts.app')

@section('content')
<div x-data="{
    allProducts: {{ Js::from($products) }},
    activeCategory: 'all',
    searchTerm: '',
    sortOption: 'recommended',

    get filteredProducts() {
        return this.allProducts
            .filter(item => {
                const matchCategory = this.activeCategory === 'all' || item.category === this.activeCategory;
                const matchSearch = item.name.toLowerCase().includes(this.searchTerm.toLowerCase()) || 
                                    item.description.toLowerCase().includes(this.searchTerm.toLowerCase()) ||
                                    item.category.toLowerCase().includes(this.searchTerm.toLowerCase());
                return matchCategory && matchSearch;
            })
            .sort((a, b) => {
                if (this.sortOption === 'price-low') return a.price - b.price;
                if (this.sortOption === 'price-high') return b.price - a.price;
                if (this.sortOption === 'rating') return b.rating - a.rating;
                return 0; // recommended
            });
    }
}" id="home">

    <!-- ==================== HERO SECTION ==================== -->
    <section class="relative overflow-hidden pt-8 pb-16 sm:pt-12 sm:pb-24">
        <!-- Background Pastel Glow Elements -->
        <div class="absolute top-10 left-1/2 -translate-x-1/2 w-[700px] h-[400px] bg-gradient-to-tr from-pink-200/50 via-rose-100/40 to-purple-200/40 blur-3xl rounded-full -z-10 pointer-events-none"></div>
        <div class="absolute -top-10 -right-10 w-72 h-72 bg-amber-100/60 blur-2xl rounded-full -z-10 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Left Column: Copywriting & CTA -->
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    <!-- Cute Badge -->
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white border border-rose-200 shadow-sm text-xs font-bold text-rose-600">
                        <span class="w-2 h-2 rounded-full bg-rose-500 animate-ping"></span>
                        <span>✨ New Autumn-Spring Cute Drop is Here!</span>
                    </div>

                    <!-- Main Catchy Title -->
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-serif font-bold text-gray-900 leading-[1.15]">
                        Tampil Lucu & <span class="bg-gradient-to-r from-rose-600 via-pink-500 to-rose-400 bg-clip-text text-transparent">Aesthetic</span> Setiap Hari Bersama <span class="underline decoration-rose-300 decoration-wavy decoration-2">Khiells</span> 🌸
                    </h1>

                    <!-- Description -->
                    <p class="text-sm sm:text-base text-gray-600 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                        Pilihan pakaian ala Korea, coquette chic, dan cardigan rajut super lembut yang bikin kamu percaya diri. Bahannya adem, cutting-annya gemes, dan siap melengkapi OOTD estetikmu! ✨
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 pt-2">
                        <a 
                            href="#koleksi" 
                            class="bg-gradient-to-r from-rose-500 via-pink-500 to-rose-400 hover:from-rose-600 hover:to-pink-600 text-white font-bold text-sm px-8 py-3.5 rounded-full shadow-cute transition-all transform hover:scale-105 flex items-center gap-2"
                        >
                            <i class="fa-solid fa-bag-shopping"></i>
                            <span>Jelajahi Koleksi</span>
                        </a>

                        <a 
                            href="#lookbook" 
                            class="bg-white hover:bg-rose-50 border border-rose-200 text-rose-600 font-bold text-sm px-7 py-3.5 rounded-full shadow-sm transition-all hover:border-rose-300 flex items-center gap-2"
                        >
                            <i class="fa-solid fa-camera-retro"></i>
                            <span>Inspirasi OOTD</span>
                        </a>
                    </div>

                    <!-- Social Proof Micro Badge -->
                    <div class="pt-4 flex items-center justify-center lg:justify-start gap-6 text-xs text-gray-500 font-medium">
                        <div class="flex items-center gap-2">
                            <div class="flex -space-x-2">
                                <img class="w-8 h-8 rounded-full border-2 border-white object-cover" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" alt="Avatar">
                                <img class="w-8 h-8 rounded-full border-2 border-white object-cover" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=100&q=80" alt="Avatar">
                                <img class="w-8 h-8 rounded-full border-2 border-white object-cover" src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=100&q=80" alt="Avatar">
                            </div>
                            <span><strong>12.5k+</strong> Pelanggan Puas 💕</span>
                        </div>
                        <div class="flex items-center gap-1 text-amber-400 font-bold">
                            <i class="fa-solid fa-star"></i>
                            <span class="text-gray-700">4.9 / 5.0 (Rating Toko)</span>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Visual Collage -->
                <div class="lg:col-span-5 relative">
                    <div class="relative mx-auto max-w-sm sm:max-w-md">
                        <!-- Main Hero Photo Card -->
                        <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-white bg-white transform rotate-1 hover:rotate-0 transition-transform duration-500">
                            <img 
                                src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=900&q=80" 
                                alt="Khiells Aesthetic Fashion Model" 
                                class="w-full h-96 sm:h-[460px] object-cover"
                            >
                            <div class="p-4 bg-white flex items-center justify-between">
                                <div>
                                    <span class="text-[11px] font-bold text-rose-500 uppercase tracking-wider">Editor's Pick</span>
                                    <h4 class="text-sm font-bold text-gray-800">Cottagecore & Pastel Knitwear</h4>
                                </div>
                                <span class="bg-rose-100 text-rose-600 font-bold text-xs px-3 py-1 rounded-full">Baru ✨</span>
                            </div>
                        </div>

                        <!-- Floating Cute Pill 1 -->
                        <div class="absolute -top-4 -left-6 bg-white/95 backdrop-blur-md p-3 rounded-2xl shadow-cute border border-rose-100 flex items-center gap-3 animate-bounce" style="animation-duration: 3s;">
                            <div class="w-9 h-9 rounded-xl bg-rose-100 text-rose-500 flex items-center justify-center font-bold text-sm">
                                🎀
                            </div>
                            <div>
                                <span class="block text-[11px] font-bold text-gray-800">100% Cute Guaranteed</span>
                                <span class="block text-[10px] text-gray-400">Garansi tukar size</span>
                            </div>
                        </div>

                        <!-- Floating Cute Pill 2 -->
                        <div class="absolute -bottom-6 -right-6 bg-white/95 backdrop-blur-md p-3.5 rounded-2xl shadow-cute border border-rose-100 flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-pink-100 text-pink-500 flex items-center justify-center text-sm">
                                🚚
                            </div>
                            <div>
                                <span class="block text-[11px] font-bold text-gray-800">Gratis Ongkir!</span>
                                <span class="block text-[10px] text-emerald-600 font-semibold">Min. Belanja Rp 150rb</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ==================== VALUE PROPOSITIONS BAR ==================== -->
    <section class="border-y border-rose-100 bg-white/80 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
                
                <div class="flex items-center gap-3.5">
                    <div class="w-12 h-12 rounded-2xl bg-rose-50 text-rose-500 flex items-center justify-center text-xl shrink-0">
                        <i class="fa-solid fa-feather-pointed"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-xs sm:text-sm text-gray-800">Bahan Premium Lembut</h4>
                        <p class="text-[11px] sm:text-xs text-gray-500">Nyaman dipakai seharian tanpa gerah</p>
                    </div>
                </div>

                <div class="flex items-center gap-3.5">
                    <div class="w-12 h-12 rounded-2xl bg-pink-50 text-pink-500 flex items-center justify-center text-xl shrink-0">
                        <i class="fa-solid fa-gift"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-xs sm:text-sm text-gray-800">Aesthetic Packaging</h4>
                        <p class="text-[11px] sm:text-xs text-gray-500">Free box imut & stiker aesthetic</p>
                    </div>
                </div>

                <div class="flex items-center gap-3.5">
                    <div class="w-12 h-12 rounded-2xl bg-purple-50 text-purple-500 flex items-center justify-center text-xl shrink-0">
                        <i class="fa-solid fa-truck-fast"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-xs sm:text-sm text-gray-800">Kirim Cepat Se-Indonesia</h4>
                        <p class="text-[11px] sm:text-xs text-gray-500">Dikirim di hari yang sama</p>
                    </div>
                </div>

                <div class="flex items-center gap-3.5">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-500 flex items-center justify-center text-xl shrink-0">
                        <i class="fa-solid fa-shield-heart"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-xs sm:text-sm text-gray-800">Garansi Tukar Ukuran</h4>
                        <p class="text-[11px] sm:text-xs text-gray-500">Kebesaran/kekecilan bisa ditukar</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ==================== PRODUCT CATALOG SECTION ==================== -->
    <section id="koleksi" class="py-16 sm:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span class="text-xs font-bold text-rose-500 uppercase tracking-widest font-outfit">Katalog Lengkap Khiells</span>
                <h2 class="text-2xl sm:text-4xl font-serif font-bold text-gray-900 mt-1">
                    Koleksi Baju Tren & Lucu Pilihan ✨
                </h2>
                <p class="text-xs sm:text-sm text-gray-500 mt-2">
                    Setiap potong baju dirancang untuk memberikan look manis, modis, dan super aesthetic untuk feed Instagram atau TikTok-mu.
                </p>
            </div>

            <!-- Category Pills Navigation -->
            <div class="flex items-center justify-start sm:justify-center gap-2 overflow-x-auto pb-4 mb-8 no-scrollbar">
                @foreach($categories as $cat)
                    <button 
                        @click="activeCategory = '{{ $cat['id'] }}'"
                        :class="activeCategory === '{{ $cat['id'] }}' 
                            ? 'bg-rose-500 text-white font-bold shadow-cute scale-105' 
                            : 'bg-white hover:bg-rose-50 text-gray-600 border border-rose-200'"
                        class="px-4 py-2 rounded-full text-xs font-medium whitespace-nowrap transition-all flex items-center gap-1.5"
                    >
                        <span>{{ $cat['icon'] }}</span>
                        <span>{{ $cat['name'] }}</span>
                    </button>
                @endforeach
            </div>

            <!-- Filter & Sort Bar -->
            <div class="bg-white p-4 rounded-2xl border border-rose-100 shadow-sm mb-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="text-xs text-gray-500">
                    Menampilkan <span class="font-bold text-gray-800" x-text="filteredProducts.length"></span> produk lucu
                </div>

                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <label class="text-xs font-medium text-gray-500 whitespace-nowrap">Urutkan:</label>
                    <select 
                        x-model="sortOption" 
                        class="text-xs bg-rose-50/50 border border-rose-200 rounded-xl px-3 py-1.5 focus:outline-none focus:ring-1 focus:ring-rose-400 text-gray-700"
                    >
                        <option value="recommended">Paling Populer & Rekomendasi ✨</option>
                        <option value="price-low">Harga: Rendah ke Tinggi</option>
                        <option value="price-high">Harga: Tinggi ke Rendah</option>
                        <option value="rating">Rating Pembeli Tertinggi ⭐</option>
                    </select>
                </div>
            </div>

            <!-- Empty State if no product found -->
            <div x-show="filteredProducts.length === 0" class="text-center py-20 bg-white rounded-3xl border border-rose-100 p-8">
                <div class="text-4xl mb-3">🔍🥺</div>
                <h3 class="text-base font-bold text-gray-700">Produk Tidak Ditemukan</h3>
                <p class="text-xs text-gray-400 max-w-sm mx-auto mt-1 mb-4">Coba cari dengan kata kunci lain atau pilih kategori "Semua Koleksi".</p>
                <button @click="activeCategory = 'all'; searchTerm = '';" class="px-5 py-2 bg-rose-500 text-white rounded-full text-xs font-bold shadow-cute">
                    Reset Pencarian
                </button>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-7">
                <template x-for="item in filteredProducts" :key="item.id">
                    <div class="bg-white rounded-3xl overflow-hidden border border-rose-100/80 shadow-soft hover:shadow-xl transition-all duration-300 group flex flex-col justify-between">
                        
                        <!-- Top Image Area -->
                        <div class="relative overflow-hidden bg-rose-50/40">
                            <!-- Image with zoom hover effect -->
                            <img 
                                :src="item.image" 
                                :alt="item.name" 
                                class="w-full h-72 sm:h-80 object-cover object-center group-hover:scale-105 transition-transform duration-500 cursor-pointer"
                                @click="openQuickView(item)"
                            >

                            <!-- Badge -->
                            <span 
                                class="absolute top-3 left-3 text-[10px] font-extrabold text-white px-2.5 py-1 rounded-full uppercase tracking-wider shadow-sm"
                                :class="item.badge_color"
                                x-text="item.badge"
                            ></span>

                            <!-- Wishlist Button -->
                            <button 
                                @click="toggleWishlist(item)" 
                                class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/90 hover:bg-white text-rose-500 shadow-md flex items-center justify-center transition-all hover:scale-110"
                                title="Tambah ke Wishlist"
                            >
                                <i :class="isWishlisted(item.id) ? 'fa-solid fa-heart text-rose-500' : 'fa-regular fa-heart'"></i>
                            </button>

                            <!-- Quick View Overlay on Hover -->
                            <div class="absolute inset-x-0 bottom-3 px-4 flex justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                <button 
                                    @click="openQuickView(item)" 
                                    class="w-full bg-white/95 hover:bg-white text-gray-800 text-xs font-bold py-2 rounded-xl shadow-md transition-all flex items-center justify-center gap-1.5 border border-rose-100"
                                >
                                    <i class="fa-regular fa-eye"></i>
                                    <span>Lihat Detail & Ukuran</span>
                                </button>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-5 flex-1 flex flex-col justify-between">
                            <div>
                                <!-- Rating and Sold -->
                                <div class="flex items-center justify-between text-[11px] text-gray-400 mb-1.5">
                                    <div class="flex items-center gap-1 text-amber-400 font-bold">
                                        <i class="fa-solid fa-star"></i>
                                        <span class="text-gray-700" x-text="item.rating"></span>
                                    </div>
                                    <span x-text="item.sold_count + ' terjual'"></span>
                                </div>

                                <!-- Product Title -->
                                <h3 
                                    @click="openQuickView(item)"
                                    class="font-bold text-sm text-gray-800 hover:text-rose-500 cursor-pointer line-clamp-1 transition-colors" 
                                    x-text="item.name"
                                ></h3>

                                <!-- Material Subtext -->
                                <p class="text-[11px] text-gray-400 line-clamp-1 mt-0.5" x-text="item.material"></p>

                                <!-- Color Options Preview Swatches -->
                                <div class="flex items-center gap-1.5 mt-3">
                                    <template x-for="c in item.colors" :key="c.name">
                                        <span 
                                            class="w-3.5 h-3.5 rounded-full border border-black/10 shadow-inner" 
                                            :style="'background-color: ' + c.hex" 
                                            :title="c.name"
                                        ></span>
                                    </template>
                                </div>
                            </div>

                            <!-- Bottom Price & Cart Action -->
                            <div class="mt-4 pt-3 border-t border-rose-50 flex items-center justify-between">
                                <div>
                                    <span class="block text-xs text-gray-400 line-through" x-text="formatRupiah(item.original_price)"></span>
                                    <span class="block font-extrabold text-sm sm:text-base text-rose-600" x-text="formatRupiah(item.price)"></span>
                                </div>

                                <button 
                                    @click="addToCart(item)" 
                                    class="w-10 h-10 rounded-2xl bg-rose-50 hover:bg-rose-500 text-rose-500 hover:text-white flex items-center justify-center transition-all duration-200 transform hover:scale-105 shadow-sm"
                                    title="Tambah ke Keranjang"
                                >
                                    <i class="fa-solid fa-cart-plus text-sm"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </template>
            </div>

        </div>
    </section>

    <!-- ==================== FLASH PROMO BANNER ==================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-8">
        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-rose-500 via-pink-500 to-rose-400 p-8 sm:p-12 text-white shadow-cute">
            <div class="absolute -right-10 -bottom-10 w-80 h-80 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>

            <div class="relative z-10 max-w-xl space-y-4">
                <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-xs font-bold tracking-wider uppercase">
                    ⏳ Promo Kilat Terbatas
                </span>
                <h3 class="text-2xl sm:text-4xl font-serif font-bold leading-tight">
                    Diskon 25% Koleksi Rajut & Dress Akhir Pekan Ini!
                </h3>
                <p class="text-xs sm:text-sm text-rose-100 leading-relaxed">
                    Dapatkan bonus 1 lembar sticker pack estetik & free pouch serbaguna untuk setiap pembelian di atas Rp 200.000. Jangan sampai kehabisan warna favoritmu! 💕
                </p>
                <div class="pt-2 flex flex-wrap gap-4 items-center">
                    <a href="#koleksi" class="bg-white text-rose-600 hover:bg-rose-50 px-6 py-3 rounded-full text-xs font-bold shadow-md transition-all">
                        Klaim Promo Sekarang 🎀
                    </a>
                    <span class="text-xs font-semibold text-rose-100">
                        Gunakan kode voucher: <strong>KHIELLS10</strong>
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== LOOKBOOK & OOTD INSPIRATION ==================== -->
    <section id="lookbook" class="py-16 sm:py-20 bg-rose-50/40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-bold text-rose-500 uppercase tracking-widest font-outfit">Lookbook #KhiellsBabes</span>
                <h2 class="text-2xl sm:text-4xl font-serif font-bold text-gray-900 mt-1">
                    Inspirasi Mix & Match OOTD Lucu 📸
                </h2>
                <p class="text-xs sm:text-sm text-gray-500 mt-2">
                    Bingung mau mix & match outfit? Intip gaya padu padan aesthetic ini dan dapatkan look impianmu!
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($lookbooks as $look)
                    <div class="rounded-3xl overflow-hidden bg-white shadow-soft border border-rose-100 group transition-all duration-300 hover:-translate-y-1">
                        <div class="relative overflow-hidden h-80">
                            <img src="{{ $look['image'] }}" alt="{{ $look['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent flex flex-col justify-end p-5 text-white">
                                <span class="text-[10px] font-bold text-rose-300 uppercase tracking-widest font-outfit">{{ $look['style'] }}</span>
                                <h4 class="font-bold text-base mt-0.5">{{ $look['title'] }}</h4>
                                <p class="text-xs text-gray-200 mt-1 flex items-center gap-1.5">
                                    <i class="fa-solid fa-shirt text-[10px] text-rose-300"></i>
                                    <span>{{ $look['items'] }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ==================== TESTIMONIALS / REVIEW ==================== -->
    <section id="testimoni" class="py-16 sm:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-bold text-rose-500 uppercase tracking-widest font-outfit">Kata Mereka yang Sudah Beli</span>
                <h2 class="text-2xl sm:text-4xl font-serif font-bold text-gray-900 mt-1">
                    Cerita Manis dari Pembeli Khiells 💕
                </h2>
                <p class="text-xs sm:text-sm text-gray-500 mt-2">
                    Lebih dari ribuan perempuan telah mempercayakan pakaian harian dan OOTD estetik mereka kepada kami.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($testimonials as $testi)
                    <div class="bg-white p-7 rounded-3xl border border-rose-100 shadow-soft flex flex-col justify-between space-y-4">
                        <div class="space-y-3">
                            <!-- Star Rating -->
                            <div class="flex text-amber-400 text-xs">
                                @for($i = 0; $i < $testi['rating']; $i++)
                                    <i class="fa-solid fa-star"></i>
                                @endfor
                            </div>
                            <!-- Comment -->
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed italic">
                                "{{ $testi['comment'] }}"
                            </p>
                        </div>

                        <div class="pt-4 border-t border-rose-50 flex items-center gap-3">
                            <img src="{{ $testi['avatar'] }}" alt="{{ $testi['name'] }}" class="w-10 h-10 rounded-full object-cover border border-rose-200 shadow-sm">
                            <div>
                                <h4 class="font-bold text-xs text-gray-800">{{ $testi['name'] }}</h4>
                                <span class="text-[10px] text-gray-400">{{ $testi['city'] }} • <span class="text-rose-500 font-medium">Beli: {{ $testi['product'] }}</span></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
@endsection
