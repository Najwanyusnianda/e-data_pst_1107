<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PubTable extends Model
{
    //
    protected $fillable=['type','type_id','title','hal_pdf_first','hal_pdf_last','bab_num','subject_id'];
}
