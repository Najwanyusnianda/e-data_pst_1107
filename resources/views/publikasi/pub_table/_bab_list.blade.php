<div class="card card-primary">
    <div class="card-header">
        <h4></h4>
        <div class="card-header-action">
            <div class="form-group">
                <select class="form-control" id="select_bab">
                    <option selected="selected" disabled>Pilih Bab Publikasi</option>
                    @if (!empty($pub_detail->n_bab))
                        @for($i = 0; $i < $pub_detail->n_bab ; $i++)
                            <option value="{{$i+1}}">Bab {{$i+1}}</option>

                        @endfor
                        @else

                    @endif
                </select>
            </div>
        </div>
    </div>
    <div class="card-body" id="table_list_wrapper">
        @if (!empty($pub_detail->n_bab))
        <div class="table-responsive" id="table-by-bab-wrapper">

        </div>
        @else
        <div class="table-responsive" id="table-by-bab-wrapper">

        </div>
        @endif
    </div>
</div>


<script>

</script>