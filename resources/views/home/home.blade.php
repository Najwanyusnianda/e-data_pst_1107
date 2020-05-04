@extends('layout.master_front')


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
          <input type="text" name="search" id="search" class="form-control form-control-lg pt-4 pb-4" placeholder="Masukkan kata kunci..." aria-label="">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit"><i class="fas fa-search fa-2x"></i></button>
          </div>
        </div>
      </div> 
    </div>
  </form>
</div>

<h4 class="section-title">Subject</h4>
<p class="section-lead">This page is just an example for you to create your own page.</p>

<div class="row">

@forelse ($subject as $subj)
<div class="col-md-6  col-6">
  <!--<div class="card">
      <div class="card-header">
      <h4>{{$subj->subject}}</h4>
      <div class="card-header-action">
        <a href="#" class="btn btn-info">
          <i class="fas fa-eye"></i>
          Lihat
        </a>
      </div>
      </div>
      <div class="card-body">
          <p>Lorem </p>
      </div>
      <div class="card-footer bg-whitesmoke ">
        <div class="mr-auto">
          <div class="small text-muted"> Diperbarui : hari ini</div>
        </div>
          
      </div>
  </div>-->

<a class="btn btn-icon" href="{{route('home.subject_detail',['subject_id' => $subj->subject_id])}}">
    <i class="fas fa-circle"></i>
    {{$subj->subject}}
  </a>
</div>
@empty
    
@endforelse

</div>


@endsection