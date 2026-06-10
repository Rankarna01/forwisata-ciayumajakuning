@extends('layouts.public')
@section('title', $wisata->nama_wisata)

@section('content')

<!-- Hero Section Floating -->
<section class="pt-28 lg:pt-32 pb-8 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative w-full h-[300px] md:h-[400px] lg:h-[500px] rounded-3xl shadow-2xl overflow-hidden border border-white/20" data-aos="zoom-in" data-aos-duration="800">
            <img src="{{ asset('storage/'.$wisata->gambar) }}" class="w-full h-full object-cover" alt="{{ $wisata->nama_wisata }}">
            
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/30 to-transparent"></div>

            <!-- Text Content -->
            <div class="absolute bottom-0 left-0 w-full p-6 md:p-10" data-aos="fade-up" data-aos-delay="400">
                <span class="inline-block py-1.5 px-4 rounded-full bg-primary/90 backdrop-blur text-white font-semibold text-xs md:text-sm mb-3 tracking-wide shadow-lg">
                    {{ $wisata->kategori }} &bull; {{ $wisata->kabupaten }}
                </span>
                <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight drop-shadow-xl">
                    {{ $wisata->nama_wisata }}
                </h1>
            </div>
        </div>
    </div>
</section>

<!-- Detail Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <h2 class="text-2xl font-bold text-slate-800 mb-6">Tentang {{ $wisata->nama_wisata }}</h2>
            <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed mb-10">
                {!! nl2br(e($wisata->deskripsi)) !!}
            </div>

            <!-- Lokasi & Maps -->
            <h3 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                Lokasi Maps
            </h3>
            <div class="w-full h-80 bg-slate-100 rounded-2xl overflow-hidden shadow-sm border border-slate-200">
                @if(str_contains($wisata->link_maps, '<iframe'))
                    {!! $wisata->link_maps !!}
                @else
                    <div class="w-full h-full flex flex-col items-center justify-center text-slate-500">
                        <svg class="w-12 h-12 mb-3 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                        <p>Maps tidak tersedia secara langsung.</p>
                        <a href="{{ $wisata->link_maps }}" target="_blank" class="mt-3 text-primary hover:underline">Buka di Google Maps</a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Sidebar / Info Cepat -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl p-6 shadow-xl shadow-slate-200/50 border border-slate-100 sticky top-24">
                <h4 class="font-bold text-slate-800 mb-4 border-b border-slate-100 pb-4">Informasi Cepat</h4>
                
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center text-primary shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 font-medium">Kategori</p>
                            <p class="text-sm font-bold text-slate-800">{{ $wisata->kategori }}</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-500 shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 font-medium">Wilayah</p>
                            <p class="text-sm font-bold text-slate-800">{{ $wisata->kabupaten }}</p>
                        </div>
                    </li>
                </ul>

                <div class="mt-8 pt-6 border-t border-slate-100">
                    <a href="{{ $wisata->link_maps }}" target="_blank" class="w-full block text-center bg-primary hover:bg-green-700 text-white font-medium py-3 rounded-xl transition-colors shadow-lg shadow-primary/30">
                        Petunjuk Arah
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Event Carousel Section -->
<section class="bg-slate-50 py-16 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-8">
            <div>
                <span class="text-primary font-bold text-xs uppercase tracking-wider">Jangan Lewatkan</span>
                <h2 class="text-3xl font-extrabold text-slate-800 mt-1">Event Menarik Lainnya</h2>
            </div>
        </div>

        <!-- Carousel Container -->
        <div class="flex overflow-x-auto snap-x snap-mandatory gap-6 pb-8 hide-scrollbar" style="scrollbar-width: none; -ms-overflow-style: none;">
            <!-- Style tag inline to hide scrollbar for webkit if necessary, but tailwind can do it with a plugin. We'll use simple custom CSS here. -->
            <style>
                .hide-scrollbar::-webkit-scrollbar {
                    display: none;
                }
            </style>

            @foreach($events as $event)
            <a href="{{ route('event.show', $event->id) }}" class="snap-start shrink-0 w-80 bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden group hover:shadow-xl transition-all duration-300 block">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ asset('storage/'.$event->gambar) }}" alt="{{ $event->nama_event }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-3 right-3 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-primary shadow-sm flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        {{ $event->tanggal_event }}
                    </div>
                </div>
                <div class="p-5">
                    <h4 class="font-bold text-slate-800 text-lg mb-2 group-hover:text-primary transition-colors line-clamp-1">{{ $event->nama_event }}</h4>
                    <p class="text-sm text-slate-500 line-clamp-2 leading-relaxed">{{ $event->deskripsi }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

@endsection
