@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <!-- Background Pastel Glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-tr from-rose-200/50 to-pink-100/40 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-md w-full space-y-6 bg-white p-8 sm:p-10 rounded-3xl shadow-xl border border-rose-100 relative z-10">
        
        <!-- Header -->
        <div class="text-center">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-rose-500 to-pink-300 flex items-center justify-center text-white mx-auto shadow-cute mb-3">
                <i class="fa-solid fa-lock text-lg"></i>
            </div>
            <h2 class="text-2xl font-serif font-bold text-gray-900">
                Masuk ke <span class="bg-gradient-to-r from-rose-600 to-pink-500 bg-clip-text text-transparent">Khiells</span> ✨
            </h2>
            <p class="text-xs text-gray-500 mt-1">
                Akses akun belanja Anda atau masuk ke Dashboard Admin
            </p>
        </div>

        <!-- Quick 1-Click Login Cards for Easy Testing -->
        <div class="bg-rose-50/70 p-3.5 rounded-2xl border border-rose-100 space-y-2">
            <span class="block text-[11px] font-bold text-rose-800 tracking-wide uppercase">⚡ Akses Cepat (1-Klik):</span>
            <div class="grid grid-cols-2 gap-2">
                <button 
                    type="button"
                    onclick="fillAdminCredentials()" 
                    class="bg-white hover:bg-rose-100/60 border border-rose-200 text-rose-700 py-2 px-2.5 rounded-xl text-xs font-bold text-center transition-all shadow-sm flex items-center justify-center gap-1.5"
                >
                    <span>👑 Admin Toko</span>
                </button>
                <button 
                    type="button"
                    onclick="fillCustomerCredentials()" 
                    class="bg-white hover:bg-rose-100/60 border border-rose-200 text-gray-700 py-2 px-2.5 rounded-xl text-xs font-bold text-center transition-all shadow-sm flex items-center justify-center gap-1.5"
                >
                    <span>🌸 Pelanggan</span>
                </button>
            </div>
            <p class="text-[10px] text-gray-400 text-center italic">*Klik untuk mengisi email & password secara otomatis.</p>
        </div>

        @if ($errors->any())
            <div class="bg-rose-100 border border-rose-200 text-rose-700 px-4 py-3 rounded-2xl text-xs">
                @foreach ($errors->all() as $error)
                    <p class="flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if (session('info'))
            <div class="bg-sky-50 border border-sky-200 text-sky-800 px-4 py-3 rounded-2xl text-xs flex items-center gap-2">
                <i class="fa-solid fa-circle-info text-sky-500"></i>
                <span>{{ session('info') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-rose-100 border border-rose-200 text-rose-700 px-4 py-3 rounded-2xl text-xs flex items-center gap-2">
                <i class="fa-solid fa-circle-exclamation text-rose-500"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-2xl text-xs flex items-center gap-2">
                <i class="fa-solid fa-circle-check text-emerald-500"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <form class="space-y-4" action="{{ route('login') }}" method="POST">
            @csrf

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
                <div class="flex justify-between items-center mb-1">
                    <label for="password" class="block text-xs font-bold text-gray-700">Kata Sandi (Password)</label>
                    <a href="#" class="text-[11px] text-rose-500 hover:underline">Lupa sandi?</a>
                </div>
                <div class="relative">
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        required 
                        placeholder="••••••••" 
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-rose-200 text-xs focus:outline-none focus:ring-2 focus:ring-rose-400 bg-rose-50/20"
                    >
                    <i class="fa-solid fa-key absolute left-3.5 top-3 text-rose-300 text-xs"></i>
                </div>
            </div>

            <div class="flex items-center">
                <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-rose-500 focus:ring-rose-400 border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-xs text-gray-600">Ingat sesi saya di perangkat ini</label>
            </div>

            <div>
                <button 
                    type="submit" 
                    class="w-full bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 text-white font-bold py-3 px-4 rounded-2xl text-xs sm:text-sm shadow-cute transition-all transform hover:scale-[1.02] flex items-center justify-center gap-2"
                >
                    <i class="fa-solid fa-right-to-bracket"></i>
                    <span>Masuk Sekarang</span>
                </button>
            </div>
        </form>

        <div class="text-center pt-2 border-t border-rose-100">
            <p class="text-xs text-gray-500">
                Belum punya akun Khiells? 
                <a href="{{ route('register') }}" class="font-bold text-rose-500 hover:underline">Daftar Akun Baru</a>
            </p>
        </div>

    </div>
</div>

<script>
    function fillAdminCredentials() {
        document.getElementById('email').value = 'admin@khiells.com';
        document.getElementById('password').value = 'admin123';
    }

    function fillCustomerCredentials() {
        document.getElementById('email').value = 'customer@gmail.com';
        document.getElementById('password').value = 'password123';
    }
</script>
@endsection
