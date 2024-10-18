<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'browse_admin',
                'table_name' => NULL,
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'browse_bread',
                'table_name' => NULL,
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'browse_database',
                'table_name' => NULL,
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'browse_media',
                'table_name' => NULL,
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'browse_compass',
                'table_name' => NULL,
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'browse_menus',
                'table_name' => 'menus',
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'read_menus',
                'table_name' => 'menus',
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'edit_menus',
                'table_name' => 'menus',
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'add_menus',
                'table_name' => 'menus',
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'delete_menus',
                'table_name' => 'menus',
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'browse_roles',
                'table_name' => 'roles',
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'read_roles',
                'table_name' => 'roles',
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'edit_roles',
                'table_name' => 'roles',
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'add_roles',
                'table_name' => 'roles',
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'delete_roles',
                'table_name' => 'roles',
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            15 => 
            array (
                'id' => 16,
                'key' => 'browse_users',
                'table_name' => 'users',
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            16 => 
            array (
                'id' => 17,
                'key' => 'read_users',
                'table_name' => 'users',
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            17 => 
            array (
                'id' => 18,
                'key' => 'edit_users',
                'table_name' => 'users',
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            18 => 
            array (
                'id' => 19,
                'key' => 'add_users',
                'table_name' => 'users',
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            19 => 
            array (
                'id' => 20,
                'key' => 'delete_users',
                'table_name' => 'users',
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            20 => 
            array (
                'id' => 21,
                'key' => 'browse_settings',
                'table_name' => 'settings',
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            21 => 
            array (
                'id' => 22,
                'key' => 'read_settings',
                'table_name' => 'settings',
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            22 => 
            array (
                'id' => 23,
                'key' => 'edit_settings',
                'table_name' => 'settings',
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            23 => 
            array (
                'id' => 24,
                'key' => 'add_settings',
                'table_name' => 'settings',
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            24 => 
            array (
                'id' => 25,
                'key' => 'delete_settings',
                'table_name' => 'settings',
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            25 => 
            array (
                'id' => 26,
                'key' => 'browse_transactions',
                'table_name' => 'transactions',
                'created_at' => '2024-10-16 16:52:54',
                'updated_at' => '2024-10-16 16:52:54',
            ),
            26 => 
            array (
                'id' => 27,
                'key' => 'read_transactions',
                'table_name' => 'transactions',
                'created_at' => '2024-10-16 16:52:54',
                'updated_at' => '2024-10-16 16:52:54',
            ),
            27 => 
            array (
                'id' => 28,
                'key' => 'edit_transactions',
                'table_name' => 'transactions',
                'created_at' => '2024-10-16 16:52:54',
                'updated_at' => '2024-10-16 16:52:54',
            ),
            28 => 
            array (
                'id' => 29,
                'key' => 'add_transactions',
                'table_name' => 'transactions',
                'created_at' => '2024-10-16 16:52:54',
                'updated_at' => '2024-10-16 16:52:54',
            ),
            29 => 
            array (
                'id' => 30,
                'key' => 'delete_transactions',
                'table_name' => 'transactions',
                'created_at' => '2024-10-16 16:52:54',
                'updated_at' => '2024-10-16 16:52:54',
            ),
            30 => 
            array (
                'id' => 31,
                'key' => 'browse_products',
                'table_name' => 'products',
                'created_at' => '2024-10-16 23:38:27',
                'updated_at' => '2024-10-16 23:38:27',
            ),
            31 => 
            array (
                'id' => 32,
                'key' => 'read_products',
                'table_name' => 'products',
                'created_at' => '2024-10-16 23:38:27',
                'updated_at' => '2024-10-16 23:38:27',
            ),
            32 => 
            array (
                'id' => 33,
                'key' => 'edit_products',
                'table_name' => 'products',
                'created_at' => '2024-10-16 23:38:27',
                'updated_at' => '2024-10-16 23:38:27',
            ),
            33 => 
            array (
                'id' => 34,
                'key' => 'add_products',
                'table_name' => 'products',
                'created_at' => '2024-10-16 23:38:27',
                'updated_at' => '2024-10-16 23:38:27',
            ),
            34 => 
            array (
                'id' => 35,
                'key' => 'delete_products',
                'table_name' => 'products',
                'created_at' => '2024-10-16 23:38:27',
                'updated_at' => '2024-10-16 23:38:27',
            ),
            35 => 
            array (
                'id' => 36,
                'key' => 'browse_cuentas',
                'table_name' => 'cuentas',
                'created_at' => '2024-10-16 23:50:50',
                'updated_at' => '2024-10-16 23:50:50',
            ),
            36 => 
            array (
                'id' => 37,
                'key' => 'read_cuentas',
                'table_name' => 'cuentas',
                'created_at' => '2024-10-16 23:50:50',
                'updated_at' => '2024-10-16 23:50:50',
            ),
            37 => 
            array (
                'id' => 38,
                'key' => 'edit_cuentas',
                'table_name' => 'cuentas',
                'created_at' => '2024-10-16 23:50:50',
                'updated_at' => '2024-10-16 23:50:50',
            ),
            38 => 
            array (
                'id' => 39,
                'key' => 'add_cuentas',
                'table_name' => 'cuentas',
                'created_at' => '2024-10-16 23:50:50',
                'updated_at' => '2024-10-16 23:50:50',
            ),
            39 => 
            array (
                'id' => 40,
                'key' => 'delete_cuentas',
                'table_name' => 'cuentas',
                'created_at' => '2024-10-16 23:50:50',
                'updated_at' => '2024-10-16 23:50:50',
            ),
            40 => 
            array (
                'id' => 41,
                'key' => 'browse_perfiles',
                'table_name' => 'perfiles',
                'created_at' => '2024-10-16 23:57:27',
                'updated_at' => '2024-10-16 23:57:27',
            ),
            41 => 
            array (
                'id' => 42,
                'key' => 'read_perfiles',
                'table_name' => 'perfiles',
                'created_at' => '2024-10-16 23:57:27',
                'updated_at' => '2024-10-16 23:57:27',
            ),
            42 => 
            array (
                'id' => 43,
                'key' => 'edit_perfiles',
                'table_name' => 'perfiles',
                'created_at' => '2024-10-16 23:57:27',
                'updated_at' => '2024-10-16 23:57:27',
            ),
            43 => 
            array (
                'id' => 44,
                'key' => 'add_perfiles',
                'table_name' => 'perfiles',
                'created_at' => '2024-10-16 23:57:27',
                'updated_at' => '2024-10-16 23:57:27',
            ),
            44 => 
            array (
                'id' => 45,
                'key' => 'delete_perfiles',
                'table_name' => 'perfiles',
                'created_at' => '2024-10-16 23:57:27',
                'updated_at' => '2024-10-16 23:57:27',
            ),
            45 => 
            array (
                'id' => 46,
                'key' => 'browse_suscripcions',
                'table_name' => 'suscripcions',
                'created_at' => '2024-10-17 00:01:08',
                'updated_at' => '2024-10-17 00:01:08',
            ),
            46 => 
            array (
                'id' => 47,
                'key' => 'read_suscripcions',
                'table_name' => 'suscripcions',
                'created_at' => '2024-10-17 00:01:08',
                'updated_at' => '2024-10-17 00:01:08',
            ),
            47 => 
            array (
                'id' => 48,
                'key' => 'edit_suscripcions',
                'table_name' => 'suscripcions',
                'created_at' => '2024-10-17 00:01:08',
                'updated_at' => '2024-10-17 00:01:08',
            ),
            48 => 
            array (
                'id' => 49,
                'key' => 'add_suscripcions',
                'table_name' => 'suscripcions',
                'created_at' => '2024-10-17 00:01:08',
                'updated_at' => '2024-10-17 00:01:08',
            ),
            49 => 
            array (
                'id' => 50,
                'key' => 'delete_suscripcions',
                'table_name' => 'suscripcions',
                'created_at' => '2024-10-17 00:01:08',
                'updated_at' => '2024-10-17 00:01:08',
            ),
        ));
        
        
    }
}