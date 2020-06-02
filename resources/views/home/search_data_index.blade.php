@extends('layout.master_search')


@section('content')
<div class="container">
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

</div>
@endsection