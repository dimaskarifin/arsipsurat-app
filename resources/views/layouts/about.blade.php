@extends('layouts.app')
@section('title', 'About')
@section('heading', 'About Me')
@section('page', 'About')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row gallery" data-bs-toggle="modal" data-bs-target="#galleryModal">
                            <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                                <a href="#">
                                    <img class="w-100 active" src="{{ asset('assets/avatar/avatar.jpg') }}"
                                        data-bs-slide-to="0">
                                </a>
                            </div>
                            <div class="col-6 col-sm-6 ">
                                <h3>
                                    Aplikasi Ini dibuat oleh :
                                </h3>
                                <h3>NAMA : Dimas Khulil Arifin </h3>
                                <h3>NIM : 1931730051 </h3>
                                <h3>TGL : 10 Oktober 2022</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
