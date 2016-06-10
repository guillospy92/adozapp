<?php

use Illuminate\Database\Seeder;
use App\Area;

class AreaTableSeeder extends Seeder
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
                'nombres' => 'Consejo Directivo',
                'estado'  => 1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

              [
                'nombres' => 'Gerencia General',
                'estado'  => 1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

              [
                'nombres' => 'Dirección Administrativa',
                'estado'  => 1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

              [
                'nombres' => 'Dirección Medica',
                'estado'  => 1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],




        );

        Area::insert($data);
    }
}
