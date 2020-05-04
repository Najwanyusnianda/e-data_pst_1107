@extends('layout.master_front')

@section('section_header')
@if ($search_result->isNotEmpty())
<h1>Pencarian</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Home</a></div>
<div class="breadcrumb-item">Pencarian</div>
</div>
@else
    
@endif
@endsection

@section('content')
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
        <h1>nothing to show you</h1>
    @endif

@endsection


@section('script')
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
@endsection