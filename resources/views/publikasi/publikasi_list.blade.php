@extends('layout.master_back')

@section('style')
    <style>

.table td, .table th {
            vertical-align: middle !important;
            
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary btn-flat ml-auto" id="updatePublicationList">Update</button>
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


@section('script')

<script>
    var updateButton= $('#updatePublicationList');
    var listPubData;

    
    updateButton.click(function(e){
        e.preventDefault();
     
        console.log('test');
        var url="{{route('admin.pubCollection.store')}}";
        var data_pub_url='https://webapi.bps.go.id/v1/api/list/?model=publication&domain=1107&year=2019&key=9728004fed484ca5b90eb484730032ea';
        $.getJSON(data_pub_url,function(collection){  
        }).done(function(collection){
            listPubData=collection.data;
            listPubData=listPubData[1]; 
            
            $.ajax({
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    data: {
                        // change data to this object
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        pubCollection:listPubData
                        
                    },
                    success: function(result) {
                        //console.log(result);
                        console.log('success');
                        //permintaanTable.ajax.reload();
                       $('#daftar_publikasi').DataTable().ajax.reload();
                        //$("#close").trigger("click");
                    },error:function(error){
                        alert('error');
                        console.log(error);
                    }

                });
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