<div class="card author-box card-primary">
    <div class="card-header">
        <span class="badge badge-info badge-sm">
           Update Terakhir: {{\Carbon\Carbon::parse($pub_detail->updated_at)
            ->diffForHumans()}}
        </span>
        <h4></h4>
        <!--<h4>
             Detail Publikasi

        </h4>-->

        <div class="card-header-action">
            <!--<a href="#" class="btn btn-primary">View All</a>-->
        <a href="{{route('admin.publikasi_updateIndex',['pub_id'=>$pub_detail->pub_id])}}" class="btn btn-warning ml-auto">
          Update Publikasi
        </a>
          </div>
    </div>
    <div class="card-body">
      <div class="author-box-left">
        <img alt="image" src="{{$pub_detail->cover}}" class="rounded img-thumbnail author-box-picture">
        <div class="clearfix"></div>

        <a href="#" class="btn btn-primary mt-3 ">Download</a>
      </div>
      <div class="author-box-details">
        <div class="author-box-name">
          <a href="#">{{$pub_detail->title}}</a>
        </div>
        <div class="author-box-job">
            <span class="text text-muted">(Id :{{$pub_detail->pub_id}})</span>
            @if (!empty($pub_detail->issn))
            <span class="text text-muted">(ISSN: {{$pub_detail->issn}})</span>
            @else
            <span  class="text text-muted">( ISSN: - )</span>
            @endif
        
        </div>
        <div class="author-box-description">
          <p>{{$pub_detail->abstract}}</p>
        </div>
       <!-- <div class="mb-2 mt-3"><div class="text-small font-weight-bold">Follow Hasan On</div></div>
        <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#" class="btn btn-social-icon mr-1 btn-github">
          <i class="fab fa-github"></i>
        </a>
        <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
          <i class="fab fa-instagram"></i>
        </a>-->
     
        <table class="table table-sm">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>

            </thead>
            <tbody>
                <tr>
                    <td width=40%>No. Publikasi</td>
                    <td width=10%>:</td>
                    <td>{{$pub_detail->pub_no }}</td>
                </tr>
                <tr>
                    <td width=40%>No. Kategori</td>
                    <td width=10%>:</td>
                    <td>{{$pub_detail->kat_no }}</td>
                </tr>
                <tr>
                    <td width=40%>Size</td>
                    <td width=10%>:</td>
                    <td>
                        @if (!empty($pub_detail->size))
                        {{$pub_detail->size}}
                        @else
                        <span  class="text text-muted"> Tidak diketahui</span>
                        @endif
                    </td>

          
                </tr>
                <tr>
                    <td width=40%>Tanggal Rilis</td>
                    <td width=10%>:</td>
                    <td>
                        @if (!empty($pub_detail->issn))
                        {{\Carbon\Carbon::parse($pub_detail->release_date)->format('j F, Y')}}
                        @else
                        <span class="text text-muted" > Tidak diketahui</span>
                        @endif
                    </td>

          
                </tr>
<tr>   
               <td width=40%>Jumlah Bab</td>
  <td width=10%>:</td>
  <td>
      @if (!empty($pub_detail->n_bab))
      {{$pub_detail->n_bab}}
      @else
      <span class="text text-muted" > Tidak diketahui</span>
      @endif
  </td></tr>
<tr>
  <td width=40%>Jumlah Tabel</td>
  <td width=10%>:</td>
  <td>
      @if (count($pub_table)>0)
      {{count($pub_table)}}
      @else
      <span class="text text-muted" > Belum ditambahkan</span>
      @endif
  </td>
</tr>

            </tbody>
        </table>
        <div class="w-100 d-sm-none"></div>
        <div class="float-right mt-sm-0 mt-3">
          <a href="#" class="btn">View Posts <i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
    </div>
  </div>