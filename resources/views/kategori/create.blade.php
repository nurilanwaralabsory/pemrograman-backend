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
            <a href="/kategori">Kategori</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Kategori</li>
    </ol>
</nav>
@endsection
@section('konten')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-7 order-md-1 order-last">
                <div style="float: right">
                    <a href="/kategori">
                        <button class="btn btn-warning mt-2">
                            <i class="fa fa-arrow-circle-left"></i> Kembali
                        </button>
                    </a>
                </div>
                <h3>Tambah Data</h3>
            </div>
        </div>
    </div>
    <div class="page-content mt-4">
        <section class="section">
            <div class="row" id="basic-table">
                <div class="col-12 col-md-7">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form action="/kategori" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="basicInput">Nama kategori</label>
                                        <input type="text" name="kategori" autofocus
                                            class="form-control @error('kategori') is-invalid @enderror"
                                            id="basicInput" placeholder="Masukkan nama kategori" value="{{ @old('kategori') }}">
                                        @error('kategori')
                                        <p class="text-danger mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">
                                        <i class="fa fa-save"></i> Tambah Kategori
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection