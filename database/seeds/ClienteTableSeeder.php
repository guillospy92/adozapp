<?php

use Illuminate\Database\Seeder;
use App\Cliente;

class ClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'nombre' => 'coomeva',
                'estado'  => 1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

              [
                'nombre' => 'saludcop',
                'estado'  => 1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

              [
                'nombre' => 'sanitas',
                'estado'  => 1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

              [
                'nombre' => 'aliansalud',
                'estado'  => 1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

              
                

        );

        Cliente::insert($data);
    }
}
