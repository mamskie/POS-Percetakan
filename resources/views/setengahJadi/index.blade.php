@extends('layouts.master')

@section('title')
Bahan Setengah Jadi
@endsection

@section('breadcrumb')
@parent
<li class="active">Bahab Setengah Jadi</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <button onclick="addForm('{{ route('setengahJadi.store') }}')"
                    class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Tambah</button>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Bahan</th>
                        <th>Jumlah</th>
                        <th width="15%"><i class="fa fa-cog"></i></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('setengahJadi.form')
@includeIf('setengahJadi.form2')
@endsection

@push('scripts')
<script>
    let table;

        $(function() {
            table = $('.table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('setengahJadi.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'nama'
                    },
                    {
                        data: 'nama_bahan'
                    },
                    {
                        data: 'jumlah'
                    },
                    {
                        data: 'aksi',
                        searchable: false,
                        sortable: false
                    },
                ]
            });

            $('#modal-form').validator().on('submit', function(e) {
                if (!e.preventDefault()) {
                    $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
                        .done((response) => {
                            $('#modal-form').modal('hide');
                            table.ajax.reload();
                        })
                        .fail((errors) => {
                            alert('Tidak dapat menyimpan data');
                            return;
                        });
                }
            });
            $('#modal-form2').validator().on('submit', function(e) {
                if (!e.preventDefault()) {
                    $.post($('#modal-form form').attr('action'), $('#modal-form2 form').serialize())
                        .done((response) => {
                            $('#modal-form2').modal('hide');
                            table.ajax.reload();
                        })
                        .fail((errors) => {
                            alert('Tidak dapat menyimpan data');
                            return;
                        });
                }
            });
        });

        function addForm(url) {
            $('#modal-form2').modal('show');
            $('#modal-form2 .modal-title').text('Tambah setengahJadi');

            $('#modal-form2 form')[0].reset();
            $('#modal-form2 form').attr('action', url);
            $('#modal-form2 [name=_method]').val('post');
            $('#modal-form2 [name=nama]').focus();
        }


        function stokForm(url) {
            $('#modal-form2').modal('show');
            $('#modal-form2 .modal-title').text('Tambah Stok');

            $('#modal-form2 form')[0].reset();
            $('#modal-form2 form').attr('action', url);
            $('#modal-form2 [name=_method]').val('put');
            $('#modal-form2 [name=nama]').focus();

            $.get(url)
                .done((response) => {
                    $('#modal-form2 [name=nama]').val(response.nama);
                    $('#modal-form2 [name=id_mentahan]').val(response.id_mentahan);
                    // $('#modal-form [name=jumlah]').val(response.jumlah);
                })
                .fail((errors) => {
                    alert('Tidak dapat menampilkan data');
                    return;
                });
        }
        function editForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Edit setengahJadi');

            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=_method]').val('put');
            $('#modal-form [name=nama]').focus();

            $.get(url)
                .done((response) => {
                    $('#modal-form [name=nama]').val(response.nama);
                    $('#modal-form [name=id_mentahan]').val(response.id_mentahan);
                    // $('#modal-form [name=jumlah]').val(response.jumlah);
                })
                .fail((errors) => {
                    alert('Tidak dapat menampilkan data');
                    return;
                });
        }

        function deleteData(url) {
            if (confirm('Yakin ingin menghapus data terpilih?')) {
                $.post(url, {
                        '_token': $('[name=csrf-token]').attr('content'),
                        '_method': 'delete'
                    })
                    .done((response) => {
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menghapus data');
                        return;
                    });
            }
        }
</script>
@endpush