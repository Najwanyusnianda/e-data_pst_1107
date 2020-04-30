<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PubTableFiles extends Model
{
    //
    protected $fillable=['pub_table_id','filename','type','filepath'];
}
