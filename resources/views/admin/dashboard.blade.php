@extends('admin.layout')

@section('header_title', 'Ringkasan Toko & Statistik ✨')

@section('admin_content')
<div class="space-y-8">
    
    <!-- Top Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        
        <!-- Revenue Card -->
        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Total Omzet Penjualan</span>
                <span class="text-xl sm:text-2xl font-extrabold text-gray-900 mt-1 block">
                    Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                </span>
                <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-emerald-600 mt-1">
                    <i class="fa-solid fa-arrow-trend-up"></i> Dari pesanan lunas
                </span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-rose-50 text-rose-500 flex items-center justify-center text-xl shrink-0">
                <i class="fa-solid fa-wallet"></i>
            </div>
        </div>

        <!-- Orders Card -->
        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Pesanan Masuk</span>
                <span class="text-xl sm:text-2xl font-extrabold text-gray-900 mt-1 block">
                    {{ $totalOrders }} Pesanan
                </span>
                <a href="{{ route('admin.orders') }}" class="text-[11px] font-bold text-rose-500 hover:underline mt-1 inline-block">
                    Kelola Pengiriman →
                </a>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-pink-50 text-pink-500 flex items-center justify-center text-xl shrink-0">
                <i class="fa-solid fa-box-open"></i>
            </div>
        </div>

        <!-- Products Card -->
        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Koleksi Baju Aktif</span>
                <span class="text-xl sm:text-2xl font-extrabold text-gray-900 mt-1 block">
                    {{ $totalProducts }} Model
                </span>
                <a href="{{ route('admin.products.create') }}" class="text-[11px] font-bold text-rose-500 hover:underline mt-1 inline-block">
                    + Tambah Baju Baru
                </a>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-purple-50 text-purple-500 flex items-center justify-center text-xl shrink-0">
                <i class="fa-solid fa-shirt"></i>
            </div>
        </div>

        <!-- Rating Card -->
        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Rata-Rata Rating</span>
                <div class="flex items-center gap-2 mt-1">
                    <span class="text-xl sm:text-2xl font-extrabold text-gray-900">{{ $avgRating }}</span>
                    <div class="flex text-amber-400 text-xs">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
                <span class="text-[11px] text-gray-400 block mt-1">Dari {{ $totalReviews }} ulasan pembeli</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-500 flex items-center justify-center text-xl shrink-0">
                <i class="fa-solid fa-star"></i>
            </div>
        </div>

    </div>

    <!-- Grid: Recent Orders & Recent Reviews -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Left: Pesanan Terbaru (Col 8) -->
        <div class="lg:col-span-8 bg-white p-6 rounded-3xl border border-gray-100 shadow-sm space-y-5">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-gray-800 text-base">Pesanan Pelanggan Terbaru 🛍️</h3>
                    <p class="text-xs text-gray-400">Daftar transaksi masuk yang perlu diproses</p>
                </div>
                <a href="{{ route('admin.orders') }}" class="text-xs font-bold text-rose-500 hover:underline">
                    Lihat Semua ({{ $totalOrders }})
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="text-gray-400 border-b border-gray-100 pb-3 font-semibold uppercase text-[10px]">
                            <th class="py-3">No. Pesanan</th>
                            <th class="py-3">Nama Pembeli</th>
                            <th class="py-3">Metode</th>
                            <th class="py-3">Total</th>
                            <th class="py-3">Status</th>
                            <th class="py-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($recentOrders as $order)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="py-3.5 font-bold text-gray-900">{{ $order->order_number }}</td>
                                <td class="py-3.5">
                                    <span class="font-medium text-gray-800 block">{{ $order->customer_name }}</span>
                                    <span class="text-[10px] text-gray-400">{{ $order->customer_phone }}</span>
                                </td>
                                <td class="py-3.5">
                                    <span class="px-2 py-0.5 rounded bg-gray-100 font-bold text-[10px]">{{ $order->payment_method }}</span>
                                </td>
                                <td class="py-3.5 font-bold text-rose-600">
                                    Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                                </td>
                                <td class="py-3.5">
                                    @if($order->order_status === 'diproses')
                                        <span class="px-2.5 py-1 bg-amber-50 text-amber-600 font-bold rounded-full text-[10px]">Diproses</span>
                                    @elseif($order->order_status === 'dikirim')
                                        <span class="px-2.5 py-1 bg-sky-50 text-sky-600 font-bold rounded-full text-[10px]">Dikirim</span>
                                    @elseif($order->order_status === 'selesai')
                                        <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 font-bold rounded-full text-[10px]">Selesai</span>
                                    @else
                                        <span class="px-2.5 py-1 bg-gray-100 text-gray-600 font-bold rounded-full text-[10px]">{{ $order->order_status }}</span>
                                    @endif
                                </td>
                                <td class="py-3.5 text-right">
                                    <a href="{{ route('admin.orders') }}" class="text-gray-400 hover:text-rose-500 font-bold text-xs p-1">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-8 text-center text-gray-400">Belum ada pesanan masuk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Right: Ulasan Terbaru (Col 4) -->
        <div class="lg:col-span-4 bg-white p-6 rounded-3xl border border-gray-100 shadow-sm space-y-5">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-gray-800 text-base">Ulasan Terbaru ⭐</h3>
                    <p class="text-xs text-gray-400">Feedback langsung pembeli</p>
                </div>
                <a href="{{ route('admin.reviews') }}" class="text-xs font-bold text-rose-500 hover:underline">
                    Semua
                </a>
            </div>

            <div class="space-y-4">
                @forelse($recentReviews as $rev)
                    <div class="p-3.5 rounded-2xl bg-rose-50/40 border border-rose-100/60 text-xs space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="font-bold text-gray-800">{{ $rev->customer_name }}</span>
                            <div class="flex text-amber-400 text-[10px]">
                                @for($i = 0; $i < $rev->rating; $i++)
                                    <i class="fa-solid fa-star"></i>
                                @endfor
                            </div>
                        </div>
                        <p class="text-gray-600 line-clamp-2 italic text-[11px]">
                            "{{ $rev->comment }}"
                        </p>
                        <div class="text-[10px] text-rose-500 font-medium">
                            Produk: {{ $rev->product ? $rev->product->name : '-' }}
                        </div>
                    </div>
                @empty
                    <p class="text-xs text-gray-400 text-center py-6">Belum ada ulasan.</p>
                @endforelse
            </div>
        </div>

    </div>

</div>
@endsection
