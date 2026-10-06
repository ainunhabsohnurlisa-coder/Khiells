@extends('admin.layout')

@section('header_title', 'Kelola Pesanan Masuk 📦')

@section('admin_content')
<div class="space-y-6">

    <div class="flex items-center justify-between bg-white p-5 rounded-3xl border border-gray-100 shadow-sm">
        <div>
            <h3 class="font-bold text-gray-800 text-base">Daftar Transaksi Pelanggan</h3>
            <p class="text-xs text-gray-400">Total {{ $orders->count() }} pesanan tercatat di database</p>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-gray-50/70 border-b border-gray-100 text-gray-400 uppercase text-[10px] font-semibold">
                    <tr>
                        <th class="py-4 px-6">ID & Tanggal</th>
                        <th class="py-4 px-4">Pelanggan</th>
                        <th class="py-4 px-4">Item Pakaian</th>
                        <th class="py-4 px-4">Total & Bayar</th>
                        <th class="py-4 px-4">Status Pesanan</th>
                        <th class="py-4 px-6 text-right">Update Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($orders as $ord)
                        <tr class="hover:bg-rose-50/20 transition-colors">
                            <td class="py-4 px-6">
                                <span class="font-bold text-gray-900 block text-xs">{{ $ord->order_number }}</span>
                                <span class="text-[10px] text-gray-400">{{ $ord->created_at->format('d M Y, H:i') }}</span>
                            </td>

                            <td class="py-4 px-4">
                                <span class="font-bold text-gray-800 block">{{ $ord->customer_name }}</span>
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $ord->customer_phone) }}" target="_blank" class="text-[11px] text-emerald-600 font-semibold hover:underline flex items-center gap-1">
                                    <i class="fa-brands fa-whatsapp text-xs"></i>
                                    <span>{{ $ord->customer_phone }}</span>
                                </a>
                                <span class="text-[10px] text-gray-400 block line-clamp-1 mt-0.5" title="{{ $ord->shipping_address }}">
                                    📍 {{ $ord->shipping_address }}
                                </span>
                            </td>

                            <td class="py-4 px-4">
                                <div class="space-y-1">
                                    @if(is_array($ord->items_json))
                                        @foreach($ord->items_json as $item)
                                            <div class="text-[11px] text-gray-700">
                                                • <strong>{{ $item['name'] ?? 'Baju' }}</strong> (x{{ $item['qty'] ?? 1 }}) 
                                                <span class="text-[10px] text-gray-400">[{{ $item['selectedColor'] ?? '' }} / {{ $item['selectedSize'] ?? '' }}]</span>
                                            </div>
                                        @endforeach
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                    @if($ord->notes)
                                        <p class="text-[10px] text-rose-500 italic mt-0.5">Catatan: "{{ $ord->notes }}"</p>
                                    @endif
                                </div>
                            </td>

                            <td class="py-4 px-4">
                                <span class="font-extrabold text-sm text-rose-600 block">
                                    Rp {{ number_format($ord->total_amount, 0, ',', '.') }}
                                </span>
                                <div class="flex items-center gap-1.5 mt-1">
                                    <span class="px-2 py-0.5 rounded bg-gray-100 font-bold text-[10px]">{{ $ord->payment_method }}</span>
                                    @if($ord->payment_status === 'paid')
                                        <span class="px-2 py-0.5 rounded bg-emerald-50 text-emerald-600 font-bold text-[10px]">Lunas</span>
                                    @else
                                        <span class="px-2 py-0.5 rounded bg-amber-50 text-amber-600 font-bold text-[10px]">Belum Lunas</span>
                                    @endif
                                </div>
                            </td>

                            <td class="py-4 px-4">
                                @if($ord->order_status === 'diproses')
                                    <span class="px-2.5 py-1 bg-amber-50 text-amber-600 font-bold rounded-full text-[10px] flex items-center gap-1 w-fit">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                        Diproses
                                    </span>
                                @elseif($ord->order_status === 'dikirim')
                                    <span class="px-2.5 py-1 bg-sky-50 text-sky-600 font-bold rounded-full text-[10px] flex items-center gap-1 w-fit">
                                        <i class="fa-solid fa-truck-fast text-[10px]"></i>
                                        Dikirim
                                    </span>
                                @elseif($ord->order_status === 'selesai')
                                    <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 font-bold rounded-full text-[10px] flex items-center gap-1 w-fit">
                                        <i class="fa-solid fa-check text-[10px]"></i>
                                        Selesai
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 bg-rose-50 text-rose-600 font-bold rounded-full text-[10px]">{{ $ord->order_status }}</span>
                                @endif
                            </td>

                            <td class="py-4 px-6 text-right">
                                <form action="{{ route('admin.orders.status', $ord->id) }}" method="POST" class="flex items-center justify-end gap-1.5">
                                    @csrf
                                    <select name="order_status" class="text-[11px] border border-gray-200 rounded-xl px-2 py-1.5 bg-white focus:outline-none focus:ring-1 focus:ring-rose-400">
                                        <option value="diproses" {{ $ord->order_status === 'diproses' ? 'selected' : '' }}>Diproses</option>
                                        <option value="dikirim" {{ $ord->order_status === 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                                        <option value="selesai" {{ $ord->order_status === 'selesai' ? 'selected' : '' }}>Selesai</option>
                                        <option value="dibatalkan" {{ $ord->order_status === 'dibatalkan' ? 'selected' : '' }}>Batal</option>
                                    </select>

                                    <select name="payment_status" class="text-[11px] border border-gray-200 rounded-xl px-2 py-1.5 bg-white focus:outline-none focus:ring-1 focus:ring-rose-400">
                                        <option value="paid" {{ $ord->payment_status === 'paid' ? 'selected' : '' }}>Lunas</option>
                                        <option value="pending" {{ $ord->payment_status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    </select>

                                    <button type="submit" class="bg-gray-800 hover:bg-black text-white px-2.5 py-1.5 rounded-xl text-[11px] font-bold" title="Simpan Status">
                                        <i class="fa-solid fa-floppy-disk"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-gray-400">Belum ada pesanan masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
