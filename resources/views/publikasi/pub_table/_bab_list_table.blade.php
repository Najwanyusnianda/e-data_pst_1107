

        <table class="table table-striped" id="tableByBab" name="bab">
            <thead>
                <tr>
                    <th width="10%"></th>
                    <th width="65%"></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
        
            </tbody>
        </table>




<script>
    ///datatable=========================================
 
    var bab_id="{{$bab_num}}";
    console.log(bab_id);

    var url="{{route('admin.pubTableCollection.table',['pub_id'=>$pub_id,'bab_num'=>':bab_id'])}}".replace(':bab_id', bab_id);
 


var tableListPubTable = $('#tableByBab').DataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    ajax: {
        url:url ,
        global:false
    },
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
        }],
    columnDefs: [
        { className: "first_col_td", "targets": [ 0 ] }
        ]        
});
</script>