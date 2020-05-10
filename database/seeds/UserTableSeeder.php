<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();

        User::create([
            'name'=>'superadmin',
            'email' => 'superadmin@gmail.com',
            'typeId'=>1,
            'password' => Hash::make('password'),
        ]);
        
    }
}
