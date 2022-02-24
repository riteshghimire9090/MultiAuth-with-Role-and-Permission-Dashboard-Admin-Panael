<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0;$i <100;$i++){
            DB::table('users')->insert([
                'name' => 'User1'.$i,
                'email' => $i.'user1@email.com',
                'gender_id' => rand(1,2),
                'avatar' => "avatar.png",
                'password' => bcrypt('password'),
            ]);

        }

    }


}
