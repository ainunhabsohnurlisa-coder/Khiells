@extends('admin.layout')

@section('header_title', 'Kelola Ulasan & Rating Pelanggan ⭐')

@section('admin_content')
<div class="space-y-6">

    <div class="flex items-center justify-between bg-white p-5 rounded-3xl border border-gray-100 shadow-sm">
        <div>
            <h3 class="font-bold text-gray-800 text-base">Ulasan Asli Pembeli</h3>
            <p class="text-xs text-gray-400">Total {{ $reviews->count() }} ulasan dan rating tersimpan di database</p>
        </div>
    </div>

    <!-- Reviews Table -->
    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-gray-50/70 border-b border-gray-100 text-gray-400 uppercase text-[10px] font-semibold">
                    <tr>
                        <th class="py-4 px-6">Pelanggan</th>
                        <th class="py-4 px-4">Produk Pakaian</th>
                        <th class="py-4 px-4">Rating</th>
                        <th class="py-4 px-6">Isi Ulasan & Komentar</th>
                        <th class="py-4 px-4">Tanggal</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($reviews as $rev)
                        <tr class="hover:bg-rose-50/20 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ $rev->customer_avatar ?: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=150&q=80' }}" alt="Avatar" class="w-8 h-8 rounded-full object-cover border border-rose-200">
                                    <div>
                                        <span class="font-bold text-gray-900 block text-xs">{{ $rev->customer_name }}</span>
                                        <span class="text-[10px] text-gray-400">{{ $rev->customer_city }}</span>
                                    </div>
                                </div>
                            </td>

                            <td class="py-4 px-4">
                                @if($rev->product)
                                    <span class="font-semibold text-gray-800">{{ $rev->product->name }}</span>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>

                            <td class="py-4 px-4">
                                <div class="flex text-amber-400 text-xs">
                                    @for($i = 0; $i < $rev->rating; $i++)
                                        <i class="fa-solid fa-star"></i>
                                    @endfor
                                    @for($i = $rev->rating; $i < 5; $i++)
                                        <i class="fa-regular fa-star text-gray-300"></i>
                                    @endfor
                                </div>
                                <span class="text-[10px] font-bold text-gray-600 block mt-0.5">{{ $rev->rating }}.0 / 5.0</span>
                            </td>

                            <td class="py-4 px-6">
                                <p class="text-gray-700 leading-relaxed italic text-xs max-w-md">
                                    "{{ $rev->comment }}"
                                </p>
                            </td>

                            <td class="py-4 px-4 text-[10px] text-gray-400">
                                {{ $rev->created_at->format('d M Y') }}
                            </td>

                            <td class="py-4 px-6 text-right">
                                <form action="{{ route('admin.reviews.delete', $rev->id) }}" method="POST" onsubmit="return confirm('Hapus ulasan ini?');">
                                    @csrf
                                    <button type="submit" class="w-8 h-8 rounded-xl bg-gray-100 hover:bg-rose-50 hover:text-rose-600 text-gray-500 flex items-center justify-center transition-all ml-auto" title="Hapus Ulasan">
                                        <i class="fa-regular fa-trash-can text-xs"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-gray-400">Belum ada ulasan pembeli di database.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
