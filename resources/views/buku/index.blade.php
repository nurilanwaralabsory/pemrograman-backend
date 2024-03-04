
@extends('master.app')

@section('navigasi')
<nav class="mt-3" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">
                <i class="fa fa-home"></i> Home
            </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            Buku
        </li>
    </ol>
</nav>
@endsection

@section('konten')
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <section class="row">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header mb-4">
                                    <h3>Data Buku</h3>
                                    <a href="/buku/create">
                                        <button class="btn btn-primary"><i class="fa-solid fa-circle-plus me-1"></i>Tambah Data</button>
                                    </a>
                                    <div class="float-end d-flex gap-1">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <button class="btn btn-success" style="width: 32%"><i class="fa-solid fa-search me-1 align-items-center"></i>Cari</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 30px">#</th>
                                                <th scope="col">Sampul</th>
                                                <th scope="col">Judul Buku</th>
                                                <th scope="col">Penulis</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col" style="width: 40%">Deskripsi</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1
                                            @endphp
                                            @foreach ($buku as $bk)
                                            <tr>
                                                <td scope="row" class="fw-bold">{{ $i++ }}.</td>
                                                <td>
                                                    <div class="avatar avatar-lg">
                                                        <img src="{{ asset('upload') . '/' . $bk->sampul }}" alt="">
                                                    </div>
                                                </td>
                                                <td>{{ $bk->judul }}</td>
                                                <td>{{ $bk->penulis }}</td>
                                                <td>{{ $bk->category->kategori }}</td>
                                                <td>{{ Str::limit($bk->deskripsi, 100, '[...]') }}</td>
                                                <td style="width: 170px">
                                                    <a href="buku/{{ $bk->id }}">
                                                        <button class="btn btn-primary "><i
                                                        class="fa-solid fa-circle-info"></i></button>
                                                    </a>
                                                    <a href="/buku/{{ $bk->id }}/edit">
                                                        <button class="btn btn-warning"><i
                                                        class="fa-solid fa-pen-to-square"></i></button>
                                                    </a>
                                                    <form action="/buku/{{ $bk->id }}" method="POST" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger show_confirm"><i
                                                        class="fa-solid fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </section>
</div>
@endsection

