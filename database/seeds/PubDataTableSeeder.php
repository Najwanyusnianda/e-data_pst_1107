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
           
            PubTable::create(array(
                'type'=>"publikasi",
                'type_id'=>"6c00e3f71268959e0222c69f",
                'title'=>$obj->judul_table,
                'bab_num'=>$obj->bab,
                'hal_pdf_first'=>$obj->dari_halaman,
                'hal_pdf_last'=>$obj->sampai_halaman,
                'subject_id'=>$obj->subject_id
            ));

        }


        $json= File::get("database/json/pub_dda_2019_table.json");
        $data=json_decode($json);
        
        $dt=$data;
        foreach ($dt as $obj) {
           
            PubTable::create(array(
                'type'=>"publikasi",
                'type_id'=>"6c00e3f71268959e0222c69f",
                'title'=>$obj->judul_table,
                'bab_num'=>$obj->bab,
                'hal_pdf_first'=>$obj->dari_halaman,
                'hal_pdf_last'=>$obj->sampai_halaman,
                'subject_id'=>$obj->subject_id
            ));

        }

        $json= File::get("database/json/pub_dda_2018_table.json");
        $data=json_decode($json);
        
        $dt=$data;
        foreach ($dt as $obj) {
           
            PubTable::create(array(
                'type'=>"publikasi",
                'type_id'=>"6c00e3f71268959e0222c69f",
                'title'=>$obj->judul_table,
                'bab_num'=>$obj->bab,
                'hal_pdf_first'=>$obj->dari_halaman,
                'hal_pdf_last'=>$obj->sampai_halaman,
                'subject_id'=>$obj->subject_id
            ));

        }

        $json= File::get("database/json/pub_dda_2017_table.json");
        $data=json_decode($json);
        
        $dt=$data;
        foreach ($dt as $obj) {
           
            PubTable::create(array(
                'type'=>"publikasi",
                'type_id'=>"6c00e3f71268959e0222c69f",
                'title'=>$obj->judul_table,
                'bab_num'=>$obj->bab,
                'hal_pdf_first'=>$obj->dari_halaman,
                'hal_pdf_last'=>$obj->sampai_halaman,
                'subject_id'=>$obj->subject_id
            ));

        }
        
        /*for ($i=0; $i <5 ; $i++) { 
            # code...
            PubTable::create(array(
                'type'=>"publikasi",
                'type_id'=>"befa1d8befa185c2ea101b75",
                'title'=>"obj->judul_table",
                'bab_num'=>2,
                'hal_pdf_first'=>2,
                'hal_pdf_last'=>3,
                'subject_id'=>12
            ));
        }*/
    }
}
