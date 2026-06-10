@extends('layouts.public')
@section('title', 'Beranda')

@section('content')

<section class="relative pt-32 lg:pt-40 pb-32 lg:pb-48 overflow-hidden min-h-[95vh] flex items-center bg-slate-100">
    <!-- Background Dynamic Slider -->
    <div class="absolute inset-0 z-0" id="hero-slider">
        @if(isset($sliders) && $sliders->count() > 0)
            @foreach($sliders as $index => $slider)
                <img src="{{ asset('storage/'.$slider->gambar) }}" class="slider-image absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 ease-in-out {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}" alt="Slider {{ $index }}">
            @endforeach
        @else
            <img src="https://images.unsplash.com/photo-1596404179344-934d402ceec6?q=80&w=2000&auto=format&fit=crop" class="w-full h-full object-cover" alt="Hero Background">
        @endif
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-white/95 via-white/80 to-black/20"></div>
    </div>

    <!-- Curved Bottom SVG Background (Rotate 180 and placed at bottom) -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-0 rotate-180 pointer-events-none">
        <svg class="relative block w-full h-[60px] md:h-[100px] lg:h-[150px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="fill-white"></path>
        </svg>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full mt-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <!-- Kiri: Teks dan Kotak Pencarian -->
            <div data-aos="fade-right">
                <span class="inline-block py-1.5 px-4 rounded-full bg-green-100 text-primary font-bold text-xs mb-4 tracking-wider shadow-sm">
                    JELAJAHI KEINDAHAN
                </span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-slate-800 leading-[1.15] mb-6">
                    Temukan Pesona Wisata <br>
                    <span class="text-primary">Ciayumajakuning</span>
                </h1>
                <p class="text-lg text-slate-600 mb-10 leading-relaxed max-w-xl font-medium">
                    Jelajahi keindahan alam, kekayaan budaya, dan wisata religi terbaik di wilayah Cirebon, Indramayu, Majalengka, dan Kuningan.
                </p>

                <div class="bg-white p-2.5 rounded-2xl shadow-xl flex flex-col md:flex-row items-center gap-2 border border-slate-100 max-w-2xl" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex-1 flex items-center px-4 w-full">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        <input type="text" class="w-full bg-transparent border-none focus:ring-0 px-3 py-3 text-slate-700 outline-none placeholder-slate-400 font-medium" placeholder="Cari tempat wisata...">
                    </div>
                    <div class="hidden md:block w-px h-10 bg-slate-200"></div>
                    <div class="flex-1 flex items-center px-4 w-full border-t md:border-t-0 border-slate-100 md:pt-0 pt-2">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <select class="w-full bg-transparent border-none focus:ring-0 px-3 py-3 text-slate-700 outline-none cursor-pointer font-medium">
                            <option value="">Semua Kabupaten</option>
                            <option value="Cirebon">Cirebon</option>
                            <option value="Indramayu">Indramayu</option>
                            <option value="Majalengka">Majalengka</option>
                            <option value="Kuningan">Kuningan</option>
                        </select>
                    </div>
                    <button class="w-full md:w-auto bg-primary hover:bg-green-700 text-white p-3 md:px-6 rounded-xl transition-colors shadow-lg shadow-primary/30 flex items-center justify-center">
                        <svg class="w-6 h-6 md:hidden mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        <span class="md:hidden">Cari</span>
                        <svg class="w-6 h-6 hidden md:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </div>
            </div>

            <!-- Kanan: Card Kategori yang overlapping curva -->
            <div class="relative lg:-mb-40 xl:-mb-52 lg:translate-y-16" data-aos="fade-up" data-aos-delay="300">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 lg:gap-5">
                    
                    <!-- Card 1 -->
                    <a href="{{ route('wisata.all') }}" class="bg-white/95 backdrop-blur-md rounded-[2rem] shadow-2xl shadow-slate-200/50 p-6 border border-white/40 transform transition hover:-translate-y-2 cursor-pointer group hover:shadow-primary/20 flex flex-col items-center text-center block">
                        <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center text-white mb-5 group-hover:scale-110 transition-transform shadow-lg shadow-primary/30">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-800 mb-2">Wisata Alam</h3>
                        <p class="text-slate-500 text-[13px] mb-5 leading-relaxed line-clamp-3 font-medium">Keindahan alam yang menakjubkan dan udara segar pegunungan.</p>
                        <span class="text-primary font-bold text-sm flex items-center group-hover:gap-2 transition-all mt-auto">Jelajahi <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></span>
                    </a>

                    <!-- Card 2 -->
                    <a href="{{ route('wisata.all') }}" class="bg-white/95 backdrop-blur-md rounded-[2rem] shadow-2xl shadow-slate-200/50 p-6 border border-white/40 transform transition hover:-translate-y-2 cursor-pointer group hover:shadow-accent/20 flex flex-col items-center text-center block lg:translate-y-8">
                        <div class="w-16 h-16 bg-accent rounded-full flex items-center justify-center text-white mb-5 group-hover:scale-110 transition-transform shadow-lg shadow-accent/30">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-800 mb-2">Wisata Budaya</h3>
                        <p class="text-slate-500 text-[13px] mb-5 leading-relaxed line-clamp-3 font-medium">Kekayaan budaya dan tradisi lokal, serta peninggalan sejarah.</p>
                        <span class="text-accent font-bold text-sm flex items-center group-hover:gap-2 transition-all mt-auto">Jelajahi <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></span>
                    </a>

                    <!-- Card 3 -->
                    <a href="{{ route('wisata.all') }}" class="bg-white/95 backdrop-blur-md rounded-[2rem] shadow-2xl shadow-slate-200/50 p-6 border border-white/40 transform transition hover:-translate-y-2 cursor-pointer group hover:shadow-purple-500/20 flex flex-col items-center text-center block lg:translate-y-16">
                        <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center text-white mb-5 group-hover:scale-110 transition-transform shadow-lg shadow-purple-600/30">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-800 mb-2">Wisata Religi</h3>
                        <p class="text-slate-500 text-[13px] mb-5 leading-relaxed line-clamp-3 font-medium">Wisata religi dan nilai spiritual warisan wali songo.</p>
                        <span class="text-purple-600 font-bold text-sm flex items-center group-hover:gap-2 transition-all mt-auto">Jelajahi <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></span>
                    </a>

                </div>
            </div>
            
        </div>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-2">
            <div class="flex justify-between items-end mb-6" data-aos="fade-right">
                <div>
                    <span class="text-primary font-bold text-xs uppercase tracking-wider">Rekomendasi Terbaik</span>
                    <h2 class="text-3xl font-extrabold text-slate-800 mt-1">Destinasi Populer</h2>
                </div>
                <a href="{{ route('wisata.all') }}" class="text-primary font-medium text-sm flex items-center hover:underline">Lihat Semua <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @forelse($destinasiPopuler as $index => $wisata)
                <a href="{{ route('wisata.show', $wisata->id) }}" class="block bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden group hover:shadow-xl transition-all duration-300" data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ asset('storage/'.$wisata->gambar) }}" alt="{{ $wisata->nama_wisata }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-3 left-3 bg-white/90 backdrop-blur px-2 py-1 rounded-md text-xs font-bold text-slate-800 shadow-sm">
                            {{ $wisata->kategori }}
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-slate-800 mb-1 group-hover:text-primary transition-colors">{{ $wisata->nama_wisata }}</h3>
                        <div class="flex justify-between items-center mt-3">
                            <span class="text-slate-500 text-sm flex items-center">
                                <svg class="w-4 h-4 mr-1 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ $wisata->kabupaten }}
                            </span>
                            <span class="flex items-center text-accent text-sm font-bold">
                                <svg class="w-4 h-4 mr-1 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                4.8
                            </span>
                        </div>
                    </div>
                </a>
                @empty
                <div class="col-span-2 text-center py-10 text-slate-500">Belum ada data destinasi.</div>
                @endforelse
            </div>
        </div>

        <div class="lg:col-span-1 bg-white rounded-2xl shadow-sm border border-slate-100 p-6 h-fit" data-aos="fade-left">
            <div class="flex justify-between items-end mb-6 border-b border-slate-100 pb-4">
                <h2 class="text-xl font-extrabold text-slate-800">Event Wisata</h2>
                <a href="{{ route('event.all') }}" class="text-primary font-medium text-xs flex items-center hover:underline">Lihat Semua <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
            </div>

            <div class="space-y-6">
                @forelse($events as $event)
                <a href="{{ route('event.show', $event->id) }}" class="flex gap-4 group cursor-pointer">
                    <img src="{{ asset('storage/'.$event->gambar) }}" class="w-20 h-20 rounded-xl object-cover shadow-sm group-hover:shadow-md transition-shadow">
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm mb-1 group-hover:text-primary transition-colors line-clamp-2">{{ $event->nama_event }}</h4>
                        <div class="flex items-center text-xs text-slate-500 mb-1">
                            <svg class="w-3.5 h-3.5 mr-1 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ $event->tanggal_event }}
                        </div>
                        <p class="text-xs text-slate-400 line-clamp-1">{{ $event->deskripsi }}</p>
                    </div>
                </a>
                @empty
                <p class="text-sm text-slate-500 text-center py-4">Belum ada event mendatang.</p>
                @endforelse
            </div>
        </div>

    </div>
</section>

<section id="tentang" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 grid grid-cols-2 gap-6 items-center" data-aos="zoom-in-up">
            <div class="text-center p-4">
                <div class="w-12 h-12 bg-green-50 rounded-full flex items-center justify-center text-primary mx-auto mb-3"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path></svg></div>
                <h3 class="text-3xl font-extrabold text-slate-800">{{ $stats['total_wisata'] }}+</h3>
                <p class="text-xs font-semibold text-slate-800 mt-1">Destinasi Wisata</p>
                <p class="text-[10px] text-slate-400 mt-1">Tempat wisata menarik</p>
            </div>
            <div class="text-center p-4">
                <div class="w-12 h-12 bg-amber-50 rounded-full flex items-center justify-center text-accent mx-auto mb-3"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></div>
                <h3 class="text-3xl font-extrabold text-slate-800">{{ $stats['total_event'] }}+</h3>
                <p class="text-xs font-semibold text-slate-800 mt-1">Event Tahunan</p>
                <p class="text-[10px] text-slate-400 mt-1">Event budaya & pariwisata</p>
            </div>
            <div class="text-center p-4">
                <div class="w-12 h-12 bg-purple-50 rounded-full flex items-center justify-center text-purple-600 mx-auto mb-3"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg></div>
                <h3 class="text-3xl font-extrabold text-slate-800">{{ $stats['total_kabupaten'] }}</h3>
                <p class="text-xs font-semibold text-slate-800 mt-1">Kabupaten</p>
                <p class="text-[10px] text-slate-400 mt-1">Wilayah Ciayumajakuning</p>
            </div>
            <div class="text-center p-4">
                <div class="w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center text-blue-600 mx-auto mb-3"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg></div>
                <h3 class="text-3xl font-extrabold text-slate-800">10K+</h3>
                <p class="text-xs font-semibold text-slate-800 mt-1">Pengunjung</p>
                <p class="text-[10px] text-slate-400 mt-1">Setiap tahunnya</p>
            </div>
        </div>

        <div class="bg-green-50/50 rounded-2xl p-8 border border-green-100 flex flex-col justify-center relative overflow-hidden" data-aos="fade-left">
            <div class="absolute bottom-0 right-0 opacity-10 pointer-events-none">
                <svg width="200" height="150" viewBox="0 0 24 24" fill="currentColor" class="text-primary"><path d="M12 2L2 12h3v8h14v-8h3L12 2zm0 2.8l7 7h-2v7H7v-7H5l7-7z"/></svg>
            </div>

            <div class="relative z-10">
                <h2 class="text-2xl font-extrabold text-slate-800 mb-4">Tentang {{ $setting->nama_sistem }}</h2>
                <p class="text-sm text-slate-600 leading-relaxed mb-6">
                    {{ $setting->deskripsi_footer }} Temukan kemudahan akses informasi wisata, event budaya, dan panduan lengkap untuk memaksimalkan liburan Anda di wilayah Cirebon, Indramayu, Majalengka, dan Kuningan.
                </p>
                <button class="bg-primary hover:bg-green-700 text-white px-6 py-2.5 rounded-lg text-sm font-medium transition-colors inline-flex items-center gap-2">
                    Selengkapnya Tentang Kami
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </div>
        </div>

    </div>
</section>

<!-- Section Kontak -->
<section id="kontak" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
    <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden" data-aos="fade-up">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="p-10 lg:p-16 bg-slate-900 text-white relative overflow-hidden">
                <div class="absolute top-0 right-0 opacity-10 transform translate-x-1/3 -translate-y-1/4">
                    <svg width="300" height="300" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                </div>
                <h2 class="text-3xl font-extrabold mb-4 relative z-10">Hubungi Kami</h2>
                <p class="text-slate-400 mb-10 relative z-10">Punya pertanyaan atau ingin bekerja sama? Jangan ragu untuk menghubungi kami melalui kontak di bawah ini.</p>
                
                <ul class="space-y-6 relative z-10">
                    <li class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-primary/20 rounded-full flex items-center justify-center text-primary"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg></div>
                        <div><p class="text-sm text-slate-400">Alamat</p><p class="font-semibold">{{ $setting->alamat ?? 'Cirebon, Jawa Barat' }}</p></div>
                    </li>
                    <li class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-primary/20 rounded-full flex items-center justify-center text-primary"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg></div>
                        <div><p class="text-sm text-slate-400">Email</p><p class="font-semibold">{{ $setting->email ?? 'info@forwisata.com' }}</p></div>
                    </li>
                    <li class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-primary/20 rounded-full flex items-center justify-center text-primary"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg></div>
                        <div><p class="text-sm text-slate-400">Telepon</p><p class="font-semibold">{{ $setting->no_telp ?? '0812-3456-7890' }}</p></div>
                    </li>
                </ul>

                <div class="mt-10 relative z-10">
                    <h3 class="text-sm font-semibold mb-4 text-slate-400">Ikuti Kami</h3>
                    <div class="flex space-x-4">
                        @if(isset($setting) && $setting->link_facebook) 
                            <a href="{{ $setting->link_facebook }}" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-blue-600 hover:text-white transition"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></a> 
                        @endif
                        @if(isset($setting) && $setting->link_instagram) 
                            <a href="{{ $setting->link_instagram }}" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-pink-600 hover:text-white transition"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg></a> 
                        @endif
                        @if(isset($setting) && $setting->link_youtube)
                            <a href="{{ $setting->link_youtube }}" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-red-600 hover:text-white transition"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.5 12 3.5 12 3.5s-7.505 0-9.377.55a3.016 3.016 0 0 0-2.122 2.136C0 8.073 0 12 0 12s0 3.927.501 5.814a3.016 3.016 0 0 0 2.122 2.136c1.872.55 9.377.55 9.377.55s7.505 0 9.377-.55a3.016 3.016 0 0 0 2.122-2.136C24 15.927 24 12 24 12s0-3.927-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg></a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="p-10 lg:p-16">
                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap</label>
                            <input type="text" class="w-full border-slate-200 rounded-xl px-4 py-3 focus:border-primary focus:ring-primary" placeholder="Masukkan nama">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                            <input type="email" class="w-full border-slate-200 rounded-xl px-4 py-3 focus:border-primary focus:ring-primary" placeholder="Masukkan email">
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Subjek</label>
                        <input type="text" class="w-full border-slate-200 rounded-xl px-4 py-3 focus:border-primary focus:ring-primary" placeholder="Subjek pesan">
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Pesan</label>
                        <textarea class="w-full border-slate-200 rounded-xl px-4 py-3 focus:border-primary focus:ring-primary h-32" placeholder="Tuliskan pesan Anda di sini..."></textarea>
                    </div>
                    <button type="button" class="bg-primary hover:bg-green-700 text-white font-medium px-8 py-3 rounded-xl transition-colors w-full md:w-auto">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</section>

<footer class="bg-slate-900 pt-16 pb-8 text-white border-t-4 border-primary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
            <div class="md:col-span-2">
                <h3 class="text-2xl font-bold text-white mb-4 flex items-center gap-2">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Forwisata
                </h3>
                <p class="text-slate-400 text-sm mb-6 pr-4 leading-relaxed">{{ $setting->deskripsi_footer }}</p>
                <div class="flex space-x-4">
                    @if($setting->link_facebook) <a href="{{ $setting->link_facebook }}" class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-blue-600 hover:text-white transition"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></a> @endif
                    @if($setting->link_instagram) <a href="{{ $setting->link_instagram }}" class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-pink-600 hover:text-white transition"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg></a> @endif
                </div>
            </div>
            <div>
                <h4 class="text-white font-bold mb-4">Menu Cepat</h4>
                <ul class="space-y-2 text-sm text-slate-400">
                    <li><a href="#" class="hover:text-primary transition">Beranda</a></li>
                    <li><a href="#" class="hover:text-primary transition">Destinasi Wisata</a></li>
                    <li><a href="#" class="hover:text-primary transition">Event & Festival</a></li>
                    <li><a href="#" class="hover:text-primary transition">Tentang Kami</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold mb-4">Kontak Kami</h4>
                <ul class="space-y-3 text-sm text-slate-400">
                    <li class="flex items-start gap-3"><svg class="w-5 h-5 text-primary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg> <span>{{ $setting->alamat ?? 'Cirebon, Jawa Barat' }}</span></li>
                    <li class="flex items-center gap-3"><svg class="w-5 h-5 text-primary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> <span>{{ $setting->email ?? 'info@forwisata.com' }}</span></li>
                    <li class="flex items-center gap-3"><svg class="w-5 h-5 text-primary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg> <span>{{ $setting->no_telp ?? '0812-3456-7890' }}</span></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-slate-500">
            <p>&copy; {{ date('Y') }} {{ $setting->nama_sistem }}. Hak Cipta Dilindungi.</p>
            <div class="flex gap-4 mt-4 md:mt-0">
                <a href="#" class="hover:text-white transition">Syarat & Ketentuan</a>
                <a href="#" class="hover:text-white transition">Kebijakan Privasi</a>
                <a href="{{ route('login') }}" class="hover:text-primary transition">Login Admin</a>
            </div>
        </div>
    </div>
</footer>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sliderImages = document.querySelectorAll('.slider-image');
        if (sliderImages.length > 1) {
            let currentIdx = 0;
            setInterval(() => {
                sliderImages[currentIdx].classList.remove('opacity-100');
                sliderImages[currentIdx].classList.add('opacity-0');
                
                currentIdx = (currentIdx + 1) % sliderImages.length;
                
                sliderImages[currentIdx].classList.remove('opacity-0');
                sliderImages[currentIdx].classList.add('opacity-100');
            }, 5000); // ganti gambar tiap 5 detik
        }
    });
</script>
@endsection

@endsection