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
                'id' => 1,
                'nombres' => 'Area Administradora',
                'estado'  => 1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

        );

        Area::insert($data);
    }
}
