<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Subarea extends Model {


protected $fillable = ['nombres', 'estado','area_id'];

	public function archivos(){

		return $this->hasMany('App\Archivo');
	}



	public function area(){

		return $this->belongsTo('App\Area');
	}


	public function clientes(){

		return $this->belongsToMany('App\Cliente');
	}

	public static function subareas($id){

		return Subarea::where('area_id','=',$id)->get();
	}



}
