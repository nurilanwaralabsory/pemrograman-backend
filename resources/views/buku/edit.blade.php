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
        <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
    </ol>
</nav>
@endsection
@section('konten')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 order-md-1 order-last">
                <div class="float-end">
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form action="/buku/{{ $buku->id }}" method="post" enctype="multipart/form-data">
                                    @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicInput">Judul Buku</label>
                                            <input type="text" name="judul" autofocus
                                                class="form-control @error('buku') is-invalid @enderror"
                                                id="basicInput" value="{{ @old('buku') ? @old('buku') : $buku->judul }}">
                                            @error('buku')
                                            <p class="text-danger mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicInput">Penulis</label>
                                            <input type="text" name="penulis" autofocus
                                                class="form-control @error('penulis') is-invalid @enderror"
                                                id="basicInput" value="{{ @old('penulis') ? @old('penulis') : $buku->penulis }}">
                                            @error('penulis')
                                            <p class="text-danger mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicInput">Kategori</label>
                                            <select class="form-select" aria-label="Default select example" name="kategori">
                                                <option hidden></option>
                                                @foreach ($kategori as $item)
                                                <option value="{{ $item->id }}" @selected($item->id == $buku->id)>{{ $item->kategori }}</option>
                                                @endforeach
                                              </select>
                                            @error('kategori')
                                            <p class="text-danger mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="d-flex flex-column">
                                                <label for="formFile" class="form-label">Sampul Buku 
                                                    @if ($buku->sampul)
                                                        <small class="text-danger">Kosongkan jika ada gambar</small>
                                                    @endif
                                                </label>
                                            <img src="{{ asset('upload') . '/' . $buku->sampul }}" class="img-fluid w-25" alt="">
                                            </div>
                                            <input class="form-control @error('sampul') is-invalid @enderror" type="file" id="formFile" name="sampul">
                                            @error('sampul')
                                            <p class="text-danger mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 200px" name="deskripsi">{{ @old('deskripsi') ? @old('deskripsi') : $buku->deskripsi }}</textarea>
                                          </div>
                                    </div>
                                </div>
                                    <button type="submit" class="btn btn-primary mt-3">
                                        <i class="fa fa-save"></i> Simpan
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