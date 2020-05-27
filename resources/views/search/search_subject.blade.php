@extends('layout.master_front_2')



@section('section_header')
<h1>Pencarian Subject</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="{{route('home.home').'/'}}">Home</a></div>
  <div class="breadcrumb-item active"><a href="{{route('home.home').'/'}}">Subject</a></div>
<div class="breadcrumb-item">{{$subject->subject}}</div>
</div>
@endsection

@section('style')
    <style>
        .search-result-text{
      color: #6c5ce7;
      text-decoration: none !important;
  }
  .search-result-text:hover{
    text-decoration: none !important;
      font-weight: bold;
  }
    </style>
@endsection
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      <h4>
        {{$subject->subject}} ({{count($data)}})
      </h4>
    
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-condensed">
          <thead>
            <tr style="background-color: #6c5ce7;">
              <th style="color: white;">Judul Tabel</th>
              <th style="color: white;">Aksi</th>
              
            </tr>
          </thead>
          <tbody>
            @forelse ($data as $search_result)
                <tr>
                  <td>  
                      <a href="#" class="search-result-text">{{$search_result->title}}</a>
                  </td>
                  <td>
                    @if (!empty($search_result->filepath))
                    <a href="#" class="btn btn-icon icon-left btn-info"><i class="fas fa-table"></i>lihat </a>
                    @else
                    <span class="badge badge-warning"><small>tidak tersedia</small>  </span>
                    @endif
                 
                  </td>
                 
                </tr>
            @empty
                
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer">
      {{$data->links()}}
    </div>

  </div>
</div>
@endsection