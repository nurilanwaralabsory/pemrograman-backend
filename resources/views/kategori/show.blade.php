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
        <li class="breadcrumb-item active" aria-current="page">
            Detail
        </li>
    </ol>
</nav>
@endsection

@section('konten')
    <h1>{{ $category->kategori }}</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio culpa unde odit quas facere, aut nulla? Quasi veniam, rerum ut iusto temporibus quisquam voluptatem! Tempore, aperiam non. Aliquid ipsam deleniti cum vitae praesentium necessitatibus in. Sapiente pariatur possimus molestiae quasi. Quaerat animi molestiae ab fugit non culpa libero dolorum unde odit, rerum consequatur nemo, nobis nesciunt officia! Non totam omnis temporibus dolore soluta voluptas impedit itaque vitae expedita nobis, sit minima odit alias est hic similique beatae amet veniam et corporis. Amet sunt accusantium voluptatem ullam quisquam quae aliquid ipsa a voluptate! Soluta ipsa facilis aliquid voluptatem, nemo animi reprehenderit.
        <br><br>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, mollitia fugit! Et consequatur quibusdam illum quam fugiat quod excepturi id. Magnam quos pariatur, repellendus cum iste ullam error assumenda itaque distinctio! Deleniti sunt, quisquam itaque temporibus ab, eveniet fugit, repellat amet sapiente doloremque placeat? Repellat corrupti alias saepe, deserunt rem adipisci quidem soluta, tempore totam ipsa eos culpa maxime veritatis perspiciatis sequi voluptatem iure neque in facilis blanditiis quam praesentium!
    </p>
@endsection