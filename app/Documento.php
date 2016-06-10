<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model {

	protected $fillable = ['cliente_id', 'esperado_id','factura_id','file','tipo'];


	public function cliente()
	{

		return $this->belongsTo('App\Cliente');
	}

	public function esperado()
	{

		return $this->belongsTo('App\Esperado');
	}

	public function factura()
	{

		return $this->belongsTo('App\Factura');
	}




}
