@extends('layouts.app')
@section('title', 'Arsip Surat Kedungduren')
@section('heading', 'Arsip Surat >> Lihat')
@section('page', 'Lihat Arsip Surat')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            {{-- <li class="breadcrumb-item active">Arsip</li> --}}
                            {{-- <li class="breadcrumb-item active" aria-current="page">Table</li> --}}
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Hoverable rows start -->
        <section class="section">
            <div class="row" id="table-hover-row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content m-4 mb-1">
                            <p class="fw-4">
                                Nomor Surat: {{ $data->nomor_surat }} <br>
                                Kategori: {{ $data->kategori }} <br>
                                Judul: {{ $data->judul_surat }} <br>
                                Waktu Unggah: {{ $data->created_at }}
                            </p>
                        </div>

                        <object data="{{ asset('document') }}/{{ $data->document }}" type="application/pdf" width="100%"
                            height="500px"></object>

                        <div class="d-sm-flex align-item-center justify-content-start mb-3 mt-3">
                            <a href="{{ route('arsipsurat.index') }}" class="btn border-dark m-1">
                                << Kembali</a>
                                    <a href="{{ asset('document') }}/{{ $data->document }}"
                                        download="{{ $data->nomor_surat }}" class="btn border-dark m-1">Undah File</a>
                                    <a href="{{ route('arsipsurat.edit', $data->id) }}" class="btn border-dark m-1">Edit
                                        Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hoverable rows end -->

    </div>
@endsection
