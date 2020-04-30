@extends('layout.master_front')

@section('content')

<h2 class="section-title">Pencarian Data</h2>
<p class="section-lead">Pencarian Data melalui kata kunci</p>
<div class="container">
  <form class="#">
    <div class="search-element pl-5 pr-5">
      <div class="form-group">
        <div class="input-group mb-3 ">
          <input type="text" class="form-control form-control-lg" placeholder="Masukkan kata kunci..." aria-label="">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button"><i class="fas fa-search fa-2x"></i></button>
          </div>
        </div>
      </div> 
    </div>
  </form>
</div>

<h4 class="section-title">Subject</h4>
<p class="section-lead">This page is just an example for you to create your own page.</p>

<div class="row">
  @for ($i = 0; $i < 12; $i++)
  <div class="col-md-4">
    <div class="card">
        <div class="card-header">
        <h4>Subject {{$i+1}}</h4>
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
    </div>
</div>
@endfor

</div>


@endsection