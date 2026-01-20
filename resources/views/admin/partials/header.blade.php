{{-- Admin Header (God-Tier) --}}

<header class="sticky top-0 z-30 h-20 bg-[#0B0D11]/80 backdrop-blur-xl border-b border-white/5 flex items-center justify-between px-6 lg:px-8 transition-all duration-300">
    {{-- Left: Mobile Toggle + Title --}}
    <div class="flex items-center gap-6">
        <button class="lg:hidden p-2 -ml-2 text-gray-400 hover:text-white rounded-lg hover:bg-white/5 transition-colors" onclick="toggleSidebar()">
            <span class="material-symbols-outlined text-2xl">menu</span>
        </button>

        <div>
            <h1 class="text-xl font-bold text-white tracking-tight">@yield('page-title', 'Dashboard')</h1>
            <p class="text-xs text-gray-500 font-medium hidden sm:block">Overview & Statistik</p>
        </div>
    </div>

    {{-- Right: Utilities --}}
    <div class="flex items-center gap-4">
        {{-- Search (Visual) --}}
        <div class="hidden md:flex items-center h-10 px-4 bg-white/5 border border-white/5 rounded-full focus-within:border-primary/50 focus-within:bg-white/10 transition-all w-64 group">
            <span class="material-symbols-outlined text-gray-500 group-focus-within:text-primary transition-colors text-xl">search</span>
            <input type="text" placeholder="Cari data..." class="bg-transparent border-none text-sm text-white placeholder-gray-500 focus:ring-0 w-full ml-2 h-full outline-none">
        </div>

        {{-- Notifications --}}
        <button class="relative w-10 h-10 rounded-full bg-white/5 border border-white/5 flex items-center justify-center text-gray-400 hover:text-white hover:border-primary/50 hover:bg-primary/5 transition-all group">
            <span class="material-symbols-outlined group-hover:animate-swing">notifications</span>
            <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-red-500 rounded-full border border-[#0B0D11]"></span>
        </button>

        {{-- Date Display (Desktop) --}}
        <div class="hidden lg:flex items-center gap-3 pl-4 border-l border-white/5">
            <div class="text-right">
                <p class="text-xs font-bold text-white">{{ now()->format('H:i') }}</p>
                <p class="text-[10px] text-gray-500">{{ now()->format('d M Y') }}</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-gray-800 to-black border border-white/5 flex items-center justify-center">
                <span class="material-symbols-outlined text-gray-400 text-lg">calendar_today</span>
            </div>
        </div>
    </div>
</header>

<style>
    @keyframes swing {

        0%,
        100% {
            transform: rotate(0deg);
        }

        20% {
            transform: rotate(15deg);
        }

        40% {
            transform: rotate(-10deg);
        }

        60% {
            transform: rotate(5deg);
        }

        80% {
            transform: rotate(-5deg);
        }
    }

    .animate-swing {
        animation: swing 0.5s ease-in-out;
    }
</style>