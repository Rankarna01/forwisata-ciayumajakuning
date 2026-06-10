<header class="h-16 bg-white/80 backdrop-blur-md border-b border-slate-200 flex items-center justify-between px-4 md:px-6 sticky top-0 z-30 transition-all duration-300">
    
    <div class="flex items-center gap-4">
        <button class="md:hidden text-slate-500 hover:text-primary focus:outline-none transition-colors bg-slate-50 p-1.5 rounded-lg border border-slate-100" onclick="toggleSidebar()">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
        
        <h1 class="text-lg md:text-xl font-bold text-slate-800 tracking-tight">
            @yield('header_title', 'Dashboard')
        </h1>
    </div>

    <div class="flex items-center gap-3 md:gap-5">
        
        <button class="relative p-2 text-slate-400 hover:text-primary transition-colors rounded-full hover:bg-green-50">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
            </svg>
            <span class="absolute top-1.5 right-1.5 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white"></span>
        </button>

        <div class="h-8 w-px bg-slate-200 hidden md:block"></div>

        <div class="flex items-center gap-3 cursor-pointer group">
            
            <div class="hidden md:block text-right">
                <div class="text-sm font-bold text-slate-800 group-hover:text-primary transition-colors">
                    {{ Auth::user()->name ?? 'Administrator' }}
                </div>
                <div class="text-xs font-medium text-slate-500">Admin Panel</div>
            </div>
            
            <div class="relative">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Admin') }}&background=16A34A&color=fff&bold=true" 
                     alt="User Avatar" 
                     class="w-10 h-10 rounded-full shadow-sm border-2 border-white ring-1 ring-slate-200 group-hover:ring-primary transition-all object-cover">
                <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></div>
            </div>
            
            <svg class="w-4 h-4 text-slate-400 group-hover:text-primary transition-colors hidden sm:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </div>
        
    </div>
</header>