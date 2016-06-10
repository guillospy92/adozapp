<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model {

protected $fillable = ['nombre', 'estado','cliente_id','ano_id','mouth_id','subarea_id'];



	public function documentos(){

		return $this->hasMany('App\Documento');
	}


		public function cliente()
		{

			return $this->belongsTo('App\Cliente');
		}




			public function mouth()
		{

			return $this->belongsTo('App\Mouth');
		}

	public function scopeName($query, $name)
		{

			if(trim($name)!="")
			{
	    		$query->where(\DB::raw("CONCAT(nombre,created_at)"),"LIKE","%$name%");
			}
		}

	}
