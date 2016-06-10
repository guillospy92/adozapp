<?php

use Illuminate\Database\Seeder;
use App\Ano;

class AnoTableSeeder extends Seeder
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
                'nombre' => '2015',
                'estado'  => 1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

              [
                'nombres' => '2016',
                'estado'  => 1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],
                

        );

        Ano::insert($data);
    }
}
