<?php

use Illuminate\Database\Seeder;
use App\Subarea;

class SubareaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('subareas')->delete();

        $data = array(
            [
                'nombres' => 'Auditor Administrativo',
                'estado'  => 1,
                'area_id' =>2,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

                [
                'nombres' => 'Juridica',
                'estado'  => 1,
                'area_id' =>2,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

                [
                'nombres' => 'Dirección Cientifica',
                'estado'  => 1,
                'area_id' =>2,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

                [
                'nombres' => 'Calidad',
                'estado'  => 1,
                'area_id' =>2,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

                 [
                'nombres' => 'Contabilidad',
                'estado'  => 1,
                'area_id' =>3,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

                 [
                'nombres' => 'Tesororia',
                'estado'  => 1,
                'area_id' =>3,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

                 [
                'nombres' => 'Costo y Presupuesto',
                'estado'  => 1,
                'area_id' =>3,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

                 [
                'nombres' => 'Facturación',
                'estado'  => 1,
                'area_id' =>3,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

                 [
                'nombres' => 'Cartera',
                'estado'  => 1,
                'area_id' =>3,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],



                   [
                'nombres' => 'Gestión Humana',
                'estado'  => 1,
                'area_id' =>3,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

                     [
                'nombres' => 'Auditoría Medica',
                'estado'  => 1,
                'area_id' =>4,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],




                       [
                'nombres' => 'Coordinación Medica',
                'estado'  => 1,
                'area_id' =>4,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

                       [
                'nombres' => 'Coordinación De Especialidades',
                'estado'  => 1,
                'area_id' =>4,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

                         [
                'nombres' => 'Enfermeria',
                'estado'  => 1,
                'area_id' =>4,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],







        );

        Subarea::insert($data);
    }
}
