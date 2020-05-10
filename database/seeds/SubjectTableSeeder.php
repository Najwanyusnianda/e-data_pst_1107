<?php

use Illuminate\Database\Seeder;
use App\SubjectTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('subject_tables')->delete();
        $json= File::get("database/json/subject_list.json");
        $data=json_decode($json);
        $dt=$data;
        foreach ($dt as $obj) {
            SubjectTable::create(array(
                'subject_id'=>$obj->id,
                'subject'=>$obj->subject,
                'subject_group_id'=>$obj->id_subject_group
            ));

        }
    }
}
