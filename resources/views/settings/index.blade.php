@extends('layouts.app')
@section('title', 'Pengaturan Sistem')
@section('header_title', 'Pengaturan Sistem')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
    
    <div class="p-6 md:p-8 border-b border-slate-100 bg-surface/50 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Pengaturan Profil Portal</h2>
            <p class="text-sm text-slate-500 mt-1">Kelola informasi dasar, kontak, dan logo sistem pariwisata.</p>
        </div>
    </div>

    <div class="p-6 md:p-8">
        <form id="settingForm" class="space-y-8">
            <div class="grid grid-cols-1 xl:grid-cols-12 gap-8">
                
                <div class="xl:col-span-5 space-y-6">
                    <h3 class="text-lg font-semibold text-slate-800 border-b border-slate-100 pb-2">Informasi Utama</h3>
                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Nama Sistem</label>
                        <input type="text" name="nama_sistem" value="{{ $setting->nama_sistem }}" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Upload Logo Baru</label>
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 rounded-xl border border-slate-200 flex items-center justify-center bg-slate-50 overflow-hidden shrink-0">
                                @if($setting->logo)
                                    <img id="logoPreview" src="{{ asset('storage/'.$setting->logo) }}" class="w-full h-full object-contain">
                                @else
                                    <svg id="logoDefault" class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <img id="logoPreview" src="" class="w-full h-full object-contain hidden">
                                @endif
                            </div>
                            <input type="file" name="logo" id="logo" class="w-full px-4 py-2 border border-slate-200 rounded-xl text-sm outline-none cursor-pointer" accept="image/*">
                        </div>
                        <p class="text-xs text-slate-400 mt-2">Disarankan format PNG transparan ukuran 150x50 pixel.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Deskripsi Footer</label>
                        <textarea name="deskripsi_footer" rows="4" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all text-sm leading-relaxed" placeholder="Deskripsi portal untuk ditampilkan di bagian footer landing page...">{{ $setting->deskripsi_footer }}</textarea>
                    </div>
                </div>

                <div class="xl:col-span-7 space-y-6">
                    <h3 class="text-lg font-semibold text-slate-800 border-b border-slate-100 pb-2">Kontak & Sosial Media</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Email Publik</label>
                            <input type="email" name="email" value="{{ $setting->email }}" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Nomor Telepon / WhatsApp</label>
                            <input type="text" name="no_telp" value="{{ $setting->no_telp }}" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Alamat Kantor</label>
                        <textarea name="alamat" rows="2" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all text-sm leading-relaxed">{{ $setting->alamat }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-2">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1 flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg> Facebook
                            </label>
                            <input type="url" name="link_facebook" value="{{ $setting->link_facebook }}" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all text-sm" placeholder="https://...">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1 flex items-center gap-2">
                                <svg class="w-4 h-4 text-pink-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg> Instagram
                            </label>
                            <input type="url" name="link_instagram" value="{{ $setting->link_instagram }}" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all text-sm" placeholder="https://...">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1 flex items-center gap-2">
                                <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.5 12 3.5 12 3.5s-7.505 0-9.377.55a3.016 3.016 0 0 0-2.122 2.136C0 8.07 0 12 0 12s0 3.93.501 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.55 9.377.55 9.377.55s7.505 0 9.377-.55a3.016 3.016 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg> YouTube
                            </label>
                            <input type="url" name="link_youtube" value="{{ $setting->link_youtube }}" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all text-sm" placeholder="https://...">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-8 border-t border-slate-100">
                <button type="submit" id="btnSave" class="px-8 py-3 rounded-xl text-white bg-primary hover:bg-green-700 shadow-sm shadow-primary/30 transition-all duration-300 font-semibold flex items-center gap-2 transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                    Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        
        // Image Preview handler
        $('#logo').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#logoPreview').attr('src', e.target.result).removeClass('hidden');
                $('#logoDefault').addClass('hidden');
            }
            if(this.files[0]) {
                reader.readAsDataURL(this.files[0]); 
            }
        });

        // Form Submit
        $('#settingForm').on('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            
            let btn = $('#btnSave');
            let btnText = btn.html();
            btn.html('<svg class="animate-spin h-5 w-5 mr-2 text-white" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Menyimpan...');
            btn.prop('disabled', true);

            $.ajax({
                url: "{{ route('admin.settings.update') }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if(response.status === 'success') {
                        showNotification('success', response.message);
                        
                        // Update preview gambar tanpa reload (jika ada file di-upload)
                        if(response.new_logo_url) {
                            $('#logoPreview').attr('src', response.new_logo_url);
                        }
                    } else if(response.status === 'error') {
                        let errorMsg = '';
                        $.each(response.errors, function(key, value) { errorMsg += value[0] + '<br>'; });
                        Swal.fire('Error!', errorMsg, 'error');
                    }
                },
                error: function() { Swal.fire('Oops!', 'Terjadi kesalahan sistem', 'error'); },
                complete: function() { btn.html(btnText); btn.prop('disabled', false); }
            });
        });
    });
</script>
@endpush