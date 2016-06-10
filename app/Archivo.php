<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model {

	protected $fillable = ['file','name', 'size', 'tipo','subarea_id','cliente_id','ano_id','mes_id'];


	
	public function subarea()
	{

		return $this->belongsTo('App\Subarea');
	}



	
	
	

}
