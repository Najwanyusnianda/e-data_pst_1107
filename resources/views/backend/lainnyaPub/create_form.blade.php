
@if (!empty($pubTable))
<form action="{{route('admin.lainnya.storeUpdate',['lainnya_id'=>$pubTable->id])}}" method="post"
    enctype="multipart/form-data" id="form_add_table">
    {{ csrf_field() }}
<p class="text-muted">Update Table {{$pubTable->title}}</p>
    <div class="card">
        <div class="card-body">

            <div class="form-group">
                <label for="title">Judul Tabel</label>
            <input type="text" class="form-control" id="title" placeholder="..." id="tableTitle" name="tableTitle" value="{{$pubTable->title}}">
            </div>
            <div class="form-group">
                <label>Subject<code>*</code></label>
                <select class="form-control form-control-lg" id="subject_id" name="subject_id">
                    @foreach ($daftar_subject as $subject)
                        <option value="{{$subject->subject_id}}" {{$subject->subject_id==$pubTable->subject_id ? 'selected'  : ''}}>{{$subject->subject}}</option>
                    @endforeach
                </select>
            </div>

            <br>
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="PdfFileTable" name="PdfFileTable" >
                    <label class="custom-file-label" for="PdfFileTable">Update File </label>
                </div>
            </div>

            <div class="current-label">
             File Terpilih
            </div>
            <div class="pdf_file_placeholder">
              
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary btn-block">Submit</button>
        </div>
    </div>
</form>  


@else
<form action="{{route('admin.lainnya.store')}}" method="post"
    enctype="multipart/form-data" id="form_add_table">
    {{ csrf_field() }}
    <p class="text-muted">Menambah Tabel Baru</p>
    <div class="card">
        <div class="card-body">

            <div class="form-group">
                <label for="title">Judul Tabel<code>*</code></label>
                <input type="text" class="form-control" id="title" placeholder="..." id="tableTitle" name="tableTitle">
            </div>
            <div class="form-group">
                <label>Subject<code>*</code></label>
                <select class="form-control form-control-lg" id="subject_id" name="subject_id">
                    @foreach ($daftar_subject as $subject)
                        <option value="{{$subject->subject_id}}">{{$subject->subject}}</option>
                    @endforeach
                </select>
            </div>

            <br>
            <div class="form-group">
                <label for="inputHalamanLast">File <small class="text-sm text-muted">(format: *pdf )file</small></label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="PdfFileTable" name="PdfFileTable">
                    <label class="custom-file-label" for="PdfFileTable">Browse..</label>
                </div>
            </div>
            <div class="current-label">
                File Terpilih:
            </div>
            <br>
            <div class="pdf_file_placeholder">
              
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary btn-block" id="addTableSubmit" >Submit</button>
        </div>
    </div>
</form> 

@endif