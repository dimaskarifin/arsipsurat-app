@extends('layouts.app')
@section('title', 'Unggah Arsip Surat')
@section('heading', 'Unggah Arsip Surat')
@section('page', 'Unggah Arsip Surat')
@section('detailpage', '')
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>Unggah surat yang telah terbit pada form ini untuk diarsipkan.</h4>
                <h4 class="card-title">Catatan :</h4>
                <h5 class="card-title"> - Gunakan File berformat PDF</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('arsipsurat.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror"
                                name="nomor_surat" id="nomor_surat" placeholder="Nomor Surat" required
                                value="{{ old('nomor_surat') }}">
                            @error('nomor_surat')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Kategori Surat</label>
                        <div class="col-sm-4">
                            <select class="form-select @error('kategori') is-invalid @enderror" aria-label="kategori"
                                name="kategori" required>
                                <option selected value="" {{ old('kategori') == '' ? 'selected' : '' }}>Pilih Kategori
                                    Surat
                                </option>
                                <option value="Undangan" {{ old('kategori') == 'Undangan' ? 'selected' : '' }}>Undangan
                                </option>
                                <option value="Pengumuman" {{ old('kategori') == 'Pengumuman' ? 'selected' : '' }}>
                                    Pengumuman</option>
                                <option value="Nota Dinas" {{ old('kategori') == 'Nota Dinas' ? 'selected' : '' }}>Nota
                                    Dinas</option>
                                <option value="Pemberitahuan" {{ old('kategori') == 'Pemberitahuan' ? 'selected' : '' }}>
                                    Pemberitahuan</option>
                            </select>
                            @error('kategori')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Judul
                            Surat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('judul_surat') is-invalid @enderror"
                                name="judul_surat" id="judul_surat" placeholder="Judul Surat" required
                                value="{{ old('judul_surat') }}">
                            @error('judul_surat')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Upload File</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control @error('document') is-invalid @enderror"
                                name="document" id="document" value="{{ old('document') }}" required accept=".pdf">
                            @error('document')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div><br></div>
                    <a href="{{ route('arsipsurat.index') }}" class="btn icon icon-left btn-warning"><i
                            data-feather="info"></i> Kembali</a>
                    <button type="submit" class="btn icon icon-left btn-primary col-sm-2"><i data-feather="edit"></i>
                        Simpan</button>
                </form>
            </div>
        </div>
    </section>
@endsection
