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
<div class="modal fade loadingModal" tabindex="-1" role="dialog" id="loadingModal">
    <div class="modal-dialog modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">

            </div>
            <div class="modal-body text-center">
                @include('misc.loadingBootstrap')
                <h3>Mengambil data dari Web API...</h3>
                <p><small class="text-muted ">Mohon Bersabar</small></p>
                
                
            </div>
        </div>
    </div>
</div>


<div class="modal fade loadingModalSubmit" tabindex="-1" role="dialog" id="loadingModalSubmit">
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
     var $loading = $('#loadingModal')
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
        });
      
</script>
<script>
    $(document).ready(function () {




        var pub_collection=[];
        var page_link=$('#page_link');
        var year_select=$('#year_select');
        
        var pub_ids={!!$pub_ids !!};
      
        
        //function getAllData() {
            //const limitPerPage = 20;
       
           

        function getPubApiCollection(page="1") {
            var year="{{$year}}";
            console.log(year);
                
            
                var domain = "1107";
                var api_key = "9728004fed484ca5b90eb484730032ea";
                var api_url = 'https://webapi.bps.go.id/v1/api/list/?model=publication&domain=' + domain +'&year=' + year + '&key=' + api_key; 
                $.get(api_url, function (result) {
                        // do something
                        pub_collection=pub_collection.concat(result.data[1])
                        if (page < result.data[0].pages) {
                            console.log("page:"+page);
                            getPubApiCollection(page + 1)
                        }else{
                            var pubDataTable = $("#pub_api")

                            pubDataTable.DataTable({
                                //"serverSide": true,
                                "processing": true,
                                "data": pub_collection,
                                "columns": [
                          
                                    {data: "title"},
                                    {data: "pub_id",render: function (dataField) { 
                                        if(pub_ids.includes(dataField)){
                                            return '<div class="badge badge-success" >Sudah ditambahkan</div>'; 
                                        }
                                        return '<a class="btn btn-info pilih" href="https://webapi.bps.go.id/v1/view/1107/publication/ind/' + dataField + '"/ >Pilih</a>'; 
                                        }
                                    },

                                ]
                    });
                        }
                });
       

        }

  

        getPubApiCollection();











            /*const getPublikasis = async function (pageNo = 1) {

                let actualUrl = api_url + `&page=${pageNo}`;
                var apiResults = await fetch(actualUrl)
                    .then(resp => {
                    
                        return resp.json();

                    });
                
    
              
                //return apiResults.data[1];
                return apiResults.data[1];

           

            }

            const getEntirePublikasiList = async function (pageNo = 1) {
                
                    const results = await getPublikasis(pageNo);

                                 
                    console.log("Retreiving data from API for page : " + pageNo);

                    if (!results) {
                        return results;
                    } else {

                        if(results.length >0){
                            return results.concat(await getEntirePublikasiList(pageNo + 1));
                         
                        }else{
                            return results;
                            console.log("tes")
                        }
                        //return results.concat(await getEntirePublikasiList(pageNo + 1));
                        //console.log(results);

                        
                 
                    }
            
                
                //var data=results.data[1]
               // var pages=results.data[0].pages;
                //console.log("res"+pageNo+results);
                //var pub_api_collection='';
                //pages=parseInt(pages)
                //results=results.data[1];
            };


            (async () => {
           
                           
            })
            ();
            async function runCollected () {
                try {
                    const entireList = await getEntirePublikasiList();
                  
                    return entireList;
                } catch (err) {
                    console.log('All errors are welcomed here! From promises or not, this catch is your catch.')
                }
            }

     //   }

           runCollected().then(
            result => {
                    var collectedzz=new Array();
                    var jsonCollected=JSON.stringify(result);//42

                    var pubDataTable = $("#pub_api")
                    console.log(result.length);
                    for (let index = 0; index < (result.length-1); index++) {
                        collectedzz=collectedzz.push(index);
                    
                        
                    }
                    console.log(collected);
                    pubDataTable.DataTable({
                        "data": collected,
                        "columns": [
                            {data: "pub_id"},
                            {data: "title"}
                        ]
                    });
                }
           )*/
       //get data from


        /*
        function collectionToHtmlTable(collection){
            var pub_collection=collection;
            for (let index = 0; index < pub_collection.length; index++) {
            const data = pub_collection[index];

            var judul_column="<td>"+data.title+"</td>";
            var aksi_column="<td><a class='btn btn-info' id="+data.pub_id+" href='#'>Pilih</a>"
            var row_wrapper="<tr>"+judul_column+aksi_column+"</tr>"
            record=record+row_wrapper;
            
            }

            return(record);
        }

        //initial table

        var api_pub_url = 'https://webapi.bps.go.id/v1/api/list/?model=publication&domain=' + domain +
            '&year=' + year + '&key=' + api_key + '&page=' + page;
        console.log(api_pub_url);

        $.getJSON(api_pub_url, function (collection) {}).done(function (collection) {
            //console.log(collection);
            var listPubData = collection.data;
            pub_collection = listPubData[1];
            //console.log(pub_collection[0].title)
            pages = listPubData[0].pages;
            console.log("total halaman:" + pages);


            //table
            var htmlTableString=collectionToHtmlTable(pub_collection)
            $('#pub_api_table_body').html(htmlTableString);
            

            var page_link_string='';
            //page number
            if(page=="1"){
                var page_int=parseInt(page);
                isDisabled='disabled'
                var first_arrow='<li class="page-item'+isDisabled+'"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a></li>'

                for (let index = 0; index < 3; index++) {
                    var page link_item='<li class="page-item"><a class="page-link" href="#">2</a></li>'

                    
                }
                page_link.html('');
            }


        });

        //onchange year
        year_select.change(function(){
            year=this.value;
            page=1
            

            var api_pub_url = 'https://webapi.bps.go.id/v1/api/list/?model=publication&domain=' + domain +
            '&year=' + year + '&key=' + api_key + '&page=' + page;
            console.log(api_pub_url);

        $.getJSON(api_pub_url, function (collection) {}).done(function (collection) {
            //console.log(collection);
            var listPubData = collection.data;
            pub_collection = listPubData[1];
            //console.log(pub_collection[0].title)
            pages = listPubData[0].pages;
            console.log("total halaman:" + pages);

            var htmlTableString=collectionToHtmlTable(pub_collection)
            $('#pub_api_table_body').html(htmlTableString);

        });

        })*/





    




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
