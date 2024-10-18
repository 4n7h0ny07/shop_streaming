<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DataTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('data_types')->delete();
        
        \DB::table('data_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'users',
                'slug' => 'users',
                'display_name_singular' => 'User',
                'display_name_plural' => 'Users',
                'icon' => 'voyager-person',
                'model_name' => 'TCG\\Voyager\\Models\\User',
                'policy_name' => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'menus',
                'slug' => 'menus',
                'display_name_singular' => 'Menu',
                'display_name_plural' => 'Menus',
                'icon' => 'voyager-list',
                'model_name' => 'TCG\\Voyager\\Models\\Menu',
                'policy_name' => NULL,
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'roles',
                'slug' => 'roles',
                'display_name_singular' => 'Role',
                'display_name_plural' => 'Roles',
                'icon' => 'voyager-lock',
                'model_name' => 'TCG\\Voyager\\Models\\Role',
                'policy_name' => NULL,
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'transactions',
                'slug' => 'transactions',
                'display_name_singular' => 'Transaccion',
                'display_name_plural' => 'Transacciones',
                'icon' => 'voyager-ticket',
                'model_name' => 'App\\Models\\transaction',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2024-10-16 16:52:54',
                'updated_at' => '2024-10-16 16:58:47',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'products',
                'slug' => 'products',
                'display_name_singular' => 'Product',
                'display_name_plural' => 'Products',
                'icon' => 'voyager-laptop',
                'model_name' => 'App\\Models\\Product',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2024-10-16 23:38:27',
                'updated_at' => '2024-10-18 18:55:32',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'cuentas',
                'slug' => 'cuentas',
                'display_name_singular' => 'Cuenta',
                'display_name_plural' => 'Cuentas',
                'icon' => 'voyager-youtube-play',
                'model_name' => 'App\\Models\\Cuentas',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2024-10-16 23:50:50',
                'updated_at' => '2024-10-17 01:25:55',
            ),
            6 => 
            array (
                'id' => 8,
                'name' => 'perfiles',
                'slug' => 'perfiles',
                'display_name_singular' => 'Perfile',
                'display_name_plural' => 'Perfiles',
                'icon' => 'voyager-tv',
                'model_name' => 'App\\Models\\Perfiles',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2024-10-16 23:57:27',
                'updated_at' => '2024-10-17 01:49:21',
            ),
            7 => 
            array (
                'id' => 9,
                'name' => 'suscripcions',
                'slug' => 'suscripcions',
                'display_name_singular' => 'Suscripcion',
                'display_name_plural' => 'Suscripcions',
                'icon' => 'voyager-credit-card',
                'model_name' => 'App\\Models\\Suscripcion',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}',
                'created_at' => '2024-10-17 00:01:08',
                'updated_at' => '2024-10-17 00:01:08',
            ),
        ));
        
        
    }
}