@extends('layout.master_back')

@section('style')
    <style>

.table td, .table th {
            vertical-align: middle !important;
            
        }
    </style>
@endsection

@section('section_header')

    <h1>Tabel Lainnya</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Input Data</a></div>
      <div class="breadcrumb-item">Tabel Lainnya</div>
    </div>
@endsection

@section('content')

    <div class="container-fluid">


        @if (session('pub_add_success'))

            <div class="alert alert-success">
             {{ session('pub_add_success') }}
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
                <a class="btn btn-primary ml-auto btn-icon " id="add_tabel_lainnya" href="{{ route('admin.lainnya.create') }}" >
                    <i class="fas fa-plus"></i>
                    Tambah Tabel Lainnya
                </a>
            </div>
    

     
            <div class="card-body table-responsive">
                <table class="table table-striped" id="daftar_grup">
                    <thead>
                       <tr>
                        <th width="10%">No</th>
                        <th width="55%">Judul</th>
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
@endsection

@section('script')
    <script>
var  tableListPubTable=    $('#daftar_grup').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{route('admin.publainnyaCollection.table')}}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_Row_Index',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'judul_new'
                    },

                    {
                        data: 'action'
                    }




                ]
            });




            //function=================================
            function handleFileInput() {
                $('.custom-file input').change(function (e) {
                    var files = [];
                    for (var i = 0; i < $(this)[0].files.length; i++) {
                        var filename = $(this)[0].files[i].name;
                        filename = (filename).replace(/(.{20})..+/, "$1…");

                        files.push('<span class="badge badge-info">' + filename + '</span>');
                    }
                    console.log(files);
                    $('.pdf_file_placeholder').html(files.join(' '));
                });
            }


            //add table
            var addTableForm = $('#addTableFormModal');
            $('#add_tabel_lainnya').click(function (event) {
                event.preventDefault();
                var addTableForm_url=$(this).attr('href');
                $.ajax({

                    url: addTableForm_url,
                    dataType: 'html',
                    global: false,
                    success: function (response) {
                        //console.log("Data: " + response);

                        $('#addTableFormBody').html(response);
                        //$('#babNumberForm').val(bab_num_global);
                        handleFileInput();
                        $('#form_add_table').submit(function (e) {
                            e.preventDefault();

                            var formData = new FormData(this);
                            var url = $(this).attr('action')
                            $.ajax({
                                type: 'POST',
                                url: url,
                                data: formData,
                                cache: false,
                                contentType: false,
                                processData: false,
                                global: false,
                                beforeSend: function () {
                                    $('#addTableSubmit').attr('aria-disabled', 'true');
                                    $('#addTableSubmit').addClass('disabled');
                                    $('#addTableSubmit').html('  <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Loading...');

                                },
                                success: (data) => {
                                    this.reset();
                                    $('#addTableFormModal').modal('hide');
                                    tableListPubTable.ajax.reload();
                                    Swal.fire(
                                        'Berhasil!',
                                        'Tabel Berhasil Ditambahkan',
                                        'success'
                                    )
                                },
                                error: function (data) {
                                    console.log(data);
                                }
                            });
                        });
                    },
                    error: function (e) {

                    }
                });
addTableForm.modal('show');
            });

 $('.section-body').on('click', '.edit_table_form', function (e) {
    e.preventDefault();
  var bab_num_global='';
    var addTableForm = $('#addTableFormModal');
    // var tableListheaderComponent=$(this).closest('.card').find('#Bab-title');
    // console.log(tableListheaderComponent.html());

    //var babNumber=tableListheaderComponent.attr('bab-data');
    //console.log('halaman bab:'+babNumber);
    //var judulModal="Form Update Tabel  - "+tableListheaderComponent.html();
    if (bab_num_global) {
        var judulModal = "Form Tambah Tabel Publikasi - Bab " + bab_num_global;
    } else {
        var judulModal = "Update Tabel "
    }
    $('#addTableFormModal .modal-title').html(judulModal);

   // var table_id = $(this).attr('data-id');
   
    var updateTableForm_url = $(this).attr('href');
    //updateTableForm_url = updateTableForm_url.replace(':table_id', table_id);
    console.log(updateTableForm_url);
    $.ajax({
        url: updateTableForm_url,
        dataType: 'html',
        global: false,
        success: function (response) {
            // console.log("Data: " + response);

            $('#addTableFormBody').html(response);
           // $('#babNumberForm').val(bab_num_global);
            handleFileInput();
            $('#form_add_table').submit(function (e) {
                e.preventDefault();

                var formData = new FormData(this);
                var url = $(this).attr('action')
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    global: false,
                    beforeSend: function () {
                        $('#addTableSubmit').attr('aria-disabled', 'true');
                        $('#addTableSubmit').addClass('disabled');
                        $('#addTableSubmit').html('  <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Loading...')
                    },
                    success: (data) => {
                        this.reset();
                        $('#addTableFormModal').modal('hide');
                        tableListPubTable.ajax.reload();
                        Swal.fire(
                            'Berhasil!',
                            'Tabel Berhasil Di Update',
                            'success'
                        )
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });
        },
        error: function (e) {

        }
    });
    addTableForm.modal('show');

})

$('.container-fluid').on('click','.deleteLainnya',function(e){
        e.preventDefault();
       // var pubId=$(this).attr('data-id');
        var deleteUrl=$(this).attr('href');
        Swal.fire({
            title: 'Hapus Tabel?',
            text: "Tabel ini akan dihapus",
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

                },
                success: function (result) {
                    //console.log(result);
                    Swal.fire(
                    'Terhapus!',
                    'Tabel Berhasil dihapus.',
                    'success'
                    )
                    //permintaanTable.ajax.reload();
                  //  $('#daftar_publikasi').DataTable().ajax.reload();
                    $('#daftar_grup').DataTable().ajax.reload();
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
    </script>
@endsection