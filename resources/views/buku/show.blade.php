@extends('master.app')
@section('navigasi')
<nav class="mt-3" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">
                <i class="fa fa-home"></i> Home
            </a>
        </li>
        <li class="breadcrumb-item" aria-current="page">
            <a href="/buku">Buku</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Detail Buku : {{ $buku->judul }}</li>
    </ol>
</nav>
@endsection

@section('konten')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 order-md-1 order-last">
                <div class="float-end">
                    <a href="/buku">
                        <button class="btn btn-warning">
                            <i class="fa fa-arrow-circle-left"></i> Kembali
                        </button>
                    </a>
                </div>
                <h3>Detail Buku</h3>
            </div>
        </div>
    </div>
    <div class="page-content mt-4">
        <section class="section">
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ asset('upload') . '/' . $buku->sampul }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-md-9">
                                            <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <tr>
                                                            <th class="pt-0">Judul</th>
                                                            <td class="pt-0">{{ $buku->judul }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Penulis</th>
                                                            <td>{{ $buku->penulis }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Kategori</th>
                                                            <td>{{ $buku->category->kategori }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tanggal</th>
                                                            <td>{{ $buku->created_at->isoFormat('dddd, D MMMM Y') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Deskripsi</th>
                                                            <td>{{ $buku->deskripsi }}</td>
                                                        </tr>
                                                </table>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection