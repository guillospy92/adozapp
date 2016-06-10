<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('users')->delete();
        $data = array(
            [
                'nombres'       => 'guillermo elias',
                'apellidos' => 'romo noriega',
                'username'      => 'guillospy',
                'email'     => 'guillospy@gmail.com',
                'password'  => \Hash::make('laravel'),
                'telefono'      => '3245565',
                'direccion'     => 'barranquilla calle 49B #2-36',
                'tipo'      => 'Direccion Administrativa',
                'estado'    => 'A',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],
                 [
                'nombres'       => 'jesus david',
                'apellidos' => 'romo noriega',
                'username'      => 'jesus',
                'email'     => 'jesus@gmail.com',
                'password'  => \Hash::make('laravel'),
                'telefono'      => '3245565',
                'direccion'     => 'barranquilla calle 49B #2-36',
                'tipo'      => 'Gerencia General',
                'estado'    => 'A',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

                   [
                'nombres'       => 'joel',
                'apellidos' => 'andrade',
                'username'      => 'joel',
                'email'     => 'joel@gmail.com',
                'password'  => \Hash::make('laravel'),
                'telefono'      => '3245565',
                'direccion'     => 'barranquilla calle 49B #2-36',
                'tipo'      => 'Direccion Administrativa',
                'estado'    => 'A',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

                   [
                'nombres'       => 'luis andres',
                'apellidos' => 'cantillo fontalvo',
                'username'      => 'luis_fonsi',
                'email'     => 'luis@gmail.com',
                'password'  => \Hash::make('laravel'),
                'telefono'      => '3245565',
                'direccion'     => 'barranquilla calle 49B #2-36',
                'tipo'      => 'Direccion Administrativa',
                'estado'    => 'A',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

                   [
                'nombres'       => 'alexander jose',
                'apellidos' => 'perez fontalvo',
                'username'      => 'alexander',
                'email'     => 'alexander@gmail.com',
                'password'  => \Hash::make('laravel'),
                'telefono'      => '3245565',
                'direccion'     => 'barranquilla calle 49B #2-36',
                'tipo'      => 'Direccion Medica',
                'estado'    => 'A',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

                   [
                'nombres'       => 'linda luz',
                'apellidos' => 'baquero fontalvo',
                'username'      => 'linda',
                'email'     => 'linda@gmail.com',
                'password'  => \Hash::make('laravel'),
                'telefono'      => '3245565',
                'direccion'     => 'barranquilla calle 49B #2-36',
                'tipo'      => 'Direccion Medica',
                'estado'    => 'A',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

                   [
                'nombres'       => 'omar andres',
                'apellidos' => 'herrera miranda',
                'username'      => 'omar',
                'email'     => 'omar@gmail.com',
                'password'  => \Hash::make('laravel'),
                'telefono'      => '3245565',
                'direccion'     => 'barranquilla calle 49B #2-36',
                'tipo'      => 'Direccion Medica', 
                'estado'    => 'A',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

        );

        User::insert($data);
    }
}
