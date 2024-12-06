@extends('layouts.main')

@section('title', 'My Booking List - Sanggar Seni Putra Karuhun')

@section('header-title', 'My Booking List')

@section('breadcrumbs')
    <div class="breadcrumb-item"><a href="#">Transaksi</a></div>
    <div class="breadcrumb-item active">My Booking List</div>
@endsection

@section('section-title', 'My Booking List')

@section('section-lead')
    Berikut ini adalah daftar seluruh booking dari setiap user.
@endsection

@section('content')
    <div class="table-responsive">
        <table class="table table-striped display nowrap w-100" data-scroll-y="400">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Kesenian</th>
                    <th>Tanggal</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Bukti Pembayaran</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($model as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->kesenian->nama }}</td>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            @if (!empty($item->bukti_pembayaran))
                                <div class="gallery gallery-fw">
                                    <a href="{{ asset('storage/' . $item->bukti_pembayaran) }}" data-toggle="lightbox">
                                        <img src="{{ asset('storage/' . $item->bukti_pembayaran) }}" class="img-fluid"
                                            style="min-width: 100px; height: 100px;">
                                    </a>
                                </div>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if ($item->status != 'DISETUJUI' && $item->status != 'DITOLAK')
                                <a href="#" class="btn btn-primary" data-toggle="modal"
                                    data-target="#paymentProofModal" data-id="{{ $item->id }}">Konfirmasi</a>
                            @else
                                <button class="btn btn-secondary" disabled>Sudah Konfirmasi</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

<div class="modal fade" id="paymentProofModal" tabindex="-1" role="dialog" aria-labelledby="paymentProofModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('submit.konfirmasi') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentProofModalLabel">Kirim Bukti Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="item_id" id="item-id">
                    <div class="form-group">
                        <label for="proof">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="">.:Pilih Status:.</option>
                            <option value="DISETUJUI">DISETUJUI</option>
                            <option value="DITOLAK">DITOLAK</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('after-script')
    <script src="//cdn.datatables.net/plug-ins/1.10.22/dataRender/ellipsis.js"></script>

    <script>
        $('#paymentProofModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var itemId = button.data('id');
            var modal = $(this);
            modal.find('.modal-body #item-id').val(itemId);
        });
    </script>
@endpush
