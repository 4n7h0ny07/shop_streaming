<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu_items')->delete();
        
        \DB::table('menu_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'menu_id' => 1,
                'title' => 'Dashboard',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-boat',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 1,
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-16 16:47:00',
                'route' => 'voyager.dashboard',
                'parameters' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'menu_id' => 1,
                'title' => 'Media',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-images',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 5,
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-17 04:30:28',
                'route' => 'voyager.media.index',
                'parameters' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'menu_id' => 1,
                'title' => 'Users',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-person',
                'color' => NULL,
                'parent_id' => 20,
                'order' => 1,
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-17 04:31:07',
                'route' => 'voyager.users.index',
                'parameters' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'menu_id' => 1,
                'title' => 'Roles',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-lock',
                'color' => NULL,
                'parent_id' => 20,
                'order' => 2,
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-17 04:31:08',
                'route' => 'voyager.roles.index',
                'parameters' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'menu_id' => 1,
                'title' => 'Tools',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-tools',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 6,
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-17 04:31:08',
                'route' => NULL,
                'parameters' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'menu_id' => 1,
                'title' => 'Menu Builder',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-list',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 1,
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-17 04:27:03',
                'route' => 'voyager.menus.index',
                'parameters' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'menu_id' => 1,
                'title' => 'Database',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-data',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 2,
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-17 04:27:03',
                'route' => 'voyager.database.index',
                'parameters' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'menu_id' => 1,
                'title' => 'Compass',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-compass',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 3,
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-17 04:27:03',
                'route' => 'voyager.compass.index',
                'parameters' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'menu_id' => 1,
                'title' => 'BREAD',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-bread',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 4,
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-17 04:27:03',
                'route' => 'voyager.bread.index',
                'parameters' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'menu_id' => 1,
                'title' => 'Configuracion',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-settings',
                'color' => '#000000',
                'parent_id' => 20,
                'order' => 3,
                'created_at' => '2024-10-16 16:47:00',
                'updated_at' => '2024-10-17 04:31:31',
                'route' => 'voyager.settings.index',
                'parameters' => 'null',
            ),
            10 => 
            array (
                'id' => 11,
                'menu_id' => 1,
                'title' => 'Transacciones',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-ticket',
                'color' => NULL,
                'parent_id' => 19,
                'order' => 3,
                'created_at' => '2024-10-16 16:52:54',
                'updated_at' => '2024-10-18 03:27:17',
                'route' => 'voyager.transactions.index',
                'parameters' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'menu_id' => 1,
                'title' => 'Billetera',
                'url' => 'admin/wallet/show',
                'target' => '_self',
                'icon_class' => 'voyager-wallet',
                'color' => '#000000',
                'parent_id' => 19,
                'order' => 1,
                'created_at' => '2024-10-16 16:55:22',
                'updated_at' => '2024-10-18 03:28:33',
                'route' => NULL,
                'parameters' => '',
            ),
            12 => 
            array (
                'id' => 13,
                'menu_id' => 1,
                'title' => 'Products',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-laptop',
                'color' => NULL,
                'parent_id' => 18,
                'order' => 1,
                'created_at' => '2024-10-16 23:38:27',
                'updated_at' => '2024-10-17 04:27:06',
                'route' => 'voyager.products.index',
                'parameters' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'menu_id' => 1,
                'title' => 'Cuentas',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-youtube-play',
                'color' => NULL,
                'parent_id' => 18,
                'order' => 2,
                'created_at' => '2024-10-16 23:50:50',
                'updated_at' => '2024-10-17 04:27:09',
                'route' => 'voyager.cuentas.index',
                'parameters' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'menu_id' => 1,
                'title' => 'Perfiles',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-tv',
                'color' => NULL,
                'parent_id' => 18,
                'order' => 3,
                'created_at' => '2024-10-16 23:57:27',
                'updated_at' => '2024-10-17 04:27:15',
                'route' => 'voyager.perfiles.index',
                'parameters' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'menu_id' => 1,
                'title' => 'Suscripcions',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-credit-card',
                'color' => NULL,
                'parent_id' => 18,
                'order' => 4,
                'created_at' => '2024-10-17 00:01:08',
                'updated_at' => '2024-10-17 04:27:22',
                'route' => 'voyager.suscripcions.index',
                'parameters' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'menu_id' => 1,
                'title' => 'Shopping',
                'url' => 'admin/shopping',
                'target' => '_self',
                'icon_class' => 'voyager-bag',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 2,
                'created_at' => '2024-10-17 04:26:08',
                'updated_at' => '2024-10-17 04:30:21',
                'route' => NULL,
                'parameters' => '',
            ),
            17 => 
            array (
                'id' => 18,
                'menu_id' => 1,
                'title' => 'Parametros',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-categories',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 3,
                'created_at' => '2024-10-17 04:26:54',
                'updated_at' => '2024-10-17 04:30:21',
                'route' => NULL,
                'parameters' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'menu_id' => 1,
                'title' => 'Historial',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-receipt',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 4,
                'created_at' => '2024-10-17 04:29:45',
                'updated_at' => '2024-10-18 03:20:48',
                'route' => NULL,
                'parameters' => '',
            ),
            19 => 
            array (
                'id' => 20,
                'menu_id' => 1,
                'title' => 'Seguridad',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-lock',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 5,
                'created_at' => '2024-10-17 04:30:54',
                'updated_at' => '2024-10-17 04:31:03',
                'route' => NULL,
                'parameters' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'menu_id' => 1,
                'title' => 'Compras',
                'url' => 'admin/wallet',
                'target' => '_self',
                'icon_class' => 'voyager-archive',
                'color' => '#000000',
                'parent_id' => 19,
                'order' => 2,
                'created_at' => '2024-10-18 03:27:10',
                'updated_at' => '2024-10-18 03:27:17',
                'route' => NULL,
                'parameters' => '',
            ),
        ));
        
        
    }
}