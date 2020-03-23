<form action="{{route('admin.pubTable_create',['pub_id'=>$pub_detail->pub_id])}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <p class="text-muted">Menambah Daftar Tabel Baru Untuk Publikasi</p>
    <div class="card">
        <div class="card-body">

            <div class="form-group">
                <label for="title">Judul Tabel</label>
                <input type="text" class="form-control" id="title"
                    placeholder="..." id="tableTitle" name="tableTitle">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputHalamanFirst">Dari Halaman</label>
                    <input type="number" class="form-control" id="inputHalamanFirst" placeholder="Halaman awal tabel" name="hal_pdf_first">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputHalamanLast">Sampai Halaman</label>
                    <input type="number" class="form-control" id="inputHalamanLast"
                        placeholder="Halaman Akhir tabel" name="hal_pdf_last">
                </div>
            </div>
<br>
            <div class="form-group">
                <div class="custom-file">
                
                    <input type="file" class="custom-file-input" id="PdfFileTable" name="PdfFileTable">
                    <label class="custom-file-label" for="PdfFileTable">Pilih File</label>
                  </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary btn-block">Submit</button>
        </div>
    </div>
</form>