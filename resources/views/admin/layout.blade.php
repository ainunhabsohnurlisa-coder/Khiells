<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard — Khiells Boutique ✨</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        khiells: {
                            50: '#fff5f7',
                            100: '#ffe4e9',
                            500: '#f43f6e',
                            600: '#e11d54',
                            700: '#be1243',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['"Playfair Display"', 'serif'],
                    }
                }
            }
        }
    </script>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.3/dist/cdn.min.js"></script>
</head>
<body class="bg-[#F8F9FC] text-gray-800 font-sans min-h-screen flex">

    <!-- Sidebar Navigation -->
    <aside class="w-64 bg-white border-r border-gray-100 flex flex-col justify-between hidden md:flex shrink-0">
        <div>
            <!-- Admin Brand Header -->
            <div class="h-20 flex items-center px-6 border-b border-gray-100 gap-3">
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-rose-500 to-pink-400 flex items-center justify-center text-white shadow-md">
                    <i class="fa-solid fa-crown text-base"></i>
                </div>
                <div>
                    <h1 class="font-serif font-bold text-xl text-gray-900 tracking-tight">Khiells</h1>
                    <span class="text-[10px] font-extrabold uppercase tracking-widest text-rose-500 block -mt-1">ADMIN PORTAL</span>
                </div>
            </div>

            <!-- Nav Links -->
            <nav class="p-4 space-y-1.5 text-xs font-semibold">
                <a 
                    href="{{ route('admin.dashboard') }}" 
                    class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-rose-50 text-rose-600 font-bold' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-800' }}"
                >
                    <i class="fa-solid fa-chart-pie w-4 text-center"></i>
                    <span>Dashboard Utama</span>
                </a>

                <a 
                    href="{{ route('admin.products') }}" 
                    class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->routeIs('admin.products*') ? 'bg-rose-50 text-rose-600 font-bold' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-800' }}"
                >
                    <i class="fa-solid fa-shirt w-4 text-center"></i>
                    <span>Katalog Produk Pakaian</span>
                </a>

                <a 
                    href="{{ route('admin.orders') }}" 
                    class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->routeIs('admin.orders*') ? 'bg-rose-50 text-rose-600 font-bold' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-800' }}"
                >
                    <i class="fa-solid fa-box-open w-4 text-center"></i>
                    <span>Pesanan Masuk</span>
                </a>

                <a 
                    href="{{ route('admin.reviews') }}" 
                    class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->routeIs('admin.reviews*') ? 'bg-rose-50 text-rose-600 font-bold' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-800' }}"
                >
                    <i class="fa-solid fa-star w-4 text-center text-amber-400"></i>
                    <span>Ulasan & Rating</span>
                </a>

                <div class="pt-4 border-t border-gray-100 my-2">
                    <a 
                        href="{{ route('home') }}" 
                        target="_blank"
                        class="flex items-center justify-between px-4 py-2.5 rounded-xl text-gray-500 hover:bg-rose-50 hover:text-rose-600 transition-all"
                    >
                        <span class="flex items-center gap-2">
                            <i class="fa-solid fa-store w-4 text-center"></i>
                            <span>Buka Toko Khiells</span>
                        </span>
                        <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                    </a>
                </div>
            </nav>
        </div>

        <!-- Sidebar Bottom (Admin Profile & Logout) -->
        <div class="p-4 border-t border-gray-100 bg-gray-50/50">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-full bg-rose-500 text-white font-bold flex items-center justify-center text-xs">
                        K
                    </div>
                    <div>
                        <span class="block text-xs font-bold text-gray-800">{{ auth()->user()->name }}</span>
                        <span class="block text-[10px] text-gray-400">Administrator</span>
                    </div>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-gray-400 hover:text-rose-600 p-2 text-xs" title="Keluar">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">
        
        <!-- Topbar Header -->
        <header class="h-20 bg-white border-b border-gray-100 px-6 sm:px-8 flex items-center justify-between sticky top-0 z-30">
            <div class="flex items-center gap-4">
                <h2 class="text-lg font-bold text-gray-800">
                    @yield('header_title', 'Dashboard')
                </h2>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" class="text-xs font-bold text-rose-600 bg-rose-50 px-3.5 py-2 rounded-xl hover:bg-rose-100 transition-all flex items-center gap-1.5">
                    <i class="fa-solid fa-eye"></i>
                    <span class="hidden sm:inline">Pratinjau Toko</span>
                </a>
            </div>
        </header>

        <!-- Flash Messages -->
        <div class="p-6 sm:p-8 max-w-7xl w-full mx-auto space-y-6">
            @if (session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-2xl text-xs flex items-center gap-2 shadow-sm">
                    <i class="fa-solid fa-circle-check text-emerald-500 text-base"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-rose-50 border border-rose-200 text-rose-800 px-4 py-3 rounded-2xl text-xs flex items-center gap-2 shadow-sm">
                    <i class="fa-solid fa-circle-exclamation text-rose-500 text-base"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <!-- Content Body -->
            @yield('admin_content')
        </div>

    </div>

</body>
</html>
