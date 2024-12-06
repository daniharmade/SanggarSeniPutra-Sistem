@extends('layouts.main')

@section('title')
    @if (isset($item))
        Edit Data Kesenian
    @else
        Tambah Data Kesenian
    @endif
@endsection

@section('header-title')
    @if (isset($item))
        Edit Data Kesenian
    @else
        Tambah Data Kesenian
    @endif
@endsection

@section('breadcrumbs')
    <div class="breadcrumb-item"><a href="#">Kesenian</a></div>
    <div class="breadcrumb-item"><a href="{{ route('kesenian.index') }}">Data Kesenian</a></div>
    <div class="breadcrumb-item @if (isset($item)) '' @else 'active' @endif">
        @if (isset($item))
            <a href="#">Edit Data Kesenian</a>
        @else
            Tambah Data Kesenian
        @endif
    </div>
    @isset($item)
        <div class="breadcrumb-item active">{{ $item->nama }}</div>
    @endisset
@endsection

@section('section-title')
    @if (isset($item))
        Edit Data Kesenian
    @else
        Tambah Data Kesenian
    @endif
@endsection

@section('section-lead')
    Silakan isi form di bawah ini untuk @if (isset($item))
        mengedit data {{ $item->name }}
    @else
        menambah data Kesenian.
    @endif
@endsection

@section('content')

    @component('components.form')
        @slot('row_class', 'justify-content-center')
        @slot('col_class', 'col-12 col-md-6')

        @if (isset($item))
            @slot('form_method', 'POST')
            @slot('method', 'PUT')
            @slot('form_action', 'kesenian.update')
            @slot('update_id', $item->id)
        @else
            @slot('form_method', 'POST')
            @slot('form_action', 'kesenian.store')
        @endif

        @slot('is_form_with_file', 'false') <!-- No file upload -->

        @slot('input_form')

            @component('components.input-field')
                @slot('input_label', 'Nama')
                @slot('input_type', 'text')
                @slot('input_name', 'nama')
                @isset($item->nama)
                    @slot('input_value')
                        {{ $item->nama }}
                    @endslot
                @endisset
                @isset($item)
                    @slot('other_attributes', 'disabled')
                @endisset
                @empty($item)
                    @slot('form_group_class', 'required')
                    @slot('other_attributes', 'required autofocus')
                @endempty
            @endcomponent

            @component('components.input-field')
                @slot('input_label', 'Paket Sewa')
                @slot('input_type', 'textarea')
                @slot('input_name', 'paket')
                @isset($item->paket)
                    @slot('input_value')
                        {{ $item->paket }}
                    @endslot
                @endisset
                @isset($item)
                    @slot('other_attributes', 'autofocus')
                @endisset
            @endcomponent

            @component('components.input-field')
                @slot('input_label', 'Harga')
                @slot('input_type', 'number')
                @slot('input_name', 'harga')
                @isset($item->harga)
                    @slot('input_value')
                        {{ $item->harga }}
                    @endslot
                @endisset
            @endcomponent

            @component('components.input-field')
                @slot('input_label', 'Anggota')
                @slot('input_type', 'text')
                @slot('input_name', 'anggota')
                @isset($item->anggota)
                    @slot('input_value')
                        {{ $item->anggota }}
                    @endslot
                @endisset
                @isset($item)
                    @slot('other_attributes', 'autofocus')
                @endisset
            @endcomponent

            @component('components.input-field')
                @slot('input_label', 'Deskripsi')
                @slot('input_type', 'textarea')
                @slot('input_name', 'deskripsi')
                @isset($item->deskripsi)
                    @slot('input_value')
                        {{ $item->deskripsi }}
                    @endslot
                @endisset
                @isset($item)
                    @slot('other_attributes', 'autofocus')
                @endisset
            @endcomponent

        @endslot

        @slot('card_footer', 'true')
        @slot('card_footer_class', 'text-right')
        @slot('card_footer_content')
            @include('includes.save-cancel-btn')
        @endslot
    @endcomponent

@endsection
