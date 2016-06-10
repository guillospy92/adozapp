<?php

use Illuminate\Database\Seeder;
use App\Mouth;

class MouthTableSeeder extends Seeder
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
                'nombre' => 'enero',
                'estado'  => 1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

              [
                'nombre' => 'febrero',
                'estado'  => 1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

              [
                'nombre' => 'marzo',
                'estado'  => 1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

              [
                'nombre' => 'abril',
                'estado'  => 1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

             [
                'nombre' => 'mayo',
                'estado'  => 1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

             [
                'nombre' => 'junio',
                'estado'  => 1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

             [
                'nombre' => 'julio',
                'estado'  => 1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

             [
                'nombre' => 'agosto',
                'estado'  => 1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

             [
                'nombre' => 'septiembre',
                'estado'  => 1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

             [
                'nombre' => 'octubre',
                'estado'  => 1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

             [
                'nombre' => 'noviembre',
                'estado'  => 1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

             [
                'nombre' => 'diciembre',
                'estado'  => 1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],


              
                

        );

        Mouth::insert($data);
    }
}
