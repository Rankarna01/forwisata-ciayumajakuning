<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        // Ambil data pertama. Jika belum ada (karena belum di-seed), buat otomatis.
        $setting = Setting::first();
        if (!$setting) {
            $setting = Setting::create([
                'nama_sistem' => 'Forwisata Ciayumajakuning',
                'email' => 'info@forwisata.com',
                'no_telp' => '081234567890',
            ]);
        }

        return view('settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_sistem' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'no_telp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'deskripsi_footer' => 'nullable|string',
            'link_facebook' => 'nullable|url|max:255',
            'link_instagram' => 'nullable|url|max:255',
            'link_youtube' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()]);
        }

        $setting = Setting::first();
        $data = $request->except('logo');

        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($setting->logo && Storage::disk('public')->exists($setting->logo)) {
                Storage::disk('public')->delete($setting->logo);
            }
            $data['logo'] = $request->file('logo')->store('settings', 'public');
        }

        $setting->update($data);

        return response()->json([
            'status' => 'success', 
            'message' => 'Pengaturan sistem berhasil diperbarui!',
            // Opsional: kirim balik URL logo baru untuk update preview tanpa reload
            'new_logo_url' => isset($data['logo']) ? asset('storage/'.$data['logo']) : null
        ]);
    }
}