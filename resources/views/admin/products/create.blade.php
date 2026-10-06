@extends('admin.layout')

@section('header_title', 'Tambah Koleksi Baju Baru ✨')

@section('admin_content')
<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <a href="{{ route('admin.products') }}" class="text-xs font-bold text-gray-500 hover:text-rose-600 flex items-center gap-1.5">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali ke Daftar Baju</span>
        </a>
    </div>

    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-gray-100 shadow-sm">
        
        <form action="{{ route('admin.products.store') }}" method="POST" class="space-y-6 text-xs">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Baju -->
                <div class="space-y-1.5 md:col-span-2">
                    <label class="block font-bold text-gray-700">Nama Pakaian / Baju *</label>
                    <input 
                        type="text" 
                        name="name" 
                        required 
                        placeholder="Contoh: Strawberry Sweet Knit Cardigan" 
                        value="{{ old('name') }}" 
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-rose-400"
                    >
                </div>

                <!-- Kategori -->
                <div class="space-y-1.5">
                    <label class="block font-bold text-gray-700">Kategori Pakaian *</label>
                    <select name="category_id" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-rose-400 bg-white">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->icon }} {{ $cat->name }}</option>
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
                        value="{{ old('stock', 30) }}" 
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
                        placeholder="145000" 
                        value="{{ old('price') }}" 
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-rose-400"
                    >
                </div>

                <!-- Harga Coret / Original (Diskon) -->
                <div class="space-y-1.5">
                    <label class="block font-bold text-gray-700">Harga Coret / Asli (Rp, Opsional)</label>
                    <input 
                        type="number" 
                        name="original_price" 
                        placeholder="195000" 
                        value="{{ old('original_price') }}" 
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-rose-400"
                    >
                    <span class="text-[10px] text-gray-400">Isi lebih tinggi dari harga jual untuk memunculkan badge diskon %</span>
                </div>

                <!-- Image URL -->
                <div class="space-y-1.5 md:col-span-2">
                    <label class="block font-bold text-gray-700">URL Foto Produk (Unsplash / Web Foto)</label>
                    <input 
                        type="url" 
                        name="image" 
                        placeholder="https://images.unsplash.com/..." 
                        value="{{ old('image', 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=800&q=80') }}" 
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-rose-400"
                    >
                </div>

                <!-- Bahan Material -->
                <div class="space-y-1.5">
                    <label class="block font-bold text-gray-700">Bahan / Material Pakaian</label>
                    <input 
                        type="text" 
                        name="material" 
                        placeholder="Contoh: Premium Soft Cotton Ribbed" 
                        value="{{ old('material', 'Katun Premium Adem & Lembut') }}" 
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-rose-400"
                    >
                </div>

                <!-- Badge Label -->
                <div class="space-y-1.5">
                    <label class="block font-bold text-gray-700">Badge Label (Opsional)</label>
                    <input 
                        type="text" 
                        name="badge" 
                        placeholder="Contoh: BEST SELLER, NEW DROP, LIMITED" 
                        value="{{ old('badge', 'NEW DROP') }}" 
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-rose-400"
                    >
                </div>

                <!-- Varian Warna -->
                <div class="space-y-1.5">
                    <label class="block font-bold text-gray-700">Pilihan Warna (Pisahkan dengan Koma)</label>
                    <input 
                        type="text" 
                        name="colors" 
                        placeholder="Soft Pink, Matcha, Cream Vanilla" 
                        value="{{ old('colors', 'Soft Pink, Matcha, Cream') }}" 
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-rose-400"
                    >
                </div>

                <!-- Pilihan Ukuran -->
                <div class="space-y-1.5">
                    <label class="block font-bold text-gray-700">Pilihan Ukuran (Pisahkan dengan Koma)</label>
                    <input 
                        type="text" 
                        name="sizes" 
                        placeholder="S, M, L, XL atau All Size Fit to L" 
                        value="{{ old('sizes', 'S, M, L') }}" 
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-rose-400"
                    >
                </div>

                <!-- Deskripsi Produk -->
                <div class="space-y-1.5 md:col-span-2">
                    <label class="block font-bold text-gray-700">Deskripsi Pakaian</label>
                    <textarea 
                        name="description" 
                        rows="3" 
                        placeholder="Tuliskan cerita manis dan keunggulan baju ini..." 
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-rose-400"
                    >{{ old('description', 'Koleksi pakaian aesthetic dengan sentuhan manis ala Korea. Nyaman dipakai seharian dengan potongan yang pas dan membuat penampilan semakin imut.') }}</textarea>
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
                    Simpan Baju Baru ✨
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
