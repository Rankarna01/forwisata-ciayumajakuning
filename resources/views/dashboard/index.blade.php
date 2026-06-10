@extends('layouts.app')
@section('title', 'Dashboard')
@section('header_title', 'Dashboard')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-extrabold text-slate-800 mb-2">Dashboard</h1>
    <h2 class="text-lg font-bold text-slate-800">Selamat datang kembali, {{ Auth::user()->name }} 👋</h2>
    <p class="text-slate-500 text-sm mt-1">Kelola informasi wisata Ciayumajakuning dengan mudah.</p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    <!-- Card 1: Total Tempat Wisata -->
    <div class="bg-white rounded-2xl shadow-sm p-6 border border-slate-100 flex items-center gap-5 hover:shadow-md transition-shadow">
        <div class="w-16 h-16 rounded-full bg-blue-50 flex items-center justify-center flex-shrink-0">
            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
        </div>
        <div>
            <p class="text-xs font-semibold text-slate-500 mb-1">Total Tempat Wisata</p>
            <h3 class="text-2xl font-bold text-slate-800">{{ $totalWisata }}</h3>
            <p class="text-[11px] text-slate-400 mt-1">+12 dari bulan lalu</p>
        </div>
    </div>

    <!-- Card 2: Total Kategori -->
    <div class="bg-white rounded-2xl shadow-sm p-6 border border-slate-100 flex items-center gap-5 hover:shadow-md transition-shadow">
        <div class="w-16 h-16 rounded-full bg-green-50 flex items-center justify-center flex-shrink-0">
            <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            </div>
        </div>
        <div>
            <p class="text-xs font-semibold text-slate-500 mb-1">Total Kategori</p>
            <h3 class="text-2xl font-bold text-slate-800">{{ $totalKategori }}</h3>
            <p class="text-[11px] text-slate-400 mt-1">Tetap</p>
        </div>
    </div>

    <!-- Card 3: Total Info Event -->
    <div class="bg-white rounded-2xl shadow-sm p-6 border border-slate-100 flex items-center gap-5 hover:shadow-md transition-shadow">
        <div class="w-16 h-16 rounded-full bg-orange-50 flex items-center justify-center flex-shrink-0">
            <div class="w-12 h-12 rounded-full bg-orange-100 flex items-center justify-center text-orange-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
        </div>
        <div>
            <p class="text-xs font-semibold text-slate-500 mb-1">Total Info Event</p>
            <h3 class="text-2xl font-bold text-slate-800">{{ $totalEvent }}</h3>
            <p class="text-[11px] text-slate-400 mt-1">+3 dari bulan lalu</p>
        </div>
    </div>

    <!-- Card 4: Total Slider -->
    <div class="bg-white rounded-2xl shadow-sm p-6 border border-slate-100 flex items-center gap-5 hover:shadow-md transition-shadow">
        <div class="w-16 h-16 rounded-full bg-purple-50 flex items-center justify-center flex-shrink-0">
            <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center text-purple-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
        </div>
        <div>
            <p class="text-xs font-semibold text-slate-500 mb-1">Total Slider</p>
            <h3 class="text-2xl font-bold text-slate-800">{{ $totalSlider }}</h3>
            <p class="text-[11px] text-slate-400 mt-1">Tetap</p>
        </div>
    </div>

</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    <!-- Line Chart Statistik -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 lg:col-span-2">
        <div class="flex items-center justify-between mb-6">
            <h3 class="font-bold text-sm text-slate-800">Statistik Tempat Wisata</h3>
            <div class="bg-slate-50 border border-slate-100 text-xs font-semibold text-slate-600 px-3 py-1.5 rounded-lg flex items-center gap-2 cursor-pointer">
                6 Bulan Terakhir
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </div>
        </div>
        <div class="relative h-72 w-full">
            <canvas id="statistikChart"></canvas>
        </div>
    </div>

    <!-- Donut Chart Kategori -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="font-bold text-sm text-slate-800">Kategori Wisata</h3>
        </div>
        <div class="relative h-64 w-full flex items-center justify-center mt-4">
            <canvas id="kategoriChart"></canvas>
        </div>
    </div>
</div>

<!-- Info Terbaru Section -->
<div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 mb-8">
    <h3 class="font-bold text-sm text-slate-800 mb-6">Info Terbaru</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($latestWisata as $info)
        <div class="flex flex-col sm:flex-row gap-4 group cursor-pointer border border-transparent hover:border-slate-100 hover:bg-slate-50 p-3 rounded-xl transition-all">
            <div class="w-full sm:w-40 h-28 rounded-xl overflow-hidden flex-shrink-0">
                <img src="{{ $info->gambar ? asset('storage/'.$info->gambar) : 'https://images.unsplash.com/photo-1596404179344-934d402ceec6?q=80&w=500&auto=format&fit=crop' }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="{{ $info->nama }}">
            </div>
            <div class="flex flex-col justify-center">
                <div class="flex items-center gap-2 mb-1">
                    <h4 class="font-bold text-slate-800 text-base line-clamp-1 group-hover:text-primary transition-colors">{{ $info->nama }}</h4>
                    <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2 py-0.5 rounded-md">Baru</span>
                </div>
                <p class="text-xs text-slate-500 mb-3 line-clamp-2 leading-relaxed">
                    {{ Str::limit(strip_tags($info->deskripsi), 80) }}
                </p>
                <div class="text-[11px] font-medium text-slate-400 mt-auto">
                    {{ $info->created_at->translatedFormat('d F Y') }}
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-2 text-center text-slate-500 py-4 text-sm">Belum ada info wisata terbaru.</div>
        @endforelse
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        
        // --- 1. Line Chart: Statistik Wisata 6 Bulan ---
        const ctxStat = document.getElementById('statistikChart').getContext('2d');
        const labelsStat = @json(array_reverse($months));
        const dataStat = @json(array_reverse($wisataData));
        
        // Gradient for line chart (Primary Green: #16A34A)
        const gradientStat = ctxStat.createLinearGradient(0, 0, 0, 400);
        gradientStat.addColorStop(0, 'rgba(22, 163, 74, 0.2)'); // Green with opacity
        gradientStat.addColorStop(1, 'rgba(22, 163, 74, 0)');

        new Chart(ctxStat, {
            type: 'line',
            data: {
                labels: labelsStat.length > 0 ? labelsStat : ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Tempat Wisata',
                    data: dataStat.length > 0 ? dataStat : [5, 10, 18, 12, 20, 35],
                    borderColor: '#16A34A', // Green-600
                    backgroundColor: gradientStat,
                    borderWidth: 3,
                    pointBackgroundColor: '#16A34A',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    fill: true,
                    tension: 0.4 // Smooth curve
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#0F172A',
                        padding: 12,
                        titleFont: { family: 'Poppins', size: 14 },
                        bodyFont: { family: 'Poppins', size: 13 },
                        cornerRadius: 8,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { borderDash: [4, 4], color: '#F1F5F9' }, // Lighter dashed grid
                        ticks: { stepSize: 10, font: { family: 'Poppins', size: 11 }, color: '#94A3B8' },
                        border: { display: false }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { font: { family: 'Poppins', size: 11 }, color: '#94A3B8' },
                        border: { display: false }
                    }
                }
            }
        });

        // --- 2. Doughnut Chart: Kategori Wisata ---
        const ctxKategori = document.getElementById('kategoriChart').getContext('2d');
        const labelsKat = @json($labelsKategori);
        const dataKat = @json($dataKategori);
        const totalKat = dataKat.reduce((a, b) => a + b, 0);

        new Chart(ctxKategori, {
            type: 'doughnut',
            data: {
                labels: labelsKat,
                datasets: [{
                    data: totalKat === 0 ? [1, 1, 1] : dataKat,
                    backgroundColor: [
                        '#16A34A', // Alam (Primary Green)
                        '#3B82F6', // Budaya (Blue)
                        '#F59E0B'  // Religi (Orange)
                    ],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '65%', // Moderately thick
                plugins: {
                    legend: {
                        position: 'right', // Legend on the right like the image
                        align: 'center',
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle',
                            padding: 20,
                            font: { family: 'Poppins', size: 12, weight: '600' },
                            color: '#1E293B',
                        }
                    },
                    tooltip: {
                        backgroundColor: '#0F172A',
                        padding: 12,
                        bodyFont: { family: 'Poppins' },
                        cornerRadius: 8,
                        callbacks: {
                            label: function(context) {
                                if (totalKat === 0) return ' Belum ada data';
                                const value = context.raw;
                                const percentage = Math.round((value / totalKat) * 100);
                                return ' ' + context.label + ': ' + value + ' (' + percentage + '%)';
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endpush