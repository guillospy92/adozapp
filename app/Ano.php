<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ano extends Model {

	protected $fillable = ['nombre', 'estado'];

	public function archivos(){
		return $this->hasMany('App\Archivo');
	}
}
