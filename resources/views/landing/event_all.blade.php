@extends('layouts.public')
@section('title', 'Semua Event & Festival')

@section('content')
<section class="pt-32 pb-16 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-block py-1 px-3 rounded-full bg-amber-100 text-accent font-semibold text-sm mb-4 tracking-wide">AGENDA PARIWISATA</span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-slate-800 mb-4">Event & Festival</h1>
            <p class="text-slate-600 max-w-2xl mx-auto">Jangan lewatkan berbagai acara menarik, festival budaya, dan pameran pariwisata yang diselenggarakan sepanjang tahun di wilayah Ciayumajakuning.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            @forelse($events as $index => $event)
            <a href="{{ route('event.show', $event->id) }}" class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden group hover:shadow-xl transition-all duration-300 block" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                <div class="relative h-60 overflow-hidden">
                    <img src="{{ asset('storage/'.$event->gambar) }}" alt="{{ $event->nama_event }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1.5 rounded-full text-xs font-bold text-primary shadow-sm flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        {{ $event->tanggal_event }}
                    </div>
                </div>
                <div class="p-6 md:p-8">
                    <h3 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-primary transition-colors line-clamp-2">{{ $event->nama_event }}</h3>
                    <p class="text-slate-500 text-sm leading-relaxed line-clamp-3 mb-4">{{ $event->deskripsi }}</p>
                    <span class="text-primary font-medium text-sm flex items-center group-hover:gap-2 transition-all">Lihat Detail <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></span>
                </div>
            </a>
            @empty
            <div class="col-span-full text-center py-12">
                <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <p class="text-slate-500">Belum ada agenda event terdekat.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="flex justify-center" data-aos="fade-up">
            {{ $events->links() }}
        </div>

    </div>
</section>
@endsection
