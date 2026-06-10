@extends('layouts.public')
@section('title', $event->nama_event)

@section('content')

<!-- Hero Section Floating -->
<section class="pt-28 lg:pt-32 pb-8 bg-slate-50">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative w-full h-[300px] md:h-[400px] lg:h-[450px] rounded-3xl shadow-2xl overflow-hidden border border-white/20" data-aos="zoom-in" data-aos-duration="800">
            <img src="{{ asset('storage/'.$event->gambar) }}" class="w-full h-full object-cover" alt="{{ $event->nama_event }}">
            
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/30 to-transparent"></div>

            <!-- Text Content -->
            <div class="absolute bottom-0 left-0 w-full p-6 md:p-10" data-aos="fade-up" data-aos-delay="400">
                <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full bg-primary/90 backdrop-blur text-white font-semibold text-xs md:text-sm mb-3 shadow-lg">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $event->tanggal_event }}
                </span>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white leading-tight drop-shadow-xl">
                    {{ $event->nama_event }}
                </h1>
            </div>
        </div>
    </div>
</section>

<!-- Detail Section -->
<section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
    <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 p-6 md:p-10 relative z-20" data-aos="fade-up">
        
        <h2 class="text-2xl font-bold text-slate-800 mb-6">Informasi Event</h2>
        <div class="prose prose-slate prose-lg max-w-none text-slate-600 leading-relaxed">
            {!! nl2br(e($event->deskripsi)) !!}
        </div>

        <div class="mt-12 pt-8 border-t border-slate-100 flex justify-center">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-primary hover:text-green-700 font-semibold transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</section>

@endsection
