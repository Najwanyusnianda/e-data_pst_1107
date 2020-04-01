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
                                                <td width=40%>Tanggal Rilis</td>
                                                <td width=10%>:</td>
                                                <td>{{$pub_detail->release_date}}</td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Update</td>
                                                <td>:</td>
                                            <td>{{$pub_detail->update_date ?? 'tidak ada'}}</td>
                                            </tr>
                                            <tr>
                                                <form action="" method="POST">
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
    
                                                            </td>
                                                            <td width=10%>
    
                                                            </td>
                                                        </div>
    
    
    
                                                           
                                                         
    
                
                                                        @else
                                                        <div class="n_bab_container">
                                                            <strong style="color:red">Belum diinput</strong>
                                                            <a href="#" id="inputHalBtn"
                                                                class="btn btn-icon icon-left btn-warning pt-0 pb-0 pl-1 pr-1">
                                                                <i class="fas fa-edit btn-sm"></i>
    
                                                            </a>
                                                        </div>
                                                        <div class="n_bab_form_container" style="display:none">
    
                                                            <input type="text" class="form-control" id="n_bab" value=""
                                                                name="n_bab">
    
                                                            </td>
                                                            <td width=10%>
    
                                                            </td>
                                                        </div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (!empty($pub_detail->n_bab))
                                                        <div class="n_bab_container" >
                                                            <a href="#" id="inputHalBtn"
                                                            class="btn btn-icon icon-left btn-warning pt-0 pb-0 pl-1 pr-1">
                                                            <i class="fas fa-edit btn-sm"></i>
    
                                                            </a>
                                                        </div>
                                                        <div class="n_bab_form_container" style="display:none">
                                                        <a href="#" id="submitHalBtn"
                                                            class="btn btn-icon icon-left btn-warning pt-0 pb-0 pl-1 pr-1">
                                                            submit
    
                                                        </a>
                                                        </div> 
    
                                                        @else
    
                                                        <div class="n_bab_container">
                                                            <a href="#" id="inputHalBtn"
                                                                class="btn btn-icon icon-left btn-warning pt-0 pb-0 pl-1 pr-1">
                                                                <i class="fas fa-edit btn-sm"></i>
    
                                                            </a>
                                                        </div>
                                                        <div class="n_bab_form_container" style="display:none">
                                                            <a href="#" id="submitHalBtn"
                                                                class="btn btn-icon icon-left btn-warning pt-0 pb-0 pl-1 pr-1">
                                                                submit
    
                                                            </a>
                                                        </div>
                                                        @endif
    
                                                    </td>
                                                </form>

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
                                    <h6 id="Bab-title" bab-data="{{$i+1}}">Bab <span>{{$i+1}}</span> </h6>
                                    <div class="ml-auto">
                                        
                                        <a href="#" class="btn btn-icon btn-primary addTableButton" >
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">

                                        @forelse ($pub_table as $item)
                                            @if ($item->bab_num== $i+1)
                                            <li class="list-group-item">
                                                {{$item->title}}
                                            </li>
                                            @endif
                                        @empty
                                            
                                        @endforelse
                                    </ul>

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

            var babNumber=tableListheaderComponent.find('#Bab-title').attr('bab-data');
            console.log(babNumber);
            var judulModal="Form Tambah Indeks Tabel Baru - "+tableListheaderComponent.find('#Bab-title').html();
            $('#addTableFormModal .modal-title').html(judulModal);
            $('#babNumberForm').val(babNumber);
            addTableForm.modal('show');
        
        })


        //ju,lah bab event
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
            n_bab_container.css('display','inline');
            n_bab_form_container.css('display','none');

  

        });

    })

    </script>    

@endsection