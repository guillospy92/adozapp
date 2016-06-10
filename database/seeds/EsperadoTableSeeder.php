<?php

use Illuminate\Database\Seeder;
use App\Esperado;

class EsperadoTableSeeder extends Seeder
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
                'nombre' => 'Documento 1',
                
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

              [
                'nombre' => 'Documento 2',
                
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

              [
                'nombre' => 'Documento 3',
                
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],


             [
                'nombre' => 'Documento 4',
                
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

              [
                'nombre' => 'Documento 5',
                
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

              [
                'nombre' => 'Documento 6',
                
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

              [
                'nombre' => 'Documento 7',
                
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

              [
                'nombre' => 'Documento 8',
                
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],





              
                

        );

        Esperado::insert($data);
    }
}
