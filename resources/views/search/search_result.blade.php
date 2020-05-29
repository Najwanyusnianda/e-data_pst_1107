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

<div class="container-fluid">
    <div class="row">
        <div class="col-4">

            <div class="card">
                <div class="card-header">
                    <h4>Sosial & Kependudukan</h4>
                    <div class="card-header-action">
                        <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i
                                class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="collapse" id="mycard-collapse" style="">
                    <div class="card-body">
                       <div class="list-group">
                        <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>2])}}">Geografi</a>
                        <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>6])}}">Iklim</a>
                        <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>7])}}">IPM</a>
                        <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>10])}}">Kemiskinan</a>
                        <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>11])}}">Kesehatan</a>
                        <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>12])}}">Ketenagakerjaan</a>
                        <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>16])}}">Kriminalitas</a>
                        <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>18])}}">Pemerintahan</a>
                        <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>19])}}">Pendidikan</a>
                        <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>20])}}">Kependudukan</a>
                        <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>25])}}">Potensi Desa</a>
                        <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>28])}}">Sosial Budaya</a>
                       </div>
                    </div>
                    <div class="card-footer">
                       
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Ekonomi & Perdagangan</h4>
                    <div class="card-header-action">
                        <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i
                                class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="collapse" id="mycard-collapse" style="">
                    <div class="card-body">
                        <div class="list-group">
                            <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>1])}}">Energi</a>
                            <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>3])}}">Harga Eceran</a>
                            <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>5])}}">Hotel</a>
                            <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>8])}}">Industri</a>
                            <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>9])}}">Inflasi</a>
                            <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>13])}}">Keuangan</a>
                            <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>14])}}">Komunikasi</a>
                            <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>15])}}">Konsumsi & Pengeluaran</a>
                            <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>17])}}">Pariwisata</a>
                            <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>21])}}">Perdagangan</a>
                            <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>26])}}">PDRB (Lapangan Usaha)</a>
                            <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>27])}}">PDRB (Pengeluaran)</a>
                            <a class="list-group-item list-group-item-action" href="{{route('home.subject_detail',['subject_id' =>30])}}">Transportasi</a>
                        </div>
                    </div>
                    <div class="card-footer">
                     
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Pertanian & Kehutanan</h4>
                    <div class="card-header-action">
                        <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i
                                class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="collapse" id="mycard-collapse" style="">
                    <div class="card-body">
                        <div class="list-group">
                            <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>4])}}">Holtikultura</a></li>
                            <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>22])}}">Perikanan</a></li>
                            <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>23])}}">Perkebunan</a></li>
                            <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>24])}}">Peternakani</a></li>
                            <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>29])}}">Tanaman Pangan</a></li>
                        </div>
                    </div>
                    <div class="card-footer">
                        Card Footer
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    dsdsd
                </div>
            </div>
        </div>
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