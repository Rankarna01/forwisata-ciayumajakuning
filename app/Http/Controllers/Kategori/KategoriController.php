<?php

namespace App\Http\Controllers\Kategori;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function index()
    {
        return view('kategori.index');
    }

    public function getData()
    {
        $kategoris = Kategori::latest()->get();
        $data = [];
        
        foreach ($kategoris as $index => $item) {
            // Kita tambahkan total wisata nanti jika sudah direlasikan, sementara statis atau query count
            $totalWisata = \App\Models\Wisata::where('kategori', $item->nama_kategori)->count();

            $data[] = [
                'DT_RowIndex' => $index + 1,
                'nama_kategori' => '<span class="font-bold text-slate-800">'.$item->nama_kategori.'</span>',
                'deskripsi' => '<span class="text-slate-600">'.$item->deskripsi.'</span>',
                'total_wisata' => '<span class="px-3 py-1 bg-green-50 text-primary font-medium rounded-md text-xs">'.$totalWisata.' Wisata</span>',
                'aksi' => '
                    <div class="flex gap-2 justify-center">
                        <button onclick="editKategori('.$item->id.')" class="p-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors shadow-sm" title="Edit">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        </button>
                        <button onclick="deleteKategori('.$item->id.')" class="p-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors shadow-sm" title="Hapus">
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
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()]);
        }

        Kategori::create($request->all());

        return response()->json(['status' => 'success', 'message' => 'Kategori berhasil ditambahkan!']);
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return response()->json(['status' => 'success', 'data' => $kategori]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()]);
        }

        $kategori = Kategori::findOrFail($id);
        
        // Opsional: Update juga nama kategori di tabel wisata jika nama kategori berubah
        if($kategori->nama_kategori !== $request->nama_kategori) {
            \App\Models\Wisata::where('kategori', $kategori->nama_kategori)
                              ->update(['kategori' => $request->nama_kategori]);
        }

        $kategori->update($request->all());

        return response()->json(['status' => 'success', 'message' => 'Kategori berhasil diperbarui!']);
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        
        // Cek apakah ada wisata yang menggunakan kategori ini
        $cekWisata = \App\Models\Wisata::where('kategori', $kategori->nama_kategori)->count();
        if ($cekWisata > 0) {
            return response()->json(['status' => 'error', 'message' => 'Kategori tidak bisa dihapus karena sedang digunakan oleh data wisata!']);
        }

        $kategori->delete();
        return response()->json(['status' => 'success', 'message' => 'Kategori berhasil dihapus!']);
    }
}