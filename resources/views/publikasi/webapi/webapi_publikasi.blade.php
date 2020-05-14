@extends('layout.master_back')

@section('section_header')
    <h1>Pilih Publikasi</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Input Data</a></div>
      <div class="breadcrumb-item"><a href="#">Publikasi</a></div>
      <div class="breadcrumb-item">Pilih Publikasi</div>
    </div>
@endsection

@section('content')
<h2 class="section-title">Daftar Publikasi WebAPI</h2>
<p class="section-lead">Pilih Publikasi untuk ditambahkan ke dalam sistem</p>
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="mr-auto">
          
                <form action="{{route('admin.pubApi.list.post')}}" method="POST">
                    {{ csrf_field() }}
                    <select class="form-control" id="year_select" name="year" onchange="this.form.submit()">
               
                        @foreach ($year_select as $select)
                            <option value="{{$select}}" {{$select==$year ? 'selected' : '' }}>{{$select}}</option>
                        @endforeach
                    </select>
                </form>
            </div>

        </div>
        <div class="card-body">
            <div class="table-wrapper">
                <div class="table-responsive">
                    <table class="table" id="pub_api">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="pub_api_table_body">

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="card-footer text-right">

        </div>
    </div>
</div>
@endsection

@section('modals')
    <!-- loading modal-->
<div class="modal fade loadingModal" tabindex="-1" role="dialog" id="loadingModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">

            </div>
            <div class="modal-body text-center">
                @include('misc.loadingBootstrap')
                <h3 id="loading_text_api">Mengambil data dari Web API...</h3>
                <p><small class="text-muted ">Mohon Bersabar</small></p>
                
                
            </div>
        </div>
    </div>
</div>


<div class="modal fade loadingModalSubmit" tabindex="-1" role="dialog" id="loadingModalSubmit" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">

            </div>
            <div class="modal-body text-center">
                @include('misc.loadingBootstrap')
                <h3>Menambahkan Publikasi</h3>
                <p><small class="text-muted ">Mohon Bersabar</small></p>
                
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
     /*var $loading = $('#loadingModal')
        //Attach the event handler to any element
        $loading.modal('hide')
    $(document)
        .ajaxStart(function () {
            //ajax request went so show the loading image
            $loading.modal('show');
        })
        .ajaxStop(function () {
            //got response so hide the loading image
            $loading.modal('hide')
        });*/
      
</script>
<script>
    $(document).ready(function () {


        var $loading = $('#loadingModal')

        //Attach the event handler to any element
        $loading.modal('hide')

        var pub_collection=[];
        var page_link=$('#page_link');
        var year_select=$('#year_select');
        
        var pub_ids=@json($pub_ids ?? '', JSON_PRETTY_PRINT);
        console.log(pub_ids);
        
      
        
        //function getAllData() {
            //const limitPerPage = 20;
       
           

        function getPubApiCollection(page=1) {
            var year="{{$year}}";
            console.log(year);
            var $loading = $('#loadingModal');
                
                var paged=page.toString();
                var domain = "1107";
                var api_key = "9728004fed484ca5b90eb484730032ea";
                var api_url = 'https://webapi.bps.go.id/v1/api/list/?model=publication&domain=' + domain +'&year=' + year + '&key=' + api_key+'&page='+paged; 
                
                $.ajax({
                    url: api_url,
                    type: "GET",
                    dataType: "json",
                    beforeSend: function(){
                        $loading.modal('show');
                        
                    },
                    complete:function(){
                        $loading.modal('hide');
                    },
                    success: function (result) {

                        pub_collection = pub_collection.concat(result.data[1])
                        console.log(pub_collection);
                        if (page < (parseInt(result.data[0].pages))) {
                            console.log("page:" + page);
                            getPubApiCollection(page + 1)
                        } else {
                            $loading.modal('hide');
                            var loading_text=$('#loading_text_api');
                            
                            var pubDataTable = $("#pub_api")

                            pubDataTable.DataTable({
                                //"serverSide": true,
                                "processing": true,
                                "data": pub_collection,
                                "columns": [

                                    {
                                        data: "title"
                                    },
                                    {
                                        data: "pub_id",
                                        render: function (dataField) {
                                            if (pub_ids) {
                                                if (pub_ids.includes(dataField)) {
                                                    return '<div class="badge badge-success" >Sudah ditambahkan</div>';
                                                }
                                                return '<a class="btn btn-info pilih" href="https://webapi.bps.go.id/v1/view/1107/publication/ind/' + dataField + '"/ >Pilih</a>';
                                            }
                                            return '<a class="btn btn-info pilih" href="https://webapi.bps.go.id/v1/view/1107/publication/ind/' + dataField + '"/ >Pilih</a>';
                                        }

                                    },

                                ]
                            });
                            $loading.modal('hide');
                        }
                    },
                    error: function(xhr){
                        $loading.modal('hide');
                        console.log('err:'+xhr.status);
                    }
                });

       

        }

  

        getPubApiCollection();
        $loading.modal('hide');


})

</script>


<script>
    $(document).ready(function(){
      
        $('.table-wrapper').on('click','.pilih',function(e){
            e.preventDefault();
            console.log('tes');
            var url="{{route('admin.pubCollection.store')}}";
            var api_key='9728004fed484ca5b90eb484730032ea';
            api_pub_detail=$(this).attr('href')+'/'+api_key;
            console.log(api_pub_detail);
            $.ajax({
                url: api_pub_detail,
                type:"get",
                dataType: 'json',
                global: false,
                beforeSend: function () {
                    var loadings = $('#loadingModalSubmit');
                    console.log(loadings);
                
                    loadings.modal('show');
                },
                success: function (collection) {
                    detailPubData = collection.data;
                    console.log(detailPubData);
                    //stuff
                    //...
                    $.ajax({
                        type: "post",
                        url: url,
                        data: {
                            // change data to this object
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            is_pub_detail: 'is_pub_detail',
                            pubCollection: detailPubData

                        },
                        complete: function () {
                            var $loadings = $('#loadingModalSubmit')
                            $loadings.modal('hide')
                        },
                        success: function (result) {
                            //console.log(result);
                            window.location = result.url + "?data=success";
                            
                            //permintaanTable.ajax.reload();
                            //$('#daftar_publikasi').DataTable().ajax.reload();
                            //$("#close").trigger("click");
                        },
                        error: function (error) {
                            var $loadings = $('#loadingModalSubmit')
                            $loadings.modal('hide')
                            alert('error');
                            console.log(error);
                        }

                    });
                },
                error:function(xhr){
                    console.log('err:'+xhr.status);
                }
            });
           /* $.getJSON(api_pub_detail,function(collection){  
                }).done(function(collection){
                    detailPubData=collection.data;
                    console.log(detailPubData);
            

            })*/
        });
    })
  
</script>

@endsection
