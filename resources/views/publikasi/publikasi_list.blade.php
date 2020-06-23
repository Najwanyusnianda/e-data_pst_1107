@extends('layout.master_back')

@section('style')
    <style>

.table td, .table th {
            vertical-align: middle !important;
            
        }
    </style>
@endsection

@section('section_header')

    <h1>Publikasi</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Input Data</a></div>
      <div class="breadcrumb-item">Publikasi</div>
    </div>
@endsection

@section('content')

    <div class="container-fluid">


        @if (session('pub_add_success'))

            <div class="alert alert-success">
             {{ session('pub_add_success') }}
            </div>
        @endif
 
        @if (session('import_algolia'))

        <div class="alert alert-success">
         {{ session('import_algolia') }}
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <!--<button class="btn btn-primary  ml-auto btn-icon " id="updatePublicationList">
                    <i class="fas fa-sync"></i>
                    Load data
                </button>-->
                <a class="btn btn-info btn-icon " id="updateImport" href="{{route('algolia.import')}}" >
                    <i class="fas fa-file-import"></i>
                    Indexing daftar tabel 
                </a>
                <a class="btn btn-primary ml-auto btn-icon " id="getPublicationFromApi" href="{{route('admin.pubApi.list')}}" >
                    <i class="fas fa-search-plus"></i>
                    Tambah Publikasi 
                </a>

            </div>
    

     
            <div class="card-body table-responsive">
                <table class="table table-condensed" id="daftar_publikasi">
                    <thead>
                       <tr>
                        <th width="5%">No</th>
                        <th width="10%">Cover</th>
                        <th width="30%">Judul</th>
                        <th width="30%">Progress</th>
                        <th width="25%">Action</th>
                       
                      
                        
                       </tr>
    
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('modals')
    <!-- loading modal-->
<div class="modal fade loadingModal" tabindex="-1" role="dialog" id="loadingModal">
    <div class="modal-dialog modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">

            </div>
            <div class="modal-body">
                @include('misc.loadingBootstrap')
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<!--modal script-->
<script>
    var $loading = $('#loadingModal')

</script>


<!--main script-->
<script>
    var $loading = $('#loadingModal').modal('hide');
    var updateButton= $('#updatePublicationList');
    var listPubData;

    
    updateButton.click(function(e){
        e.preventDefault();
     
        console.log('test');
        var url="{{route('admin.pubCollection.store')}}";
        var data_pub_url='https://webapi.bps.go.id/v1/api/list/?model=publication&domain=1107&year=2020&key=9728004fed484ca5b90eb484730032ea';
        //var data_pub_detail="https://webapi.bps.go.id/v1/view/1107/publication/ind/befa1d8befa185c2ea101b75/9728004fed484ca5b90eb484730032ea";
        $.getJSON(data_pub_url,function(collection){  
        }).done(function(collection){
            listPubData=collection.data;
            listPubData=listPubData[1]; 

            
            $.ajax({
                type: "post",

                url: url,
                data: {
                    // change data to this object
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    pubCollection: listPubData

                },
                success: function (result) {
                    //console.log(result);
                    console.log('success');
                    //permintaanTable.ajax.reload();
                    $('#daftar_publikasi').DataTable().ajax.reload();
                    //$("#close").trigger("click");
                },
                error: function (error) {
                    alert('error');
                    console.log(error);
                }

            });
        })
    })

    $('.container-fluid').on('click','.deletePub',function(e){
        e.preventDefault();
        var pubId=$(this).attr('data-id');
        var deleteUrl=$(this).attr('href');
        Swal.fire({
            title: 'Hapus Publikasi?',
            text: "Semua tabel terkait akan ikut terhapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.value) {
        $.ajax({
                type: "post",

                url: deleteUrl,
                data: {
                    // change data to this object
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    pub_id: pubId

                },
                success: function (result) {
                    //console.log(result);
                    Swal.fire(
                    'Terhapus!',
                    'Publikasi Berhasil dihapus.',
                    'success'
                    )
                    //permintaanTable.ajax.reload();
                    $('#daftar_publikasi').DataTable().ajax.reload();
                    //$("#close").trigger("click");
                },
                error: function (error) {
                    alert('error');
                    console.log(error);
                }

        });

            }
        })
       


    })


    $('#daftar_publikasi').DataTable({
            responsive:true,
            processing:true,
            serverSide:true,
            ajax:"{{route('admin.pubCollection.table')}}",
            columns:[
                {data: 'DT_RowIndex', name: 'DT_Row_Index' , orderable: false, searchable: false},
                {data:'cover_image'},
                {data:'title'},
                {data:'table_progress'},
                {data:'action'}
        
        
              

            ]
        })



</script>
@endsection