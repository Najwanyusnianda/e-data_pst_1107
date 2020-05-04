<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectTable extends Model
{
    //
    protected $primaryKey = 'subject_id';
    public $incrementing = false;

    protected $fillable=['subject_id','subject'];
}
