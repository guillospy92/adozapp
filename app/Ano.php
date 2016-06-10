<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ano extends Model {

	protected $fillable = ['nombre', 'estado'];


	public function mouths(){

		return $this->belongsToMany('App\Mouth');
	}


	public function clientes(){

		return $this->belongsToMany('App\Cliente');
	}

}
