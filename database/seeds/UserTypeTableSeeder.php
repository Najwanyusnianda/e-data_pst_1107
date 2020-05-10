<?php

use App\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $userType=['superadmin','admin','operator'];
        DB::table('user_types')->delete();

        foreach ($userType as $type) {
            UserType::create(array(
                'name'=>$type,
            ));

        }

    }

}
