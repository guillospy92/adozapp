<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {

	protected $fillable = ['nombre', 'estado'];

	public function mouths(){

		return $this->belongsToMany('App\Mouth');
	}


	public function anos(){

		return $this->belongsToMany('App\Ano');
	}


	public function subareas(){

		return $this->belongsToMany('App\Subarea');
	}

	public function esperados(){

		return $this->belongsToMany('App\Esperado');
	}

	public function documentos(){

		return $this->hasMany('App\Documento');
	}

	public function facturas(){

		return $this->hasMany('App\Factura');
	}

}
