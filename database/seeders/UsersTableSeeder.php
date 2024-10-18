<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'Farid Antonio Rea Zelada',
                'email' => 'admin@admin.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$12$5x7BEjo3U0dhcW2H07lmiezrGxpWZXqpDUs86rvhcdIvL0mbHlQ7i',
                'remember_token' => NULL,
                'settings' => '{"locale":"es"}',
                'created_at' => '2024-10-16 16:47:58',
                'updated_at' => '2024-10-16 16:55:33',
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 2,
                'name' => 'Walter Camama Menacho',
                'email' => 'sistemas@moxos.com.bo',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$12$842Ms5c13TfrmePBowT3Tex6wXy2VDW5rY2iEiHClrJKNqJG.g1kS',
                'remember_token' => NULL,
                'settings' => '{"locale":"es"}',
                'created_at' => '2024-10-18 00:08:43',
                'updated_at' => '2024-10-18 00:08:43',
            ),
        ));
        
        
    }
}