<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Esperado extends Model {


	protected $fillable = ['nombre', 'file'];

	
	public function clientes(){

		return $this->belongsToMany('App\Cliente');
	}

	public function documentos(){

		return $this->hasMany('App\Documento');
	}

}
