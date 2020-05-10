@extends('layout.master_front_2')


@section('section_header')
<h1>Beranda</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Home</a></div>
  <div class="breadcrumb-item">Beranda</div>
</div>
@endsection

@section('content')

<h2 class="section-title">Pencarian Data</h2>
<p class="section-lead">Pencarian Data melalui kata kunci</p>
<div class="container">
    <form class="SeachForm" action="{{route('home.seach_post')}}" method="POST">
        {{ csrf_field() }}
        <div class="search-element">
            <div class="form-group">
                <div class="input-group mb-3 ">
                    <input type="text" name="search" id="search" class="form-control form-control-lg pt-4 pb-4"
                        placeholder="Masukkan kata kunci..." aria-label="">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search fa-2x"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>






@endsection