@extends('layout.master_front_2')

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
            <form class="SeachForm" action="{{route('home.seach_post')}}" method="POST">
                {{ csrf_field() }}
                <div class="search-element">
                    <div class="form-group">
                        <div class="input-group mb-3 ">
                            <input type="text" name="search" id="search" class="form-control form-control-lg pt-4 pb-4"
                                placeholder="Masukkan kata kunci..." aria-label="">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-search fa-2x"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if ($search_result->isNotEmpty())
        
    <div class="container">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-condensed" id="searchResultTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Judul</th>
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
        ajax:seach_url,
        columns:[
            {data: 'DT_RowIndex', name: 'DT_Row_Index' , orderable: false, searchable: false},
            {data:'title'},

    
    
          

        ]
    })
    })
</script>
@endif

@endsection