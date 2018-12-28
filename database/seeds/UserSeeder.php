<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert(array(
            'name' => "Alejandro",
            'last_name' => "Mateus",
            'password' => Hash::make("123456789"),
            'company' => "Geometry",
            'email' => "alejo.mateus.ud@gmail.com",
            'position' => "developer",
            'address' => "Calle Falsa # 123",
            'city' => "Bogota",
            'phone' => "3203203202",
            'role' => "admin",

        ));
    }
}
