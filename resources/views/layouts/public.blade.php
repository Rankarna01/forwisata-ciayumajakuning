<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{ $setting->nama_sistem ?? 'Forwisata' }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Poppins', 'sans-serif'] },
                    colors: {
                        primary: '#16A34A',
                        secondary: '#22C55E',
                        accent: '#F59E0B',
                        dark: '#0F172A',
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #F8FAFC; }
        .glass-nav { background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px); border-bottom: 1px solid rgba(226, 232, 240, 0.5); }
    </style>
</head>
<body class="antialiased overflow-x-hidden text-slate-800">

    <nav class="fixed w-full z-50 transition-all duration-300 glass-nav" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center gap-2 cursor-pointer">
                    @if(isset($setting) && $setting->logo)
                        <img src="{{ asset('storage/'.$setting->logo) }}" alt="Logo" class="h-10">
                    @else
                        <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center text-primary">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <span class="font-bold text-xl text-primary">{{ $setting->nama_sistem ?? 'Forwisata' }}</span>
                    @endif
                </div>
                
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-primary font-semibold border-b-2 border-primary py-1' : 'text-slate-600 hover:text-primary font-medium transition-colors' }}">Beranda</a>
                    <a href="{{ route('wisata.all') }}" class="{{ request()->routeIs('wisata.all') ? 'text-primary font-semibold border-b-2 border-primary py-1' : 'text-slate-600 hover:text-primary font-medium transition-colors' }}">Tempat Wisata</a>
                    <a href="{{ route('event.all') }}" class="{{ request()->routeIs('event.all') ? 'text-primary font-semibold border-b-2 border-primary py-1' : 'text-slate-600 hover:text-primary font-medium transition-colors' }}">Info Event</a>
                    <a href="{{ route('home') }}#tentang" class="text-slate-600 hover:text-primary font-medium transition-colors">Tentang Kami</a>
                    <a href="{{ route('home') }}#kontak" class="text-slate-600 hover:text-primary font-medium transition-colors">Kontak</a>
                </div>

                <div class="hidden md:block">
                    <a href="{{ route('wisata.all') }}" class="bg-primary hover:bg-green-700 text-white px-6 py-2.5 rounded-full font-medium transition-all shadow-lg shadow-primary/30 flex items-center gap-2 transform hover:-translate-y-0.5">
                        Jelajahi Sekarang
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>

                <!-- Hamburger Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-slate-600 hover:text-primary focus:outline-none bg-slate-50 p-2 rounded-xl border border-slate-100 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden md:hidden bg-white/95 backdrop-blur-md border-t border-slate-100 shadow-2xl absolute w-full left-0 top-full transition-all">
            <div class="px-4 py-4 space-y-1 flex flex-col">
                <a href="{{ route('home') }}" class="block px-4 py-3 rounded-xl text-base font-semibold {{ request()->routeIs('home') ? 'bg-green-50 text-primary' : 'text-slate-600 hover:bg-slate-50 hover:text-primary' }}">Beranda</a>
                <a href="{{ route('wisata.all') }}" class="block px-4 py-3 rounded-xl text-base font-semibold {{ request()->routeIs('wisata.all') ? 'bg-green-50 text-primary' : 'text-slate-600 hover:bg-slate-50 hover:text-primary' }}">Tempat Wisata</a>
                <a href="{{ route('event.all') }}" class="block px-4 py-3 rounded-xl text-base font-semibold {{ request()->routeIs('event.all') ? 'bg-green-50 text-primary' : 'text-slate-600 hover:bg-slate-50 hover:text-primary' }}">Info Event</a>
                <a href="{{ route('home') }}#tentang" class="block px-4 py-3 rounded-xl text-base font-semibold text-slate-600 hover:bg-slate-50 hover:text-primary">Tentang Kami</a>
                <a href="{{ route('home') }}#kontak" class="block px-4 py-3 rounded-xl text-base font-semibold text-slate-600 hover:bg-slate-50 hover:text-primary">Kontak</a>
                
                <div class="pt-4 mt-2 border-t border-slate-100">
                    <a href="{{ route('wisata.all') }}" class="flex justify-center items-center w-full bg-primary hover:bg-green-700 text-white px-6 py-3.5 rounded-xl font-bold transition-all shadow-md shadow-primary/30">
                        Jelajahi Sekarang
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Inisialisasi Efek Animasi
        AOS.init({
            duration: 800,
            once: true,
            offset: 100,
        });

        // Navbar Shadow on Scroll
        $(window).scroll(function() {
            if ($(window).scrollTop() > 50) {
                $('#navbar').addClass('shadow-sm');
            } else {
                $('#navbar').removeClass('shadow-sm');
            }
        });

        // Mobile Menu Toggle
        $('#mobile-menu-btn').click(function() {
            $('#mobile-menu').toggleClass('hidden');
        });
        
        // Tutup menu saat link diklik (khusus anchor links)
        $('#mobile-menu a').click(function() {
            $('#mobile-menu').addClass('hidden');
        });
    </script>
    
    @yield('scripts')
</body>
</html>