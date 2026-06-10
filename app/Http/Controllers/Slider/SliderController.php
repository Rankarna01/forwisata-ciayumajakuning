<?php

namespace App\Http\Controllers\Slider;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function index()
    {
        return view('slider.index');
    }

    public function getData()
    {
        $sliders = Slider::latest()->get();
        $data = [];
        
        foreach ($sliders as $index => $item) {
            $data[] = [
                'DT_RowIndex' => $index + 1,
                // Menggunakan w-32 untuk gambar agar tampil lebih lebar (landscape)
                'gambar' => '<img src="'.asset('storage/'.$item->gambar).'" class="w-32 h-16 object-cover rounded-md shadow-sm border border-slate-100">',
                'judul' => '<span class="font-bold text-slate-800">'.$item->judul.'</span>',
                'deskripsi' => '<span class="text-slate-600 text-sm">'.($item->deskripsi ?? '-').'</span>',
                'aksi' => '
                    <div class="flex gap-2 justify-center">
                        <button onclick="editSlider('.$item->id.')" class="p-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors shadow-sm" title="Edit">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        </button>
                        <button onclick="deleteSlider('.$item->id.')" class="p-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors shadow-sm" title="Hapus">
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
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:3072', // Max 3MB karena gambar banner biasanya besar
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()]);
        }

        $gambarPath = $request->file('gambar')->store('slider', 'public');

        Slider::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
        ]);

        return response()->json(['status' => 'success', 'message' => 'Slider berhasil ditambahkan!']);
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return response()->json(['status' => 'success', 'data' => $slider]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()]);
        }

        $slider = Slider::findOrFail($id);
        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($slider->gambar);
            $data['gambar'] = $request->file('gambar')->store('slider', 'public');
        }

        $slider->update($data);

        return response()->json(['status' => 'success', 'message' => 'Slider berhasil diperbarui!']);
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        Storage::disk('public')->delete($slider->gambar);
        $slider->delete();

        return response()->json(['status' => 'success', 'message' => 'Slider berhasil dihapus!']);
    }
}