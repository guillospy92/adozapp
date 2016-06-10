<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model {


	


	public function subareas(){

		return $this->hasMany('App\Subarea');
	}


}
