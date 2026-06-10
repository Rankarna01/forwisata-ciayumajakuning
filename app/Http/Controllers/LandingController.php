<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\Event;
use App\Models\Setting;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // Ambil data pengaturan (jika kosong, buat default object)
        $setting = Setting::first() ?? new Setting([
            'nama_sistem' => 'Forwisata Ciayumajakuning',
            'deskripsi_footer' => 'Portal resmi pariwisata wilayah Cirebon, Indramayu, Majalengka, dan Kuningan.'
        ]);

        // Ambil 4 destinasi terbaru untuk ditampilkan di depan
        $destinasiPopuler = Wisata::latest()->take(4)->get();

        // Ambil 3 event terbaru
        $events = Event::latest()->take(3)->get();

        // Data statistik (bisa dinamis dari database)
        $stats = [
            'total_wisata' => Wisata::count(),
            'total_event' => Event::count(),
            'total_kabupaten' => 4,
        ];

        // Ambil data slider untuk banner hero
        $sliders = \App\Models\Slider::latest()->get();

        return view('landing.index', compact('setting', 'destinasiPopuler', 'events', 'stats', 'sliders'));
    }

    public function showWisata($id)
    {
        $wisata = Wisata::findOrFail($id);
        $setting = Setting::first() ?? new Setting([
            'nama_sistem' => 'Forwisata Ciayumajakuning',
            'deskripsi_footer' => 'Portal resmi pariwisata wilayah Cirebon, Indramayu, Majalengka, dan Kuningan.'
        ]);
        
        // Ambil semua event untuk carousel
        $events = Event::latest()->get();
        
        return view('landing.wisata_detail', compact('wisata', 'setting', 'events'));
    }

    public function showEvent($id)
    {
        $event = Event::findOrFail($id);
        $setting = Setting::first() ?? new Setting([
            'nama_sistem' => 'Forwisata Ciayumajakuning',
            'deskripsi_footer' => 'Portal resmi pariwisata wilayah Cirebon, Indramayu, Majalengka, dan Kuningan.'
        ]);
        
        return view('landing.event_detail', compact('event', 'setting'));
    }

    public function allWisata()
    {
        $wisatas = Wisata::latest()->paginate(12);
        $setting = Setting::first() ?? new Setting([
            'nama_sistem' => 'Forwisata Ciayumajakuning',
            'deskripsi_footer' => 'Portal resmi pariwisata wilayah Cirebon, Indramayu, Majalengka, dan Kuningan.'
        ]);
        return view('landing.wisata_all', compact('wisatas', 'setting'));
    }

    public function allEvent()
    {
        $events = Event::latest()->paginate(9);
        $setting = Setting::first() ?? new Setting([
            'nama_sistem' => 'Forwisata Ciayumajakuning',
            'deskripsi_footer' => 'Portal resmi pariwisata wilayah Cirebon, Indramayu, Majalengka, dan Kuningan.'
        ]);
        return view('landing.event_all', compact('events', 'setting'));
    }
}