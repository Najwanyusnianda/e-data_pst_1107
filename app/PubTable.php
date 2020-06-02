<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class PubTable extends Model
{
    use Searchable;
    //


    protected $fillable=['type','type_id','title','hal_pdf_first','hal_pdf_last','bab_num','subject_id','pdf'];

    public function searchableAs()
    {
        return 'pubTables_index';
    }
}
