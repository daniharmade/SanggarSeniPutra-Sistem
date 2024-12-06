@extends('layouts.main')

@section('title', 'Data Kesenian - Sanggar Seni Putra Karuhun')

@section('header-title', 'Data Kesenian')

@section('breadcrumbs')
    <div class="breadcrumb-item"><a href="#">Kesenian</a></div>
    <div class="breadcrumb-item active">Data Kesenian</div>
@endsection

@section('section-title', 'Kesenian')

@section('section-lead')
    Berikut ini adalah daftar seluruh kesenian.
@endsection

@section('content')

    @component('components.datatables')
        @slot('table_id', 'room-table')

        @slot('table_header')
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Paket</th>
                <th>Harga</th>
                <th>Anggota</th>
                <th>Deskripsi</th>
            </tr>
        @endslot
    @endcomponent

@endsection

@push('after-script')
    <script>
        $(document).ready(function() {
            $('#room-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('kesenian-list.json') }}',
                order: [2, 'asc'],
                columns: [{
                        name: 'DT_RowIndex',
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        name: 'nama',
                        data: 'nama',
                    },
                    {
                        name: 'paket',
                        data: 'paket',
                    },
                    {
                        name: 'anggota',
                        data: 'anggota',
                    },
                    {
                        name: 'harga',
                        data: 'harga',
                    },
                    {
                        name: 'deskripsi',
                        data: 'deskripsi',
                    },
                ],
            });
        });
    </script>
@endpush
