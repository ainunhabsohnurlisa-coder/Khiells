@extends('admin.layout')

@section('header_title', 'Edit Koleksi Baju ✏️')

@section('admin_content')
<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <a href="{{ route('admin.products') }}" class="text-xs font-bold text-gray-500 hover:text-rose-600 flex items-center gap-1.5">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali ke Daftar Baju</span>
        </a>
    </div>

    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-gray-100 shadow-sm">
        
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" class="space-y-6 text-xs">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Baju -->
                <div class="space-y-1.5 md:col-span-2">
                    <label class="block font-bold text-gray-700">Nama Pakaian / Baju *</label>
                    <input 
                        type="text" 
                        name="name" 
                        required 
                        value="{{ old('name', $product->name) }}" 
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-rose-400"
                    >
                </div>

                <!-- Kategori -->
                <div class="space-y-1.5">
                    <label class="block font-bold text-gray-700">Kategori Pakaian *</label>
                    <select name="category_id" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-rose-400 bg-white">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                {{ $cat->icon }} {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Stok -->
                <div class="space-y-1.5">
                    <label class="block font-bold text-gray-700">Jumlah Stok (Pcs) *</label>
                    <input 
                        type="number" 
                        name="stock" 
                        required 
                        min="0" 
                        value="{{ old('stock', $product->stock) }}" 
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-rose-400"
                    >
                </div>

                <!-- Harga Jual -->
                <div class="space-y-1.5">
                    <label class="block font-bold text-gray-700">Harga Jual (Rp) *</label>
                    <input 
                        type="number" 
                        name="price" 
                        required 
                        min="1000" 
                        value="{{ old('price', $product->price) }}" 
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-rose-400"
                    >
                </div>

                <!-- Harga Coret / Original (Diskon) -->
                <div class="space-y-1.5">
                    <label class="block font-bold text-gray-700">Harga Coret / Asli (Rp, Opsional)</label>
                    <input 
                        type="number" 
                        name="original_price" 
                        value="{{ old('original_price', $product->original_price) }}" 
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-rose-400"
                    >
                </div>

                <!-- Image URL -->
                <div class="space-y-1.5 md:col-span-2">
                    <label class="block font-bold text-gray-700">URL Foto Produk</label>
                    <input 
                        type="url" 
                        name="image" 
                        value="{{ old('image', $product->image) }}" 
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-rose-400"
                    >
                </div>

                <!-- Bahan Material -->
                <div class="space-y-1.5">
                    <label class="block font-bold text-gray-700">Bahan / Material Pakaian</label>
                    <input 
                        type="text" 
                        name="material" 
                        value="{{ old('material', $product->material) }}" 
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-rose-400"
                    >
                </div>

                <!-- Badge Label -->
                <div class="space-y-1.5">
                    <label class="block font-bold text-gray-700">Badge Label</label>
                    <input 
                        type="text" 
                        name="badge" 
                        value="{{ old('badge', $product->badge) }}" 
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-rose-400"
                    >
                </div>

                <!-- Deskripsi Produk -->
                <div class="space-y-1.5 md:col-span-2">
                    <label class="block font-bold text-gray-700">Deskripsi Pakaian</label>
                    <textarea 
                        name="description" 
                        rows="3" 
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-rose-400"
                    >{{ old('description', $product->description) }}</textarea>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-4 border-t border-gray-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.products') }}" class="px-5 py-2.5 rounded-xl border border-gray-200 text-gray-600 font-semibold hover:bg-gray-50 transition-all">
                    Batal
                </a>
                <button 
                    type="submit" 
                    class="bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 text-white font-bold px-6 py-2.5 rounded-xl shadow-cute transition-all transform hover:scale-105"
                >
                    Simpan Perubahan
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
