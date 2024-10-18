<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'images' => 'products\\October2024\\yeI13GS0LComCfjaR3CS.png',
                'code' => '000001',
                'nombre' => 'Perfil de Netflix',
                'max_perfiles' => 5,
                'precio_suscripcion' => '25.00',
                'descripcion' => NULL,
                'created_at' => '2024-10-17 01:03:00',
                'updated_at' => '2024-10-18 01:23:11',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'images' => 'products\\October2024\\nFoTf4Dqowqn8pW7UN8n.png',
                'code' => '000002',
                'nombre' => 'Perfil de Prime Video',
                'max_perfiles' => 5,
                'precio_suscripcion' => '15.00',
                'descripcion' => NULL,
                'created_at' => '2024-10-17 01:03:00',
                'updated_at' => '2024-10-18 01:23:27',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'images' => 'products\\October2024\\PI2L3n8nH135bDTPabRd.png',
                'code' => '000003',
                'nombre' => 'Mas Tv un dispositivo',
                'max_perfiles' => 1,
                'precio_suscripcion' => '35.00',
                'descripcion' => NULL,
                'created_at' => '2024-10-17 01:05:00',
                'updated_at' => '2024-10-17 06:01:50',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'images' => 'products\\October2024\\NxkKeG7TTjkHjmtviwky.png',
                'code' => '000004',
                'nombre' => '1 Perfil de Flujo Tv',
                'max_perfiles' => 3,
                'precio_suscripcion' => '30.00',
                'descripcion' => 'Suscríbete al mejor precio del mercado.

Disfruta en 1 pantalla con más de 1000 canales de televisión globales y de cientos de películas y series en cualquier dispositivo Android. Compra o renueva Flujo TV oficial y accede a canales de entretenimiento variado, incluyendo contenido para adultos, anime, música y mucho más.',
                'created_at' => '2024-10-17 01:06:00',
                'updated_at' => '2024-10-18 18:54:00',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'images' => 'products\\October2024\\kG8VC2TvlcUbSoaRtIhK.png',
                'code' => '000005',
                'nombre' => 'Flujo Tv cuenta Completa',
                'max_perfiles' => 1,
                'precio_suscripcion' => '60.00',
                'descripcion' => 'Suscríbete al mejor precio del mercado.

Disfruta en 3 pantallas simultáneas de más de 1000 canales de televisión globales y de cientos de películas y series en cualquier dispositivo Android. Compra o renueva Flujo TV oficial y accede a canales de entretenimiento variado, incluyendo contenido para adultos, anime, música y mucho más.',
                'created_at' => '2024-10-17 01:07:00',
                'updated_at' => '2024-10-18 18:53:11',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'images' => 'products\\October2024\\cC0UaHlHF34ntApVcQYs.png',
                'code' => '000006',
                'nombre' => 'Mas Tv dos dispositivo',
                'max_perfiles' => 1,
                'precio_suscripcion' => '40.00',
                'descripcion' => NULL,
                'created_at' => '2024-10-17 01:08:00',
                'updated_at' => '2024-10-17 06:01:41',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'images' => 'products\\October2024\\hfsYBj4wTBKkSMufeJCH.png',
                'code' => '000007',
                'nombre' => 'Mas Tv tres dispositivo',
                'max_perfiles' => 1,
                'precio_suscripcion' => '50.00',
                'descripcion' => NULL,
                'created_at' => '2024-10-17 01:08:00',
                'updated_at' => '2024-10-17 06:01:28',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}