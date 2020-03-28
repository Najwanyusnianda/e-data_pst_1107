<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Publikasi;


class PublikasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kegiatan_pengadaans')->delete();
        $json= File::get("database/data/kegiatan_pengadaan.json");
        $data=json_decode($json);
        $dt=$data->data[1];
        foreach ($dt as $obj) {
            Publikasi::create(array(
                'pub_id'=> $obj->pub_id,
                'title'=>$obj->title,  
                'issn'=>$obj->issn,
                'release_date'=>$obj->rl_date,
                'update_date'=>$obj->updt_date,
                'size'=>$obj->size,
                'cover'=>$obj->cover,
                'pdf'=>$obj->pdf,
                'isTableComplete'=>0           
            ));

        
        }
    }
}
