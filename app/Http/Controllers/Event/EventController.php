<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index()
    {
        return view('event.index');
    }

    public function getData()
    {
        $events = Event::latest()->get();
        $data = [];
        
        foreach ($events as $index => $item) {
            $data[] = [
                'DT_RowIndex' => $index + 1,
                'gambar' => '<img src="'.asset('storage/'.$item->gambar).'" class="w-20 h-12 object-cover rounded-md shadow-sm border border-slate-100">',
                'nama_event' => '<span class="font-medium text-slate-800">'.$item->nama_event.'</span>',
                'tanggal_event' => '<span class="text-slate-600 flex items-center gap-2"><svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> '.$item->tanggal_event.'</span>',
                'aksi' => '
                    <div class="flex gap-2 justify-center">
                        <button onclick="editEvent('.$item->id.')" class="p-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors shadow-sm" title="Edit">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        </button>
                        <button onclick="deleteEvent('.$item->id.')" class="p-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors shadow-sm" title="Hapus">
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
            'nama_event' => 'required|string|max:255',
            'tanggal_event' => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()]);
        }

        $gambarPath = $request->file('gambar')->store('event', 'public');

        Event::create([
            'nama_event' => $request->nama_event,
            'tanggal_event' => $request->tanggal_event,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
        ]);

        return response()->json(['status' => 'success', 'message' => 'Data event berhasil ditambahkan!']);
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return response()->json(['status' => 'success', 'data' => $event]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_event' => 'required|string|max:255',
            'tanggal_event' => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()]);
        }

        $event = Event::findOrFail($id);
        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($event->gambar);
            $data['gambar'] = $request->file('gambar')->store('event', 'public');
        }

        $event->update($data);

        return response()->json(['status' => 'success', 'message' => 'Data event berhasil diperbarui!']);
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        Storage::disk('public')->delete($event->gambar);
        $event->delete();

        return response()->json(['status' => 'success', 'message' => 'Data event berhasil dihapus!']);
    }
}