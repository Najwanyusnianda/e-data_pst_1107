@extends('layout.master_front_2')



@section('section_header')
<h1>{{$subject->subject}}</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Home</a></div>
  <div class="breadcrumb-item active"><a href="#">Subject</a></div>
<div class="breadcrumb-item">{{$subject->subject}}</div>
</div>
@endsection

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-condensed">
          <thead>
            <tr>
              <th width="70%"> Judul</th>
              <th> Aksi</th>
              
            </tr>
          </thead>
          <tbody>
            @forelse ($data as $search_result)
                <tr>
                  <td>
                    <h6>
                      {{$search_result->title}}
                    </h6>
                  </td>
                  <td>
                    <a href="#" class="btn btn-icon btn-info"><i class="fa fa-eye mr-3"></i>Lihat</a>
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