@extends('layout.master_back')



@section('section_header')
    <h1>Update Detail Publikasi</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Input Data</a></div>
      <div class="breadcrumb-item"><a href="#">Publikasi</a></div>
      <div class="breadcrumb-item"><a href="#">Detail Publikasi</a></div>
      <div class="breadcrumb-item"> Update Detail Publikasi</div>

    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Update Detail Publikasi
            </div>
            <div class="card-body">
            <form action="{{route('admin.publikasi.update',[$publikasi->pub_id])}}" method="post">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label>Judul Publikasi</label>
                    <input type="text" class="form-control" value="{{$publikasi->title}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>ISSN</label>
                    <input type="text" class="form-control" value="{{$publikasi->issn ??'tidak diketahui'}}" readonly>


                    <div class="form-group">
                        <label>Jumlah Bab</label>
                    <input type="number" class="form-control" name="n_bab" id="n_bab" value="{{$publikasi->n_bab}}">
                    </div>

                    <button type="submit" class="btn btn-primary"> Update </button>
                </form>
            </div>
        </div>
    </div>
@endsection