@extends('layouts.public')
@section('title', 'Semua Destinasi Wisata')

@section('content')
<section class="pt-32 pb-16 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-block py-1 px-3 rounded-full bg-green-100 text-primary font-semibold text-sm mb-4 tracking-wide">DESTINASI LENGKAP</span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-slate-800 mb-4">Eksplorasi Semua Wisata</h1>
            <p class="text-slate-600 max-w-2xl mx-auto">Temukan berbagai destinasi menarik di Ciayumajakuning, dari wisata alam yang menyejukkan, kekayaan budaya, hingga wisata religi yang sarat makna.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-16">
            @forelse($wisatas as $index => $wisata)
            <a href="{{ route('wisata.show', $wisata->id) }}" class="block bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden group hover:shadow-xl transition-all duration-300" data-aos="zoom-in" data-aos-delay="{{ ($index % 4) * 100 }}">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ asset('storage/'.$wisata->gambar) }}" alt="{{ $wisata->nama_wisata }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-3 left-3 bg-white/90 backdrop-blur px-2 py-1 rounded-md text-xs font-bold text-slate-800 shadow-sm">
                        {{ $wisata->kategori }}
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-slate-800 mb-1 group-hover:text-primary transition-colors line-clamp-1">{{ $wisata->nama_wisata }}</h3>
                    <div class="flex justify-between items-center mt-3">
                        <span class="text-slate-500 text-sm flex items-center">
                            <svg class="w-4 h-4 mr-1 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            {{ $wisata->kabupaten }}
                        </span>
                    </div>
                </div>
            </a>
            @empty
            <div class="col-span-full text-center py-12">
                <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <p class="text-slate-500">Belum ada data destinasi wisata.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="flex justify-center" data-aos="fade-up">
            {{ $wisatas->links() }}
        </div>

    </div>
</section>
@endsection
