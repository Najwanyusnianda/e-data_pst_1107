@extends('layout.master_back')


@section('style')
    <style>
        #detailPublikasi td{
            height: 30px !important;
        }
        
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row-12">

            <div class="section-body">
                <h2 class="section-title">Detail Publikasi</h2>
                <p class="section-lead">
                    daftar tabel yang terdapat dalam publikasi berdasarkan bab
                </p>
                <div class="card ">
                    <div class="card-header">
                        <h5>{{$pub_detail->title}}</h5>   
                    </div>
                    <div class="card-body">
                        <div class="media">
                            <img class="mr-3 img-thumbnail border-dark" src="{{$pub_detail->cover}}" alt="cover" >
                            <div class="media-body">
                                <div class="table-responsive table-sm">
                                    <table class="table table-borderless" style="font-size:smaller" id="detailPublikasi">
                                        <thead>
                                          <tr>
            
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tanggal Rilis</td>
                                                <td>:</td>
                                                <td>{{$pub_detail->release_date}}</td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Update</td>
                                                <td>:</td>
                                            <td>{{$pub_detail->update_date}}</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Jumlah Bab</td>
                                                <td>:</td>
                                                <td>
                                                    @if (!empty($pub_detail->n_bab))
                                                        {{$pub_detail->n_bab}}
                                                        &nbsp;
            
                                                    @else
                                                    <div class="container" id="">
                                                        <strong>Belum diinput</strong>
                                                        <a href="#" id="inputHalBtn" class="btn btn-icon icon-left btn-warning pt-0 pb-0 pl-1 pr-1">
                                                            <i class="fas fa-edit btn-sm"></i> 
                                           
                                                        </a>
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
                                    <h6 id="Bab-title">Bab {{$i+1}}</h6>
                                    <div class="ml-auto">
                                        
                                        <a href="#" class="btn btn-icon btn-primary addTableButton" >
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                
    
                            </div>
                        </div>

                        @endfor
                    </div>

                    @else
                        
                    @endif

                </div>
            </div>
        </div>
        
    </div>






@endsection

@section('modals')
<div class="modal fade addTableFormModal" tabindex="-1" role="dialog" id="addTableFormModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" ></h5> <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                @include('publikasi.pub_table._addTableForm')
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
    $(document).ready(function(){
        var inputHalBtn= $('#inputHalBtn');
        inputHalBtn.click(function(e){
            e.preventDefault();
            
        })





        //modal event

       
        var addTableButton=$('.addTableButton')
        var addTableForm= $('#addTableFormModal');
        $('#babList').on('click','.addTableButton',function(e){
            e.preventDefault();
            var tableListheaderComponent=$(this).parent().parent();
            //console.log(tableListheaderComponent.find('#Bab-title').html());
            var judulModal="Form Tambah Indeks Tabel Baru - "+tableListheaderComponent.find('#Bab-title').html();
            $('#addTableFormModal .modal-title').html(judulModal);
            addTableForm.modal('show');
        
        })
    })

    </script>    

@endsection