<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Mouth extends Model {

	public function anos(){

		return $this->belongsToMany('App\Ano');
	}

		public function clientes(){

		return $this->belongsToMany('App\Cliente');
	}

	public function facturas(){

		return $this->hasMany('App\Factura');
	}

}
