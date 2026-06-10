@extends('layouts.app')
@section('title', 'Data Tempat Wisata')
@section('header_title', 'Data Tempat Wisata')

@push('styles')
<style>
    /* Menghilangkan border bawaan DataTable agar clean */
    table.dataTable.no-footer {
        border-bottom: 1px solid #F1F5F9 !important;
    }
    table.dataTable thead th, table.dataTable thead td {
        border-bottom: 1px solid #F1F5F9 !important;
    }
    
    /* Kustomisasi Pagination DataTables agar mirip referensi */
    .dataTables_wrapper .dataTables_paginate {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        padding-top: 0 !important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        border: 1px solid #E2E8F0 !important;
        background: white !important;
        color: #64748B !important;
        border-radius: 0.5rem !important; /* Rounded kotak */
        padding: 0.25rem 0.75rem !important;
        font-size: 0.875rem;
        font-weight: 500;
        margin: 0 !important;
        transition: all 0.2s;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.disabled) {
        background: #F8FAFC !important;
        color: #0F172A !important;
        border-color: #CBD5E1 !important;
    }
    /* Warna aktif (Primary Green kita) */
    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        background: #16A34A !important;
        color: white !important;
        border-color: #16A34A !important;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
    .dataTables_wrapper .dataTables_paginate .ellipsis {
        padding: 0 0.5rem;
        color: #94A3B8;
    }
    .dataTables_wrapper .dataTables_info {
        padding-top: 0 !important;
        color: #64748B !important;
        font-size: 0.875rem;
    }
</style>
@endpush

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 md:p-8">
    
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Data Tempat Wisata</h2>
            <div class="flex items-center text-sm text-slate-500 mt-1">
                <span>Beranda</span>
                <span class="mx-2 text-slate-300">/</span>
                <span class="text-slate-600 font-medium">Data Tempat Wisata</span>
            </div>
        </div>
        <button onclick="openModal('add')" class="bg-primary hover:bg-green-700 text-white px-5 py-2.5 rounded-xl font-medium transition-all duration-300 shadow-sm shadow-primary/30 flex items-center gap-2 transform hover:-translate-y-0.5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Wisata
        </button>
    </div>

    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <div class="relative w-full md:w-[450px]">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input type="text" id="customSearchInput" class="w-full pl-10 pr-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all text-sm text-slate-700" placeholder="Cari nama wisata...">
        </div>
        <button class="flex items-center justify-center gap-2 px-5 py-2.5 border border-slate-200 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors text-sm font-medium w-full md:w-auto">
            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
            Filter
        </button>
    </div>

    <div class="overflow-x-auto overflow-hidden">
        <table id="wisataTable" class="w-full text-left text-sm text-slate-600 whitespace-nowrap">
            <thead class="text-xs text-slate-800 font-bold bg-white border-b border-slate-100">
                <tr>
                    <th class="py-4 px-4 w-16">No</th>
                    <th class="py-4 px-4">Gambar</th>
                    <th class="py-4 px-4">Nama Wisata</th>
                    <th class="py-4 px-4">Kategori</th>
                    <th class="py-4 px-4">Kabupaten</th>
                    <th class="py-4 px-4 w-28 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700">
                </tbody>
        </table>
    </div>
</div>

<div id="wisataModal" class="fixed inset-0 z-50 hidden bg-slate-900/50 backdrop-blur-sm flex items-center justify-center transition-opacity">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-3xl max-h-[90vh] overflow-y-auto transform transition-all">
        <div class="p-6 border-b border-slate-100 flex justify-between items-center sticky top-0 bg-white z-10">
            <h3 id="modalTitle" class="text-xl font-bold text-slate-800">Tambah Wisata</h3>
            <button onclick="closeModal()" class="text-slate-400 hover:text-slate-600 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        
        <form id="wisataForm" class="p-6 space-y-5">
            <input type="hidden" id="wisata_id" name="id">
            <input type="hidden" id="form_method" name="_method" value="POST">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Nama Wisata</label>
                    <input type="text" name="nama_wisata" id="nama_wisata" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Kategori</label>
                    
                    <select name="kategori" id="kategori" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none bg-white" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->nama_kategori }}">{{ $kategori->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Kabupaten</label>
                    <select name="kabupaten" id="kabupaten" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none" required>
                        <option value="">Pilih Kabupaten</option>
                        <option value="Cirebon">Cirebon</option>
                        <option value="Indramayu">Indramayu</option>
                        <option value="Majalengka">Majalengka</option>
                        <option value="Kuningan">Kuningan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Gambar <span id="gambar_hint" class="text-xs text-slate-400"></span></label>
                    <input type="file" name="gambar" id="gambar" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm" accept="image/*">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none" required></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Link Google Maps (Embed)</label>
                <textarea name="link_maps" id="link_maps" rows="2" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none font-mono text-xs" required placeholder="<iframe src='...'></iframe>"></textarea>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
                <button type="button" onclick="closeModal()" class="px-5 py-2 rounded-lg text-slate-600 bg-slate-100 hover:bg-slate-200 transition-colors font-medium">Batal</button>
                <button type="submit" id="btnSave" class="px-5 py-2 rounded-lg text-white bg-primary hover:bg-green-700 shadow-sm shadow-primary/30 transition-colors font-medium flex items-center gap-2">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let table;
    
    $(document).ready(function() {
        table = $('#wisataTable').DataTable({
            processing: true,
            serverSide: false,
            ajax: "{{ route('admin.wisata.data') }}",
            
            // MAGIC STRINGS: 'dom' ini merombak UI DataTable. 
            // Kita hilangkan 'f' (filter default) dan 'l' (length default).
            // Menyisakan 't' (table), 'i' (info data kiri bawah), dan 'p' (pagination kanan bawah)
            dom: '<"min-w-full"t><"flex flex-col md:flex-row justify-between items-center mt-6 gap-4"ip>',
            
            columns: [
                {data: 'DT_RowIndex', name: 'id', class: 'text-center'},
                {data: 'gambar', name: 'gambar', orderable: false, searchable: false},
                {data: 'nama_wisata', name: 'nama_wisata'},
                {data: 'kategori', name: 'kategori'},
                {data: 'kabupaten', name: 'kabupaten'},
                {data: 'aksi', name: 'aksi', orderable: false, searchable: false, class: 'text-center'},
            ],
            language: {
                info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                infoEmpty: "Menampilkan 0 data",
                paginate: {
                    next: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>',
                    previous: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>'
                }
            }
        });

        // Binding Search Custom Input ke fungsi Search DataTables
        $('#customSearchInput').on('keyup', function() {
            table.search(this.value).draw();
        });

        // Submit Form (Create / Update)
        $('#wisataForm').on('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            let id = $('#wisata_id').val();
            let url = id ? `/admin/wisata/${id}` : `{{ route('admin.wisata.store') }}`;
            
            let btn = $('#btnSave');
            let btnText = btn.html();
            btn.html('<svg class="animate-spin h-5 w-5 mr-2 text-white" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Memproses...');
            btn.prop('disabled', true);

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if(response.status === 'success') {
                        closeModal();
                        table.ajax.reload();
                        showNotification('success', response.message);
                    } else if(response.status === 'error') {
                        let errorMsg = '';
                        $.each(response.errors, function(key, value) {
                            errorMsg += value[0] + '<br>';
                        });
                        Swal.fire('Error!', errorMsg, 'error');
                    }
                },
                error: function(xhr) {
                    Swal.fire('Oops!', 'Terjadi kesalahan sistem', 'error');
                },
                complete: function() {
                    btn.html(btnText);
                    btn.prop('disabled', false);
                }
            });
        });
    });

    // Sisa fungsi buka/tutup modal dan AJAX delete tetap sama persis
    function openModal(mode) {
        $('#wisataForm')[0].reset();
        $('#wisata_id').val('');
        $('#gambar_hint').text('');
        if(mode === 'add') {
            $('#modalTitle').text('Tambah Wisata');
            $('#form_method').val('POST');
            $('#gambar').attr('required', true);
        }
        $('#wisataModal').removeClass('hidden');
    }

    function closeModal() {
        $('#wisataModal').addClass('hidden');
    }

    function editWisata(id) {
        $.get(`/admin/wisata/${id}/edit`, function(response) {
            let data = response.data;
            $('#modalTitle').text('Edit Wisata');
            $('#form_method').val('PUT');
            $('#wisata_id').val(data.id);
            $('#nama_wisata').val(data.nama_wisata);
            $('#kategori').val(data.kategori);
            $('#kabupaten').val(data.kabupaten);
            $('#deskripsi').val(data.deskripsi);
            $('#link_maps').val(data.link_maps);
            $('#gambar').removeAttr('required');
            $('#gambar_hint').text('(Biarkan kosong jika tidak ingin mengubah gambar)');
            $('#wisataModal').removeClass('hidden');
        });
    }

    function deleteWisata(id) {
        Swal.fire({
            title: 'Hapus Data?',
            text: "Data wisata yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/wisata/${id}`,
                    type: 'POST',
                    data: { _method: 'DELETE' },
                    success: function(response) {
                        if(response.status === 'success') {
                            table.ajax.reload();
                            showNotification('success', response.message);
                        }
                    }
                });
            }
        });
    }
</script>
@endpush