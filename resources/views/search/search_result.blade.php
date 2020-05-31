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

    .search-result-text {
        color: #6c5ce7;
        text-decoration: none !important;
    }

    .search-result-text:hover {
        text-decoration: none !important;
        font-weight: bold;
    }

    #searchResultTable{
        font-size: 13px;
    }

    @media only screen and (min-device-width : 320px) and (max-device-width : 480px) {

        /* STYLES GO HERE */
        .main-content {
            padding-left: 0px;
            padding-right: 0px;
        }



    }

    @media screen and (max-width: 600px) {
 

        #searchResultTable  {
            max-width: 100% !important;
    min-width: 100px !important;
        }
        #searchResultTable td  {
            font-size:12px;

        }
        #searchResultTable td small  {
            line-height: 10px; !important;
            
        }
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

<div class="card">
    <div class="card-header" >
        Hasil Pencarian

        <div class="card-header-action">
           {{ $search_result->links()}}
        </div>
    </div>
    <div class="card-body">

        @if (count($search_result)>0)
        <table class="table table-bordered" id="searchResultTable">
            <thead>
                <tr>
                    <th>Judul</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($search_result as $result)
                @if ($result->type =='publikasi')
                   <tr>
                       <td>
                           @if ($result->pdf != null)
                                    <a href="{{asset('storage/'.$result->pdf)}}" class="search-result-text" target="_blank">{{$result->title}}</a>
                           @else
                                    <span >{{$result->title}}</span>
                           @endif
                     
                       </td>
                    </tr> 
                @else
                    
                @endif
        
                @empty
            
                @endforelse
            </tbody>


        </table>
        @endif


    </div>
</div>

@endsection


@section('script')
@if ($search_result->isNotEmpty())
<!--<script>
        
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
         

    
    
          

        ]
    })
    })
</script>-->
@endif

@endsection