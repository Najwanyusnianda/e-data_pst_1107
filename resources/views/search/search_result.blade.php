@extends('layout.master_front_2')


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
@section('section_header')

<h1>Pencarian</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Home</a></div>
<div class="breadcrumb-item">Pencarian</div>
</div>

@endsection

@section('content')
<div class="col-12">
    <div class="row">
        <div class="container">
            <div class="card">
                <div class="card-body" style="
                padding-bottom: 0px">
                    <form class="SeachForm" action="{{route('home.seach_post')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="search-element">
                            <div class="form-group">
                                <div class="input-group mb-3 ">
                                    <input type="text" name="search" id="search" class="form-control form-control-lg pt-4 pb-4"
                                placeholder="isi kata kunci..." aria-label="" value="{{$keyword}}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="fas fa-search fa-2x"></i>&nbsp; &nbsp; &nbsp;  Cari</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if ($search_result->isNotEmpty())
        
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Hasil pencarian ({{$search_count}})</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-condensed" id="searchResultTable">
                        <thead>
                            <tr style="background-color: #6c5ce7;">
                               
                                <th style="color: white;">Judul Tabel</th>
                                <th style="color: white;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@else
    <h1>tidak ketemu</h1>
@endif
</div>


@endsection


@section('script')
@if ($search_result->isNotEmpty())
<script>
        
    $(document).ready(function(){
        var seach_url="{{route('home.seach_result.table',['keyword'=>':key_word'])}}";
        var keyword="{{$keyword}}"
        seach_url=seach_url.replace(':key_word', keyword);
        console.log(seach_url);

        $('#searchResultTable').DataTable({
        responsive:true,
        processing:true,
        serverSide:true,
        searching:false,
        lengthChange: false,
        ajax:seach_url,
        columns:[
            //{data: 'DT_RowIndex', name: 'DT_Row_Index' , orderable: false, searchable: false},
            {data:'judul'},
            {data:'action'}

    
    
          

        ]
    })
    })
</script>
@endif

@endsection