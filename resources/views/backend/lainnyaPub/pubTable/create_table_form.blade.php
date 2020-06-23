<form action="{{route('admin.pubTable_create',['pub_id'=>$pub_detail->pub_id])}}" method="post" id="form_add_table">
    {{ csrf_field() }}
    <p class="text-muted">Tambah Tabel Baru</p>
    <div class="card">
        <div class="card-body">
            <div class="form-group">

                <input type="hidden" class="form-control" placeholder="" id="babNumberForm" name="babNumberForm">
            </div>
            <div class="form-group">
                <label for="title">Nama Grup Tabel<code>*</code></label>
                <input type="text" class="form-control" id="name" placeholder="..." id="name" name="name">
            </div>


            
        </div>
        <div class="card-footer">
            <button class="btn btn-primary btn-block" id="addTableSubmit" >Submit</button>
        </div>
    </div>
</form> 