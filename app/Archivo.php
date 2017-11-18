<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model {

	protected $fillable = ['file','name','subarea_id','ano_id','ordenanza','fecha'];



	public function subarea()
	{
		return $this->belongsTo('App\Subarea');
	}

	public function ano()
	{
		return $this->belongsTo('App\Ano');
	}
	public function scopeName($query, $name)
	{
		if(trim($name)!="")
			{
	    		$query->where(\DB::raw("CONCAT(name,created_at)"),"LIKE","%$name%");
			}
	}
}
