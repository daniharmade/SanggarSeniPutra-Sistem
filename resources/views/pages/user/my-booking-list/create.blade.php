@extends('layouts.main')

@section('title')
  Buat Booking - Sanggar Seni Putra Karuhun
@endsection 

@section('header-title')
  Buat Booking
@endsection 
    
@section('breadcrumbs')
  <div class="breadcrumb-item"><a href="#">Transaksi</a></div>
  <div class="breadcrumb-item"><a href="{{ route('my-booking-list.index') }}">My Booking</a></div>
  <div class="breadcrumb-item active">
    Buat Booking
  </div>
@endsection

@section('section-title')
  Buat Booking
@endsection 
    
@section('section-lead')
  Silakan isi form di bawah ini untuk membuat booking.
@endsection

@section('content')

  @component('components.form')
    @slot('row_class', 'justify-content-center')
    @slot('col_class', 'col-12 col-md-6')
    
    @slot('form_method', 'POST')
    @slot('form_action', 'my-booking-list.store')

    @slot('input_form')

      @component('components.input-field')
          @slot('input_label', 'Nama Kesenian')
          @slot('input_type', 'select')
          @slot('select_content')
            <option value="">Pilih Kesenian</option>
            @foreach ($kesenians as $kesenian)
            <option value="{{ $kesenian->id }}"
                {{ old('kesenian_id') == $kesenian->id ? 'selected' : '' }}>
                {{ $kesenian->nama }} - Rp. {{ number_format($kesenian->harga) }} ( {{ $kesenian->anggota }} ) </option>
            @endforeach
          @endslot
          @slot('input_name', 'kesenian_id')
          @slot('form_group_class', 'required')
          @slot('other_attributes', 'required autofocus')
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Tanggal Booking')
          @slot('input_type', 'text')
          @slot('input_name', 'date')
          @slot('input_classes', 'form-control datepicker ' . ($errors->has('date') ? 'is-invalid' : ''))
          @slot('form_group_class', 'required')
          @slot('other_attributes', 'required')
          <div class="invalid-feedback">
              @error('date') {{ $message }} @else {{ 'Tanggal booking harus diisi.' }} @enderror
          </div>
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Alamat')
          @slot('input_type', 'text')
          @slot('input_name', 'purpose')
          @slot('form_group_class', 'required')
          @slot('other_attributes', 'required')
          <div class="invalid-feedback">
              @error('purpose') {{ $message }} @else {{ 'Alamat harus diisi.' }} @enderror
          </div>
      @endcomponent

    @endslot

    @slot('card_footer', 'true')
    @slot('card_footer_class', 'text-right')
    @slot('card_footer_content')
      @include('includes.save-cancel-btn')
    @endslot 

  @endcomponent

@endsection

@push('after-style')
  {{-- Datepicker --}}
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@push('after-script')
  {{-- Datepicker --}}
  <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script>
    $(function() {
        $('.datepicker').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minDate: moment().add(2, 'days'), // Minimum date 2 days from today
            locale: {
                format: 'YYYY-MM-DD',
                cancelLabel: 'Clear',
                daysOfWeek: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
                monthNames: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
            }
        });
    });
  </script>
@endpush

@include('includes.notification')
