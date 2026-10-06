@extends('admin.layout')

@section('header_title', 'Katalog Produk Pakaian 👗')

@section('admin_content')
<div class="space-y-6">

    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-5 rounded-3xl border border-gray-100 shadow-sm">
        <div>
            <h3 class="font-bold text-gray-800 text-base">Semua Koleksi Baju Khiells</h3>
            <p class="text-xs text-gray-400">Total {{ $products->count() }} varian baju terdaftar di database</p>
        </div>

        <a 
            href="{{ route('admin.products.create') }}" 
            class="bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 text-white font-bold text-xs px-5 py-3 rounded-2xl shadow-cute transition-all transform hover:scale-105 flex items-center justify-center gap-2"
        >
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Baju Baru ✨</span>
        </a>
    </div>

    <!-- Products Table -->
    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-gray-50/70 border-b border-gray-100 text-gray-400 uppercase text-[10px] font-semibold">
                    <tr>
                        <th class="py-4 px-6">Produk</th>
                        <th class="py-4 px-4">Kategori</th>
                        <th class="py-4 px-4">Harga Jual</th>
                        <th class="py-4 px-4">Stok</th>
                        <th class="py-4 px-4">Rating / Ulasan</th>
                        <th class="py-4 px-4">Badge</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($products as $prod)
                        <tr class="hover:bg-rose-50/20 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <img src="{{ $prod->image }}" alt="{{ $prod->name }}" class="w-12 h-14 object-cover rounded-xl shadow-sm border border-gray-100">
                                    <div>
                                        <span class="font-bold text-gray-900 block text-xs line-clamp-1">{{ $prod->name }}</span>
                                        <span class="text-[10px] text-gray-400 block line-clamp-1">{{ $prod->material }}</span>
                                    </div>
                                </div>
                            </td>

                            <td class="py-4 px-4">
                                <span class="px-2.5 py-1 bg-gray-100 text-gray-700 rounded-full font-medium text-[10px]">
                                    {{ $prod->category ? $prod->category->name : '-' }}
                                </span>
                            </td>

                            <td class="py-4 px-4 font-bold text-rose-600">
                                Rp {{ number_format($prod->price, 0, ',', '.') }}
                                @if($prod->discount > 0)
                                    <span class="block text-[10px] text-gray-400 font-normal line-through">
                                        Rp {{ number_format($prod->original_price, 0, ',', '.') }}
                                    </span>
                                @endif
                            </td>

                            <td class="py-4 px-4">
                                @if($prod->stock > 10)
                                    <span class="font-bold text-emerald-600">{{ $prod->stock }} pcs</span>
                                @else
                                    <span class="font-bold text-rose-600 bg-rose-50 px-2 py-0.5 rounded">{{ $prod->stock }} pcs (Hampir Habis)</span>
                                @endif
                            </td>

                            <td class="py-4 px-4">
                                <div class="flex items-center gap-1 text-amber-400 font-bold">
                                    <i class="fa-solid fa-star text-[10px]"></i>
                                    <span class="text-gray-700">{{ $prod->rating }}</span>
                                    <span class="text-[10px] text-gray-400 font-normal">({{ $prod->reviews_count }} rev)</span>
                                </div>
                            </td>

                            <td class="py-4 px-4">
                                @if($prod->badge)
                                    <span class="text-[10px] font-bold text-white px-2 py-0.5 rounded-full {{ $prod->badge_color }}">
                                        {{ $prod->badge }}
                                    </span>
                                @else
                                    <span class="text-gray-300">-</span>
                                @endif
                            </td>

                            <td class="py-4 px-6 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a 
                                        href="{{ route('admin.products.edit', $prod->id) }}" 
                                        class="w-8 h-8 rounded-xl bg-gray-100 hover:bg-rose-50 hover:text-rose-600 text-gray-600 flex items-center justify-center transition-all"
                                        title="Edit Produk"
                                    >
                                        <i class="fa-solid fa-pen text-xs"></i>
                                    </a>

                                    <form action="{{ route('admin.products.delete', $prod->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                        @csrf
                                        <button 
                                            type="submit" 
                                            class="w-8 h-8 rounded-xl bg-gray-100 hover:bg-red-50 hover:text-red-600 text-gray-600 flex items-center justify-center transition-all"
                                            title="Hapus Produk"
                                        >
                                            <i class="fa-regular fa-trash-can text-xs"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center text-gray-400">
                                Belum ada produk baju di database. Klik tombol "Tambah Baju Baru" di atas!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
