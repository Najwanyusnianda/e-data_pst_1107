<div class="card ">
    <div class="card-header">
        <h5>{{$pub_detail->title}}</h5>   
    </div>
    <div class="card-body">
        <div class="media">
            <img class="mr-3 img-thumbnail border-dark" src="{{$pub_detail->cover}}" alt="cover" >
            <div class="media-body">
                <div class="table-responsive ">
                    <table class="table table-borderless" style="font-size:smaller"
                        id="detailPublikasi">
                        <thead>
                            <tr>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width=40%>ID Publikasi</td>
                                <td width=10%>:</td>
                                <td>{{$pub_detail->pub_id }}</td>
                            </tr>
                            <tr>
                                <td width=40%>ISSN</td>
                                <td width=10%>:</td>
                                <td>{{$pub_detail->issn }}</td>
                            </tr>
                            <tr>
                                <td width=40%>Tanggal Rilis</td>
                                <td width=10%>:</td>
                                <td>{{\Carbon\Carbon::parse($pub_detail->release_date)->format('j F, Y')}}
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Update</td>
                                <td>:</td>
                                <td>{{\Carbon\Carbon::parse($pub_detail->update_date)->format('j F, Y')}}
                                </td>
                            </tr>
                            <tr>


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
                                    </div>

                                </td>




                                @else
                                <div class="n_bab_container">
                                    <span class="badge badge-danger">Belum Diinput</span>
                                </div>
                                <div class="n_bab_form_container" style="display:none">

                                    <input type="text" class="form-control" id="n_bab" name="n_bab">

                                   
                                </div>
                                @endif

                                <td>
                                    @if (!empty($pub_detail->n_bab))
                                    <div class="n_bab_container">
                                        <a href="#" id="inputHalBtn"
                                            class="btn btn-icon icon-left btn-warning ">
                                            <i class="fas fa-edit btn-sm"></i>
                                            Edit

                                        </a>
                                    </div>
                                    <div class="n_bab_form_container" style="display:none">
                                        <a href="#" id="submitHalBtn" class="btn btn-primary">
                                            Submit

                                        </a>
                                    </div>

                                    @else

                                    <div class="n_bab_container">
                                        <a href="#" id="inputHalBtn"
                                            class="btn btn-icon icon-left btn-warning ">
                                            <i class="fas fa-edit btn-sm"></i> Edit

                                        </a>
                                    </div>
                                    <div class="n_bab_form_container" style="display:none">
                                        <button id="submitHalBtn" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                    @endif

                                </td>




                            </tr>
                            <!--<tr>
                                <td><strong>Abstrak :</strong> </td>
                                <td></td>
                                <td>
                                </td>
                            </tr>-->
                            <tr>

                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>.</td>
                            </tr>
                            
                            <tr class="">
                                <td colspan="4">
                                    <div class="alert alert-info">
                                       <span class="" style="font-size:13px;">{{$pub_detail->abstract}}</span> 
                                    </div>
                                    </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
           </div>
          </div>


    </div>
</div>