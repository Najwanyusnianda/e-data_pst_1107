@extends('layout.master_front_2')


@section('section_header')
<h1>Beranda</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="{{route('home.home').'/'}}">Home</a></div>
  <div class="breadcrumb-item">Beranda</div>
</div>
@endsection

@section('style')
<style>
    ::-webkit-input-placeholder {
    color: peachpuff;
    font-size: 13px;
  }
  ::-moz-placeholder {
    color: peachpuff;
    font-size: 13px;
  }
  :-ms-input-placeholder {
    color: peachpuff;
    font-size: 13px;
  }
  ::placeholder {
    color: peachpuff;
    font-size: 13px;
  }

 #search {
    border-radius: 30px !important;
}
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
    <div class="card">

        <div class="card-body p-0">
          <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators3" data-slide-to="0" class=""></li>
              <li data-target="#carouselExampleIndicators3" data-slide-to="1" class="active"></li>
              <li data-target="#carouselExampleIndicators3" data-slide-to="2" class=""></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item">
              <img class="d-block w-100" src="{{asset('img/slider/img01.jpg')}}" alt="First slide" style="max-height:200px !important;">
              </div>
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('img/slider/img02.jpg')}}" alt="Second slide" style="max-height:200px !important;">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('img/slider/img03.jpg')}}" alt="Third slide" style="max-height:200px !important;">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Pencarian Data</h4>
        </div>
        <div class="card-body">

            <div class="page-search">
                <form class="SeachForm" action="{{route('home.seach_post')}}" method="POST">
                    {{ csrf_field() }}
                  <div class="form-group floating-addon floating-addon-not-append">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">                          
                          <i class="fas fa-search"></i>
                        </div>
                      </div>
                      <input type="text" name="search" id="search" class="form-control form-control-lg pt-4 pb-4"
                      placeholder="isi kata kunci..." >
                      <div class="input-group-append">
                        <button class="btn btn-primary btn-lg"  type="submit">
                          Cari
                        </button>
                      </div>
                    </div>
                  </div>
                </form>

            </div>
        </div>
    </div>

</div>






@endsection