<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\PubTable;

class PubDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //
        DB::table('pub_tables')->delete();
        $json= File::get("database/json/pub_dda_2020_table.json");
        $data=json_decode($json);
        $dt=$data;
        foreach ($dt as $obj) {
            Publikasi::create(array(
                'pub_id'=> "befa1d8befa185c2ea101b75",
                'title'=>$obj->title,
                'bab_num'=>$obj->bab,
                'hal_pdf_first'=>$obj->dari_halaman,
                'hal_pdf_last'=>$obj->sampai_halaman,
                'subject'=>$obj->subject


            ));

        
        }
    }
}
