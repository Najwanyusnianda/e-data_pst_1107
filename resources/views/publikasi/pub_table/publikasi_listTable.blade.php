@extends('layout.master_back')


@section('style')
    <style>
        #detailPublikasi td{
            height: 30px !important;
        }

        #tableByBab .first_col_td{
            text-align: center;
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
@include('publikasi.pub_table._detailPublikasi')
           

            <div class="section-body">
                <h2 class="section-title">Daftar Tabel</h2>
                <p class="section-lead">
                    daftar tabel yang terdapat dalam publikasi berdasarkan bab
                </p>
    
                @include('publikasi.pub_table._bab_list')
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


var bab_num_global='';
//----------------------------select bab ----------------------//
        $('#select_bab').change(function (e) {
            e.preventDefault();
            //tableListPubTable.ajax.reload();
            var bab_val = this.value;
            var selectBab_url = "{{route('admin.pubTableCollection.pubTableList',['pub_id'=>$pub_detail->pub_id])}}";
            console.log(selectBab_url)
            //var selectBab_url='#';
            $.ajax({
                type: "post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: selectBab_url,
                data: {
                    // change data to this object
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    n_bab_value: bab_val

                },
                global:false,
                success: function (result) {
                    bab_num_global=bab_val
                    $('#table-by-bab-wrapper').html(result)
                
                },
                error: function (error) {
                    alert('erroraaa');
                    console.log(error.toString());
                }

            });
        });

//input jumlah bab====================
        var inputHalBtn= $('#inputHalBtn');
        inputHalBtn.click(function(e){
            e.preventDefault();
            
        })













//add table ------------------------------------------->
var addTableButton=$('.addTableButton')
var addTableForm= $('#addTableFormModal');
///-------------- add table -------------------------
addTableButton.click(function(e){
    e.preventDefault()
    if(bab_num_global){
        var judulModal="Form Tambah Tabel Publikasi - Bab "+bab_num_global;
    }else{
        var judulModal="Form Tambah Tabel Publikasi - Bab 000"
    }
    
    $('#addTableFormModal .modal-title').html(judulModal);
    
    var addTableForm_url="{{route('admin.pubTable_form',[$pub_detail->pub_id])}}"

    $.ajax({

        url: addTableForm_url,
        dataType: 'html',
        global: false,
        success: function (response) {
            //console.log("Data: " + response);

            $('#addTableFormBody').html(response);
            $('#babNumberForm').val(bab_num_global);
            handleFileInput();
        },
        error: function (e) {

        }
    });
    addTableForm.modal('show');
})
///--------------add table each --------------------

        /*$('#babList').on('click','.addTableButton',function(e){
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
           $.get(addTableForm_url, function(data, status){
                console.log( "\nStatus: " + status);
                if(status=="success"){
                    var loading = $('#loadingModal')
                    loading.modal('hide');
                    //loading.modal().hide();
                  
                    $('#addTableFormBody').html(data);
                    console.log(loading);
                  
                   //var temp=loading.attr('class','modal fade loadingModal')
                   
           
                }
                


            });


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
        
        })*/

//update table detail --------------------->

$('.section-body').on('click','.edit_table_form',function(e){
    e.preventDefault();

   // var tableListheaderComponent=$(this).closest('.card').find('#Bab-title');
           // console.log(tableListheaderComponent.html());

            //var babNumber=tableListheaderComponent.attr('bab-data');
            //console.log('halaman bab:'+babNumber);
            //var judulModal="Form Update Tabel  - "+tableListheaderComponent.html();
            if(bab_num_global){
        var judulModal="Form Tambah Tabel Publikasi - Bab "+bab_num_global;
    }else{
        var judulModal="Form Tambah Tabel Publikasi - Bab 000"
    }      
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
                $('#babNumberForm').val(bab_num_global);
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