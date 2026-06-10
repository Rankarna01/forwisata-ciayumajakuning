<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use App\Models\Event;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Top Stat Cards
        $totalWisata = Wisata::count();
        $totalKategori = Wisata::select('kategori')->distinct()->count();
        $totalEvent = Event::count();
        $totalSlider = Slider::count();

        // 6 Bulan Terakhir Line Chart
        $months = [];
        $wisataData = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $months[] = $date->translatedFormat('M'); // Jan, Feb, dst
            
            $count = Wisata::whereYear('created_at', $date->year)
                           ->whereMonth('created_at', $date->month)
                           ->count();
            $wisataData[] = $count;
        }

        // Kategori Donut Chart
        $totalAlam = Wisata::where('kategori', 'Wisata Alam')->count();
        $totalBudaya = Wisata::where('kategori', 'Wisata Budaya')->count();
        $totalReligi = Wisata::where('kategori', 'Wisata Religi')->count();

        $labelsKategori = ['Wisata Alam', 'Wisata Budaya', 'Wisata Religi'];
        $dataKategori = [$totalAlam, $totalBudaya, $totalReligi];

        // Info Terbaru (Latest items)
        $latestWisata = Wisata::latest()->take(2)->get();

        return view('dashboard.index', compact(
            'totalWisata', 'totalKategori', 'totalEvent', 'totalSlider',
            'months', 'wisataData',
            'labelsKategori', 'dataKategori',
            'latestWisata'
        ));
    }
}