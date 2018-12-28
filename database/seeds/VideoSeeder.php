<?php

use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('videos')->insert(array(
            'name' => "Video 1",
            'url'  => "http://localhost/geometryapi/public/files/Credenciales Digitales Geometry Global Colombia.mp4",
        ));
        \DB::table('videos')->insert(array(
            'name' => "Video 2",
            'url'  => "http://localhost/geometryapi/public/files/Credenciales Geometry Global Colombia 2017.mp4",
        ));
        \DB::table('videos')->insert(array(
            'name' => "Video 3",
            'url'  => "http://localhost/geometryapi/public/files/Credenciales Geometry Global Colombia.mp4",
        ));
        \DB::table('videos')->insert(array(
            'name' => "Video 4",
            'url'  => "http://localhost/geometryapi/public/files/Presidente de Geometry Global destaca perfil de los publicistas internacionales de La Sergio.mp4",
        ));
        \DB::table('videos')->insert(array(
            'name' => "Video 5",
            'url'  => "http://localhost/geometryapi/public/files/SEX GUARDIÁN realizado por Geometry Global.mp4",
        ));
    }
}
