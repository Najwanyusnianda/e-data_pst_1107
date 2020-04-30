<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PubTable extends Model
{
    //
    protected $fillable=['pub_id','title','hal_pdf_first','hal_pdf_last','pdf','bab_num'];
}
