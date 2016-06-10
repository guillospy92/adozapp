<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Cliente;
use App\Subarea;
use App\User;
use App\Ano;
use App\Area;
use App\Factura;

class EstadisticaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$clientelista = cliente::lists('nombre', 'id');
		$subarealista = Subarea::lists('nombres', 'id');
		$cliente = Cliente::paginate(100);
		$user = User::paginate(100);
		$ano = Ano::paginate(100);
		$anos = Ano::lists('nombre','id');
		$areas = Area::lists('nombres','id');
		$factura = Factura::count();

		return view('estad',compact('cliente','user','clientelista','subarealista','ano','areas','anos','factura'));
	}


	
	public function store()
	{
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
	}

	
	public function update($id)
	{
		
	}

	
	public function destroy($id)
	{
		
	}

}
