<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publikasi extends Model
{
    //
    protected $primaryKey = 'pub_id';
    public $incrementing = false;

    protected $fillable=['pub_id','title','issn','release_date','update_date','size','cover','pdf'];
}
