@extends('layouts.main')

@section('title', 'Shortest Job First (SJF) Scheduling - Sanggar Seni Putra Karuhun')

@section('header-title', 'Shortest Job First (SJF) Scheduling')
    
@section('breadcrumbs')
  <div class="breadcrumb-item"><a href="#">Transaksi</a></div>
  <div class="breadcrumb-item active">Shortest Job First (SJF) Scheduling</div>
@endsection

@section('section-title', 'Shortest Job First (SJF) Scheduling')
    
@section('section-lead')
Berikut ini adalah daftar seluruh Shortest Job First (SJF) Scheduling. 
@endsection

@section('content')
<div class="table-responsive">
<table class="table table-striped display nowrap w-100" data-scroll-y="400">
  <thead>
    <tr>
        <th>No</th>
        <th>Nama Jasa</th>
        <th>Waktu Kedatangan</th>
        <th>Lama Eksekusi</th>
        <th>Mulai Eksekusi</th>
        <th>Selesai Eksekusi</th>
        <th>Turn Around</th>
    </tr>
  </thead>
  <tbody>
    @php
        $no = 1;
    @endphp
    @foreach ($jobs as $item)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $item->barangkesenian->nama }}</td>
        <td>{{ $item->waktu_kedatangan }}</td>
        <td>{{ $item->lama_eksekusi }}</td>
        <td>{{ $item->mulai_eksekusi }}</td>
        <td>{{ $item->selesai_eksekusi }}</td>
        <td>{{ $item->turn_around }}</td>
    </tr>
@endforeach

  </tbody>
</table>
</div>

@endsection


@push('after-script')
<script src="//cdn.datatables.net/plug-ins/1.10.22/dataRender/ellipsis.js"></script>

<script>
  $('#paymentProofModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var itemId = button.data('id');
        var modal = $(this);
        modal.find('.modal-body #item-id').val(itemId);
    });
</script>


@endpush
