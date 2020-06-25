@extends('layout.master_search')

@section('section_header')

<h1>Pencarian Data</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Home</a></div>
<div class="breadcrumb-item">Pencarian Data</div>
</div>

@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4>Pencarian Data</h4>
        </div>
        <div class="card-body">

            <div class="page-search">
                <form class="SeachForm" action="{{route('home.seach_post_new')}}" method="get">
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
<div class="row">
  <div class="col">
    <div class="card">
        <div class="card-header">
            <h4>Sosial & Kependudukan</h4>
            <div class="card-header-action">
                <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i
                        class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="collapse" id="mycard-collapse" style="">
            <div class="card-body">
               <div class="list-group">
                <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>2])}}">Geografi</a>
                <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>6])}}">Iklim</a>
                <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>7])}}">IPM</a>
                <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>10])}}">Kemiskinan</a>
                <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>11])}}">Kesehatan</a>
                <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>12])}}">Ketenagakerjaan</a>
                <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>16])}}">Kriminalitas</a>
                <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>18])}}">Pemerintahan</a>
                <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>19])}}">Pendidikan</a>
                <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>20])}}">Kependudukan</a>
                <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>25])}}">Potensi Desa</a>
                <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>28])}}">Sosial Budaya</a>
               </div>
            </div>
            <div class="card-footer">
               
            </div>
        </div>
    </div>
</div>
<div class="col">
    <div class="card">
        <div class="card-header">
            <h4>Ekonomi & Perdagangan</h4>
            <div class="card-header-action">
                <a data-collapse="#ekonomi" class="btn btn-icon btn-info" href="#"><i
                        class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="collapse" id="ekonomi" style="">
            <div class="card-body">
                <div class="list-group">
                    <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>1])}}">Energi</a>
                    <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>3])}}">Harga Eceran</a>
                    <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>5])}}">Hotel</a>
                    <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>8])}}">Industri</a>
                    <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>9])}}">Inflasi</a>
                    <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>13])}}">Keuangan</a>
                    <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>14])}}">Komunikasi</a>
                    <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>15])}}">Konsumsi & Pengeluaran</a>
                    <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>17])}}">Pariwisata</a>
                    <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>21])}}">Perdagangan</a>
                    <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>26])}}">PDRB (Lapangan Usaha)</a>
                    <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>27])}}">PDRB (Pengeluaran)</a>
                    <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>30])}}">Transportasi</a>
                </div>
            </div>
            <div class="card-footer">
             
            </div>
        </div>
    </div>
</div>
<div class="col">
    <div class="card">
        <div class="card-header">
            <h4>Pertanian & Kehutanan</h4>
            <div class="card-header-action">
                <a data-collapse="#pertanian" class="btn btn-icon btn-info" href="#"><i
                        class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="collapse" id="pertanian" style="">
            <div class="card-body">
                <div class="list-group">
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>4])}}">Holtikultura</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>22])}}">Perikanan</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>23])}}">Perkebunan</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>24])}}">Peternakani</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>29])}}">Tanaman Pangan</a></li>
                </div>
            </div>
            <div class="card-footer">
                
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection