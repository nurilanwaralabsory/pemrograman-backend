
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
            Kategori
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
                                <div class="card-header">
                                    <h3>Data Kategori</h3>
                                    <a href="/kategori/create">
                                        <button class="btn btn-success"><i class="fa-solid fa-circle-plus me-1"></i>Tambah Data</button>
                                    </a>
                                    <div class="float-end d-flex gap-1">
                                    <form action="/kategori">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search..." name="search">
                                            <button type="submit" class="btn btn-success" style="width: 32%"><i class="fa-solid fa-search me-1 align-items-center"></i>Cari</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 30px">#</th>
                                                <th scope="col">Nama Kategori</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                            <tr>
                                                <td scope="row" class="fw-bold">{{ ++$no }}.</td>
                                                <td>{{ $category->kategori }}</td>
                                                <td style="width: 160px">
                                                    <a href="/kategori/{{ $category->id }}">
                                                        <button class="btn btn-primary "><i
                                                        class="fa-solid fa-circle-info"></i></button>
                                                    </a>
                                                    <a href="/kategori/{{ $category->id }}/edit">
                                                        <button class="btn btn-warning"><i
                                                        class="fa-solid fa-pen-to-square"></i></button>
                                                    </a>
                                                    <form action="/kategori/{{ $category->id }}" method="POST" class="d-inline">
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
                                    <div class="float-end">
                                        <p>{{ $categories->withQueryString()->links() }}</p>
                                    </div>
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

