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
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h4>
        {{$subject->subject}} ({{count($data) ?? ''}})
      </h4>
    
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped" id="searchResultTable">
          <thead>
            <tr style="background-color: #6c5ce7;">
              <th style="color: white;">Judul Data</th>
        
            </tr>
          </thead>
          <tbody>
            @forelse ($data as $result)
                <tr>

                  <td>
                    @if ($result->pdf !=null)
                      @foreach ($publikasi as $pub)
                       @if ($pub->pub_id == $result->type_id)
                        <a href="{{asset('storage/'.$result->pdf)}}" class="search-result-text" target="_blank" data-toggle="popover"data-trigger="hover" data-html="true" title="Sumber" data-content="Publikasi {{ $pub->title }} hal. {{ $result->hal_pdf_first }} " data-placement="bottom">{{$result->title}}>{{$result->title}}</a>
                       @else
                       <a href="{{asset('storage/'.$result->pdf)}}" class="search-result-text" target="_blank"  data-toggle="popover"data-trigger="hover" data-html="true" title="Sumber" data-content="tidak ditemukan" data-placement="bottom">{{$result->title}}</a>
                      @endif
                      @endforeach
              
                    @else
                    @foreach ($publikasi as $pub)
                        @if ($pub->pub_id == $result->type_id)
                        <a onclick=dataNotFound(event); href="#"  class="search-result-text" data-toggle="popover"data-trigger="hover" data-html="true" title="Sumber" data-content="Publikasi {{ $pub->title }} hal. {{ $result->hal_pdf_first }} " data-placement="bottom">{{$result->title}}</a>
                         @else
                        <a onclick=dataNotFound(event); href="#"  class="search-result-text" data-toggle="popover"data-trigger="hover" data-html="true" title="Sumber" data-content="tidak ditemukan" data-placement="bottom">{{$result->title}}</a>
                        @endif
                      @endforeach
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
     
    </div>

  </div>
</div>
@endsection

@section('script')
<script src="{{asset('vendor/sweetalert2.js')}}"></script>
<script>
    function dataNotFound(e){
        e.preventDefault();
        swal.fire({
                text: "Data Tidak Ditemukan!",
        });
    }
    $('[data-toggle="popover"]').popover(
    {
        trigger: "hover",
        html:true,
    } 
  )

    $('#searchResultTable').DataTable({
      "searching":false,
      "lengthChange": false,
  });
</script>
@endsection