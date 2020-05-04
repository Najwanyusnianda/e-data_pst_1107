@extends('layout.master_back')


@section('style')
    <style>
        #detailPublikasi td{
            height: 30px !important;
        }
        
    </style>
@endsection
@section('section_header')
    <h1>Detail Publikasi</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Input Data</a></div>
      <div class="breadcrumb-item"><a href="#">Publikasi</a></div>
      <div class="breadcrumb-item">Detail Publikasi</div>
    </div>
@endsection

@section('content')
<h2 class="section-title">Detail Publikasi</h2>
<p class="section-lead">
    Detail Publikasi
</p>
    <div class="container">
        <div class="row-12">
                <div class="card ">
                    <div class="card-header">
                        <h5>{{$pub_detail->title}}</h5>   
                    </div>
                    <div class="card-body">
                        <div class="media">
                            <img class="mr-3 img-thumbnail border-dark" src="{{$pub_detail->cover}}" alt="cover" >
                            <div class="media-body">
                                <div class="table-responsive table-sm">
                                    <table class="table table-borderless" style="font-size:smaller"
                                        id="detailPublikasi">
                                        <thead>
                                            <tr>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td width=40%>ID Publikasi</td>
                                                <td width=10%>:</td>
                                                <td>{{$pub_detail->pub_id }}</td>
                                            </tr>
                                            <tr>
                                                <td width=40%>ISSN</td>
                                                <td width=10%>:</td>
                                                <td>{{$pub_detail->issn }}</td>
                                            </tr>
                                            <tr>
                                                <td width=40%>Tanggal Rilis</td>
                                                <td width=10%>:</td>
                                                <td>{{\Carbon\Carbon::parse($pub_detail->release_date)->format('j F, Y')}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Update</td>
                                                <td>:</td>
                                                <td>{{\Carbon\Carbon::parse($pub_detail->update_date)->format('j F, Y')}}
                                                </td>
                                            </tr>
                                            <tr>


                                                <td>Jumlah Bab</td>
                                                <td>:</td>
                                                <td>

                                                    @if (!empty($pub_detail->n_bab))

                                                    <div class="n_bab_container">

                                                        {{$pub_detail->n_bab}}

                                                    </div>
                                                    <div class="n_bab_form_container" style="display:none">

                                                        <input type="text" class="form-control" id="n_bab"
                                                            value="{{$pub_detail->n_bab}}" name="n_bab">
                                                    </div>

                                                </td>




                                                @else
                                                <div class="n_bab_container">
                                                    <span class="badge badge-danger">Belum Diinput</span>
                                                </div>
                                                <div class="n_bab_form_container" style="display:none">

                                                    <input type="text" class="form-control" id="n_bab" name="n_bab">

                                                   
                                                </div>
                                                @endif

                                                <td>
                                                    @if (!empty($pub_detail->n_bab))
                                                    <div class="n_bab_container">
                                                        <a href="#" id="inputHalBtn"
                                                            class="btn btn-icon icon-left btn-warning ">
                                                            <i class="fas fa-edit btn-sm"></i>
                                                            Edit

                                                        </a>
                                                    </div>
                                                    <div class="n_bab_form_container" style="display:none">
                                                        <a href="#" id="submitHalBtn" class="btn btn-primary">
                                                            Submit

                                                        </a>
                                                    </div>

                                                    @else

                                                    <div class="n_bab_container">
                                                        <a href="#" id="inputHalBtn"
                                                            class="btn btn-icon icon-left btn-warning ">
                                                            <i class="fas fa-edit btn-sm"></i> Edit

                                                        </a>
                                                    </div>
                                                    <div class="n_bab_form_container" style="display:none">
                                                        <button id="submitHalBtn" class="btn btn-primary">
                                                            Submit
                                                        </button>
                                                    </div>
                                                    @endif

                                                </td>



                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                           </div>
                          </div>

    
                    </div>
                </div>
           

            <div class="section-body">
                <h2 class="section-title">Daftar Tabel</h2>
                <p class="section-lead">
                    daftar tabel yang terdapat dalam publikasi berdasarkan bab
                </p>
    
                <div class="" id="babList">
   
                    @if (!empty($pub_detail->n_bab))
                    <div class="row">
                        @for ($i = 0; $i < $pub_detail->n_bab ; $i++)
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h6 id="Bab-title" bab-data="{{$i+1}}">Bab <span>{{$i+1}}</span> </h6>
                                    <div class="ml-auto">
                                        

                                    </div>
                                    <div class="card-header-action">
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-icon btn-primary addTableButton mr-3" >
                                                Tambah Baru
                                            </a>
                                            <a data-collapse="#bab{{$i+1}}" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                                        </div>

                                       
                                    </div>
                                </div>
                            <div class="collapse" id="bab{{$i+1}}" style="">
                                    <div class="card-body table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>

                                                    <th width="70%">
                                                        Judul
                                                    </th>
                                                    <!--<th>
                                                        Data
                                                    </th>-->
                                                    <th width="30%">
                                                        Aksi
                                                    </th>
                                                
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($pub_table as $key=>$item)
                                                @if ($item->bab_num== $i+1)
                                                    <tr>
                                                 
                                                        <td><small class="font-weight-light"><span href="#" class="">{{$item->title}}</span></small> </td>
                                                        <!--<td>
                                                            <a href="{{url('/'.$item->filepath)}}" class="btn btn-danger btn-sm btn-icon">
                                                                <i class="fa fa-file-pdf"></i>
                                                            <small>pdf</small>
                                                            </a>
    
                                                        </td>-->
                                                        <td>
                                                            <div class="buttons">
                                                            <a href="#" class="edit_table_form text-decoration-none text-warning" data-id="{{$item->id}}">
                                                                    <i class="far fa-edit"></i>
                                                                </a>
                                                                <a href="#" class="text-decoration-none text-danger">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </a>
                                                                <a href="#" class="text-decoration-none text-info text-bold"><i class="fas fa-chevron-right fa-lg"></i></a>
                                                            </div>
                                                        </td>
                               
                                                    </tr>
                                                @endif
                                            @empty
                                                
                                            
                                            @endforelse
                                            </tbody>
                                        </table>
    
                                    </div>
                                </div>

                                
    
                            </div>
                        </div>

                        @endfor
                    </div>

                    @else
                    <div class="alert alert-info" role="alert">
                        <h5>
                            Jumlah bab belum didefinisikan
                        </h5>
                      </div>
                    @endif

                </div>
            </div>
        </div>
        
    </div>






@endsection

@section('modals')

<!-- add table modal-->
<div class="modal fade addTableFormModal" tabindex="-1" role="dialog" id="addTableFormModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" ></h5> <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body" id="addTableFormBody">
                
            </div>
        </div>
    </div>
</div>


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
                       var $loading = $('#loadingModal').modal('hide');
                       //Attach the event handler to any element
                       $(document)
                           .ajaxStart(function () {
                               //ajax request went so show the loading image
                               $loading.modal('show');
                           })
                           .ajaxStop(function () {
                               $loading.modal('hide')});
</script>


<!--main script-->
<script>


    $(document).ready(function(){

//function=================================
function handleFileInput(){
        $('.custom-file input').change(function (e) {
        var files = [];
        for (var i = 0; i < $(this)[0].files.length; i++) {
            var filename=$(this)[0].files[i].name;
            filename=(filename).replace(/(.{20})..+/, "$1…");

            files.push('<span class="badge badge-info">'+filename+'</span>');
        }
        console.log(files);
      $('.pdf_file_placeholder').html(files.join(' '));
    });
}

//input jumlah bab====================
        var inputHalBtn= $('#inputHalBtn');
        inputHalBtn.click(function(e){
            e.preventDefault();
            
        })





//add table ------------------------------------------->

        var addTableButton=$('.addTableButton')
        var addTableForm= $('#addTableFormModal');
        $('#babList').on('click','.addTableButton',function(e){
            e.preventDefault();
            //var tableListheaderComponent=$(this).parent().parent();
            console.log($(this).closest('.card-header').html());
            var tableListheaderComponent=$(this).closest('.card-header');
            //console.log(tableListheaderComponent.find('#Bab-title').html());

            var babNumber=tableListheaderComponent.find('#Bab-title').attr('bab-data');
            console.log(babNumber);
            var judulModal="Form Tambah Tabel Publikasi - "+tableListheaderComponent.find('#Bab-title').html();
            $('#addTableFormModal .modal-title').html(judulModal);
            //$('#babNumberForm').val(babNumber);

            var addTableForm_url="{{route('admin.pubTable_form',[$pub_detail->pub_id])}}"
           /* $.get(addTableForm_url, function(data, status){
                console.log( "\nStatus: " + status);
                if(status=="success"){
                    var loading = $('#loadingModal')
                    loading.modal('hide');
                    //loading.modal().hide();
                  
                    $('#addTableFormBody').html(data);
                    console.log(loading);
                  
                   //var temp=loading.attr('class','modal fade loadingModal')
                   
           
                }
                


            });*/


           $.ajax({

                url: addTableForm_url,
                dataType: 'html',
                global: false,
                success: function(response) {
                    //console.log("Data: " + response);
                  
                $('#addTableFormBody').html(response);
                $('#babNumberForm').val(babNumber);
                    handleFileInput();
                },
                error:function(e){
                
                }
            });
            addTableForm.modal('show');
        
        })

//update table detail --------------------->

$('.section-body').on('click','.edit_table_form',function(e){
    e.preventDefault();

    var tableListheaderComponent=$(this).closest('.card').find('#Bab-title');
           // console.log(tableListheaderComponent.html());

            var babNumber=tableListheaderComponent.attr('bab-data');
            console.log('halaman bab:'+babNumber);
            var judulModal="Form Update Tabel  - "+tableListheaderComponent.html();
            $('#addTableFormModal .modal-title').html(judulModal);
          
    var table_id=$(this).attr('data-id');
 var updateTableForm_url="{{route('admin.pubTable_form_update',['pub_id'=>$pub_detail->pub_id,'pubtable_id'=>':table_id'])}}"
 updateTableForm_url = updateTableForm_url.replace(':table_id', table_id);
 console.log(updateTableForm_url);
    $.ajax({
                url: updateTableForm_url,
                dataType: 'html',
                global: false,
                success: function(response) {
                   // console.log("Data: " + response);
                   
                $('#addTableFormBody').html(response);
                $('#babNumberForm').val(babNumber);
                    handleFileInput();
                },
                error:function(e){
                
                }
            });
            addTableForm.modal('show');

})


//jumlah bab event ------------------------------------------------------------------------------------->
        var inputHalBtn=$('#inputHalBtn');
        var submitHalBtn=$('#submitHalBtn');
        var n_bab_container=$('.n_bab_container');
        var n_bab_form_container=$('.n_bab_form_container');
        
        inputHalBtn.click(function(e){
            e.preventDefault();
            n_bab_container.css('display','none');
            n_bab_form_container.css('display','inline');

        })
       
        submitHalBtn.click(function(e){
            e.preventDefault();
            var url="{{route('admin.pubCollection.n_bab.store',['id'=>$pub_detail->pub_id])}}";
            var n_bab_value=$('#n_bab').val();
            console.log('jumlah bab: '+n_bab_value);
            $.ajax({
                type: "post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                data: {
                    // change data to this object
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    n_bab_value:n_bab_value               

                },
                success: function (result) {
                    //console.log(result);
                    setTimeout(function(){
                        location.reload();
                    }, 2000);

                },
                error: function (error) {
                    alert('error');
                    console.log(error);
                }

            });
            n_bab_container.css('display','inline');
            n_bab_form_container.css('display','none');

  

        });

    })


</script>  

<script>



</script>

@endsection