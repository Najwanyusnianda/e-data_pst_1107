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

                                        <td>
                                            @if ($item->filepath != null)
                                            <small class="font-weight-light"><a href="{{url('/'.$item->filepath)}}" class="">{{$item->title}}</a></small>
                                            @else
                                            <small class="font-weight-light"><span class="">{{$item->title}}</span></small>
                                            @endif
                                            
                                         </td>
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