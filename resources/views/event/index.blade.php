@extends('layouts.app')
@section('title', 'Data Info Event')
@section('header_title', 'Data Info Event')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<style>
    /* Kustomisasi DataTables agar clean */
    table.dataTable.no-footer { border-bottom: 1px solid #F1F5F9 !important; }
    table.dataTable thead th, table.dataTable thead td { border-bottom: 1px solid #F1F5F9 !important; }
    
    .dataTables_wrapper .dataTables_paginate {
        display: flex; align-items: center; gap: 0.25rem; padding-top: 0 !important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        border: 1px solid #E2E8F0 !important; background: white !important; color: #64748B !important;
        border-radius: 0.5rem !important; padding: 0.25rem 0.75rem !important; font-size: 0.875rem; font-weight: 500; margin: 0 !important; transition: all 0.2s;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.disabled) {
        background: #F8FAFC !important; color: #0F172A !important; border-color: #CBD5E1 !important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        background: #16A34A !important; color: white !important; border-color: #16A34A !important; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled { opacity: 0.5; cursor: not-allowed; }
    .dataTables_wrapper .dataTables_paginate .ellipsis { padding: 0 0.5rem; color: #94A3B8; }
    .dataTables_wrapper .dataTables_info { padding-top: 0 !important; color: #64748B !important; font-size: 0.875rem; }
</style>
@endpush

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 md:p-8">
    
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Data Info Event</h2>
            <div class="flex items-center text-sm text-slate-500 mt-1">
                <span>Beranda</span>
                <span class="mx-2 text-slate-300">/</span>
                <span class="text-slate-600 font-medium">Data Info Event</span>
            </div>
        </div>
        <button onclick="openModal('add')" class="bg-primary hover:bg-green-700 text-white px-5 py-2.5 rounded-xl font-medium transition-all duration-300 shadow-sm shadow-primary/30 flex items-center gap-2 transform hover:-translate-y-0.5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Event
        </button>
    </div>

    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <div class="relative w-full md:w-[450px]">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input type="text" id="customSearchInput" class="w-full pl-10 pr-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all text-sm text-slate-700" placeholder="Cari nama event...">
        </div>
    </div>

    <div class="overflow-x-auto overflow-hidden">
        <table id="eventTable" class="w-full text-left text-sm text-slate-600 whitespace-nowrap">
            <thead class="text-xs text-slate-800 font-bold bg-white border-b border-slate-100">
                <tr>
                    <th class="py-4 px-4 w-16 text-center">No</th>
                    <th class="py-4 px-4">Gambar</th>
                    <th class="py-4 px-4">Judul Event</th>
                    <th class="py-4 px-4">Tanggal Event</th>
                    <th class="py-4 px-4 w-28 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700">
            </tbody>
        </table>
    </div>
</div>

<div id="eventModal" class="fixed inset-0 z-50 hidden bg-slate-900/50 backdrop-blur-sm flex items-center justify-center transition-opacity">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto transform transition-all">
        <div class="p-6 border-b border-slate-100 flex justify-between items-center sticky top-0 bg-white z-10">
            <h3 id="modalTitle" class="text-xl font-bold text-slate-800">Tambah Event</h3>
            <button onclick="closeModal()" class="text-slate-400 hover:text-slate-600 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        
        <form id="eventForm" class="p-6 space-y-5">
            <input type="hidden" id="event_id" name="id">
            <input type="hidden" id="form_method" name="_method" value="POST">

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Judul Event</label>
                <input type="text" name="nama_event" id="nama_event" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none" required placeholder="Cth: Festival Topeng Cirebon">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Tanggal Event</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <input type="text" name="tanggal_event" id="tanggal_event" class="w-full pl-10 pr-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none bg-white cursor-pointer" required placeholder="Pilih tanggal di kalender...">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Gambar <span id="gambar_hint" class="text-xs text-slate-400"></span></label>
                    <input type="file" name="gambar" id="gambar" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm" accept="image/*">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Deskripsi Event</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none" required placeholder="Masukkan detail acara..."></textarea>
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
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>

<script>
    let table;
    
    $(document).ready(function() {
        // Inisialisasi Kalender Flatpickr
        flatpickr("#tanggal_event", {
            mode: "range",          
            dateFormat: "d M Y",    
            locale: "id",           
            disableMobile: "true"   
        });

        // Inisialisasi DataTables
        table = $('#eventTable').DataTable({
            processing: true,
            serverSide: false,
            ajax: "{{ route('admin.event.data') }}",
            dom: '<"min-w-full"t><"flex flex-col md:flex-row justify-between items-center mt-6 gap-4"ip>',
            columns: [
                {data: 'DT_RowIndex', name: 'id', class: 'text-center'},
                {data: 'gambar', name: 'gambar', orderable: false, searchable: false},
                {data: 'nama_event', name: 'nama_event'},
                {data: 'tanggal_event', name: 'tanggal_event'},
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

        // Pencarian custom
        $('#customSearchInput').on('keyup', function() {
            table.search(this.value).draw();
        });

        // Submit Form via AJAX
        $('#eventForm').on('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            let id = $('#event_id').val();
            let url = id ? `/admin/event/${id}` : `{{ route('admin.event.store') }}`;
            
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
                        $.each(response.errors, function(key, value) { errorMsg += value[0] + '<br>'; });
                        Swal.fire('Error!', errorMsg, 'error');
                    }
                },
                error: function() { Swal.fire('Oops!', 'Terjadi kesalahan sistem', 'error'); },
                complete: function() { btn.html(btnText); btn.prop('disabled', false); }
            });
        });
    });

    function openModal(mode) {
        $('#eventForm')[0].reset();
        $('#event_id').val('');
        $('#gambar_hint').text('');
        
        // Membersihkan input flatpickr
        document.querySelector("#tanggal_event")._flatpickr.clear();
        
        if(mode === 'add') {
            $('#modalTitle').text('Tambah Event');
            $('#form_method').val('POST');
            $('#gambar').attr('required', true);
        }
        $('#eventModal').removeClass('hidden');
    }

    function closeModal() {
        $('#eventModal').addClass('hidden');
    }

    function editEvent(id) {
        $.get(`/admin/event/${id}/edit`, function(response) {
            let data = response.data;
            $('#modalTitle').text('Edit Event');
            $('#form_method').val('PUT');
            $('#event_id').val(data.id);
            $('#nama_event').val(data.nama_event);
            
            // Set value flatpickr
            document.querySelector("#tanggal_event")._flatpickr.setDate(data.tanggal_event);
            
            $('#deskripsi').val(data.deskripsi);
            $('#gambar').removeAttr('required');
            $('#gambar_hint').text('(Kosongkan jika tidak ubah gambar)');
            $('#eventModal').removeClass('hidden');
        });
    }

    function deleteEvent(id) {
        Swal.fire({
            title: 'Hapus Data?',
            text: "Data event ini tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/event/${id}`,
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