<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		 $this->call('UserTableSeeder');
		 $this->call('AreaTableSeeder');
		 $this->call('SubareaTableSeeder');
		 $this->call('AnoTableSeeder');
		 $this->call('MouthTableSeeder');
		 $this->call('ClienteTableSeeder');
		 $this->call('EsperadoTableSeeder');
		 
		// $this->call('AreaTableSeeder');
		 //$this->call('SubareaTableSeeder');
	}

}
