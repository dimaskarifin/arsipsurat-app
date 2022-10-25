@extends('layouts.app')
@section('title', 'Arsip Surat Kedungduren')
@section('heading', 'Arsip Surat Kedungduren')
@section('page', 'Arsip Surat')
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>Berikut ini adalah surat - surat yang telah terbit dan diarsipkan.</h4>
                <h4>Klik "Lihat" pada kolom aksi untuk menampilkan surat.</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Waktu Arsip</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $ndata)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $ndata->nomor_surat }}</td>
                                <td>{{ $ndata->kategori }}</td>
                                <td>{{ $ndata->judul_surat }}</td>
                                <td>{{ $ndata->created_at }}</td>
                                <td><a href="{{ route('arsipsurat.destroy', $ndata->id) }}"
                                        class="btn icon icon-left btn-danger"
                                        onclick="return confirm('Apakah Kamu yakin ?')"><i data-feather="trash"></i>
                                        Hapus Data</a></td>
                                <td><a href="{{ asset('document') }}/{{ $ndata->document }}"
                                        class="btn icon icon-left btn-info" download="{{ $ndata->nomor_surat }}"><i
                                            data-feather="download"></i>
                                        Download</a></td>
                                <td><a href="{{ route('arsipsurat.show', $ndata->id) }}"
                                        class="btn icon icon-left btn-primary"><i data-feather="book"></i>
                                        Lihat Arsip</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('arsipsurat.create') }}" class="btn btn-primary btn-l" role="button">Arsipkan Surat</a>
            </div>
        </div>

    </section>
@endsection
