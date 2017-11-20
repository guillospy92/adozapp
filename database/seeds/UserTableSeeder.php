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
                'email'     => 'Admin@gmail.com',
                'password'  => \Hash::make('laravel'),
                'telefono'      => '3245565',
                'direccion'     => 'barranquilla calle 49B #2-36',
                'tipo'      => 'Admin',
                'estado'    => 'A',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],


        );

        User::insert($data);
    }
}
