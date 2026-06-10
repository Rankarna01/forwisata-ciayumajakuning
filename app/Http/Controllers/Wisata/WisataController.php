<?php

namespace App\Http\Controllers\Wisata;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use App\Models\Kategori; // Import Model Kategori
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class WisataController extends Controller
{
    public function index()
    {
        // Mengambil seluruh data kategori dari database
        $kategoris = Kategori::all();
        
        // Melempar data kategori ke view wisata
        return view('wisata.index', compact('kategoris'));
    }

    public function getData()
    {
        $wisatas = Wisata::latest()->get();
        $data = [];
        
        foreach ($wisatas as $index => $item) {
            
            // Kustomisasi warna badge. Jika kategori baru ditambahkan, otomatis pakai warna default (abu-abu)
            $badgeColor = 'bg-slate-100 text-slate-600'; 
            if (stripos($item->kategori, 'Alam') !== false) {
                $badgeColor = 'bg-green-100 text-green-700';
            } else if (stripos($item->kategori, 'Budaya') !== false) {
                $badgeColor = 'bg-blue-100 text-blue-700';
            } else if (stripos($item->kategori, 'Religi') !== false) {
                $badgeColor = 'bg-amber-100 text-amber-700';
            }

            // Hapus kata 'Wisata' agar label lebih rapi (opsional)
            $labelKategori = str_replace('Wisata ', '', $item->kategori);

            $data[] = [
                'DT_RowIndex' => $index + 1,
                'gambar' => '<img src="'.asset('storage/'.$item->gambar).'" class="w-20 h-12 object-cover rounded-md shadow-sm border border-slate-100">',
                'nama_wisata' => '<span class="font-medium text-slate-800">'.$item->nama_wisata.'</span>',
                'kategori' => '<span class="px-3 py-1 text-xs font-semibold rounded-md '.$badgeColor.'">'.$labelKategori.'</span>',
                'kabupaten' => '<span class="text-slate-600">'.$item->kabupaten.'</span>',
                'aksi' => '
                    <div class="flex gap-2 justify-center">
                        <button onclick="editWisata('.$item->id.')" class="p-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors shadow-sm" title="Edit">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        </button>
                        <button onclick="deleteWisata('.$item->id.')" class="p-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors shadow-sm" title="Hapus">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>
                '
            ];
        }

        return response()->json(['data' => $data]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_wisata' => 'required|string|max:255',
            'kategori' => 'required|string',
            'kabupaten' => 'required|string',
            'deskripsi' => 'required',
            'link_maps' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()]);
        }

        $gambarPath = $request->file('gambar')->store('wisata', 'public');

        Wisata::create([
            'nama_wisata' => $request->nama_wisata,
            'kategori' => $request->kategori,
            'kabupaten' => $request->kabupaten,
            'deskripsi' => $request->deskripsi,
            'link_maps' => $request->link_maps,
            'gambar' => $gambarPath,
        ]);

        return response()->json(['status' => 'success', 'message' => 'Data wisata berhasil ditambahkan!']);
    }

    public function edit($id)
    {
        $wisata = Wisata::findOrFail($id);
        return response()->json(['status' => 'success', 'data' => $wisata]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_wisata' => 'required|string|max:255',
            'kategori' => 'required|string',
            'kabupaten' => 'required|string',
            'deskripsi' => 'required',
            'link_maps' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()]);
        }

        $wisata = Wisata::findOrFail($id);
        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($wisata->gambar);
            $data['gambar'] = $request->file('gambar')->store('wisata', 'public');
        }

        $wisata->update($data);

        return response()->json(['status' => 'success', 'message' => 'Data wisata berhasil diperbarui!']);
    }

    public function destroy($id)
    {
        $wisata = Wisata::findOrFail($id);
        Storage::disk('public')->delete($wisata->gambar);
        $wisata->delete();

        return response()->json(['status' => 'success', 'message' => 'Data wisata berhasil dihapus!']);
    }
}