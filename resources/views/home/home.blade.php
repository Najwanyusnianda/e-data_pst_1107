@extends('layout.master_landing')


@section('section_header')
<!--<h1>Beranda</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="{{route('home.home').'/'}}">Home</a></div>
  <div class="breadcrumb-item">Beranda</div>
</div>-->
@endsection

@section('style')
<style>



.page-search .btn {
    border-radius: 30px;
    margin-left: 10px;
    border-bottom-left-radius:30px !important;
    border-top-left-radius:30px !important;
}
.input-group-text{height: 50px;}


</style>
@endsection

@section('content')


<div class="container">
  <div class="row">
    <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators3" data-slide-to="0" class=""></li>
        <li data-target="#carouselExampleIndicators3" data-slide-to="1" class="active"></li>
        <li data-target="#carouselExampleIndicators3" data-slide-to="2" class=""></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('img/slider/img01.jpg')}}" alt="First slide" style="max-height:300px !important;">
        </div>
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{asset('img/slider/img02.jpg')}}" alt="Second slide" style="max-height:300px !important;">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('img/slider/img03.jpg')}}" alt="Third slide" style="max-height:300px !important;">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" uhref="#carouselExampleIndicators3" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-12 col-sm-6 col-lg-6">
      <div class="card">
        <div class="card-header">
          <h4>Pencarian  Data</h4>
          <div class="card-header-action">
            <a href="{{route('home.home.data')}}" class="btn btn-primary">Lihat</a>
          </div>
        </div>
        <div class="card-body">
          <div class="mb-2 text-muted">Pencarian Data dalam bentuk tabel tabel statistik berbagai sektor</div>
          <div class="chocolat-parent">
            <a href="{{asset('img/slider/img01.jpg')}}"" class="chocolat-image" title="Just an example">
              <div data-crop-image="285" style="overflow: hidden; position: relative; height: 285px;">
                <img alt="image" src="{{asset('img/slider/img01.jpg')}}" class="img-fluid">
              </div>
            </a>
          </div>
        </div>
      </div>

    </div>
    <div class="col-12 col-sm-6 col-lg-6">
      <div class="card">
        <div class="card-header">
          <h4>Pencarian Publikasi</h4>
          <div class="card-header-action">
          <a href="{{route('home.pub.search_index')}}" class="btn btn-primary">Lihat</a>
          </div>
        </div>
        <div class="card-body">
          <div class="mb-2 text-muted">Pencarian Publikasi - Publikasi yang diterbitkan oleh BPS Aceh Barat </div>
          <div class="chocolat-parent">
            <a href="{{asset('img/slider/img02.jpg')}}" class="chocolat-image" title="Just an example">
              <div data-crop-image="285" style="overflow: hidden; position: relative; height: 285px;">
                <img alt="image" src="{{asset('img/slider/img02.jpg')}}" class="img-fluid">
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




@endsection