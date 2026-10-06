@extends('layouts.app')

@section('content')
<div class="min-h-[85vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <!-- Background Pastel Glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[450px] h-[450px] bg-gradient-to-tr from-pink-200/50 to-rose-100/40 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-md w-full space-y-6 bg-white p-8 sm:p-10 rounded-3xl shadow-xl border border-rose-100 relative z-10">
        
        <div class="text-center">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-rose-500 to-pink-300 flex items-center justify-center text-white mx-auto shadow-cute mb-3">
                <i class="fa-solid fa-sparkles text-lg"></i>
            </div>
            <h2 class="text-2xl font-serif font-bold text-gray-900">
                Gabung <span class="bg-gradient-to-r from-rose-600 to-pink-500 bg-clip-text text-transparent">#KhiellsClub</span> 🌸
            </h2>
            <p class="text-xs text-gray-500 mt-1">
                Buat akun untuk belanja lebih mudah, dapat diskon khusus & simpan wishlist
            </p>
        </div>

        @if ($errors->any())
            <div class="bg-rose-100 border border-rose-200 text-rose-700 px-4 py-3 rounded-2xl text-xs">
                @foreach ($errors->all() as $error)
                    <p class="flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form class="space-y-4" action="{{ route('register') }}" method="POST">
            @csrf

            <div>
                <label for="name" class="block text-xs font-bold text-gray-700 mb-1">Nama Lengkap</label>
                <div class="relative">
                    <input 
                        id="name" 
                        name="name" 
                        type="text" 
                        required 
                        value="{{ old('name') }}" 
                        placeholder="Misal: Aurelia Putri" 
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-rose-200 text-xs focus:outline-none focus:ring-2 focus:ring-rose-400 bg-rose-50/20"
                    >
                    <i class="fa-regular fa-user absolute left-3.5 top-3 text-rose-300 text-xs"></i>
                </div>
            </div>

            <div>
                <label for="email" class="block text-xs font-bold text-gray-700 mb-1">Alamat Email</label>
                <div class="relative">
                    <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        required 
                        value="{{ old('email') }}" 
                        placeholder="nama@email.com" 
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-rose-200 text-xs focus:outline-none focus:ring-2 focus:ring-rose-400 bg-rose-50/20"
                    >
                    <i class="fa-regular fa-envelope absolute left-3.5 top-3 text-rose-300 text-xs"></i>
                </div>
            </div>

            <div>
                <label for="phone" class="block text-xs font-bold text-gray-700 mb-1">Nomor WhatsApp (Opsional)</label>
                <div class="relative">
                    <input 
                        id="phone" 
                        name="phone" 
                        type="text" 
                        value="{{ old('phone') }}" 
                        placeholder="0812xxxxxxxx" 
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-rose-200 text-xs focus:outline-none focus:ring-2 focus:ring-rose-400 bg-rose-50/20"
                    >
                    <i class="fa-brands fa-whatsapp absolute left-3.5 top-3 text-rose-300 text-xs"></i>
                </div>
            </div>

            <div>
                <label for="password" class="block text-xs font-bold text-gray-700 mb-1">Kata Sandi (Min. 6 Karakter)</label>
                <div class="relative">
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        required 
                        placeholder="••••••••" 
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-rose-200 text-xs focus:outline-none focus:ring-2 focus:ring-rose-400 bg-rose-50/20"
                    >
                    <i class="fa-solid fa-lock absolute left-3.5 top-3 text-rose-300 text-xs"></i>
                </div>
            </div>

            <div>
                <label for="password_confirmation" class="block text-xs font-bold text-gray-700 mb-1">Ulangi Kata Sandi</label>
                <div class="relative">
                    <input 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        type="password" 
                        required 
                        placeholder="••••••••" 
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-rose-200 text-xs focus:outline-none focus:ring-2 focus:ring-rose-400 bg-rose-50/20"
                    >
                    <i class="fa-solid fa-shield-check absolute left-3.5 top-3 text-rose-300 text-xs"></i>
                </div>
            </div>

            <div class="pt-2">
                <button 
                    type="submit" 
                    class="w-full bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 text-white font-bold py-3 px-4 rounded-2xl text-xs sm:text-sm shadow-cute transition-all transform hover:scale-[1.02] flex items-center justify-center gap-2"
                >
                    <i class="fa-solid fa-user-plus"></i>
                    <span>Daftar Akun Baru</span>
                </button>
            </div>
        </form>

        <div class="text-center pt-2 border-t border-rose-100">
            <p class="text-xs text-gray-500">
                Sudah memiliki akun? 
                <a href="{{ route('login') }}" class="font-bold text-rose-500 hover:underline">Masuk di sini</a>
            </p>
        </div>

    </div>
</div>
@endsection
