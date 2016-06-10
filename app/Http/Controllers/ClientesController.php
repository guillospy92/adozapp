<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Cliente;
use App\Subarea;
use App\User;
use App\Ano;
use App\Area;

class ClientesController extends Controller {


		public function __construct()
	{
		$this->middleware('auth');
		//$this->middleware('isAdmin');


	}



	public function actualizarcliente(Request $request){

		$id = $request->get('id');
		$cliente = Cliente::findOrFail($id);
		$cliente->fill($request->all());
		$cliente->save();
		\Session::flash('mesages', $cliente->nombre . '...... este cliente fue actualizado ');
		return \Redirect::route('clientes.index');
	}


	public function asociar(Request $request){

		$idc = $request->get('cliente_id');
		$ids = $request->get('subarea_id');
		$user = \DB::select("select * from cliente_subarea where  subarea_id='$ids' AND cliente_id='$idc'");
		$users= count($user);

		if($users == 0 ){

			$cliente = Cliente::find($idc);
			$cliente->subareas()->attach($ids);
			\Session::flash('mesas', $ids . '...... este cliente fue actualizado ');
			return \Redirect::route('clientes.index');

		}

		else{
			\Session::flash('mesas_error', $ids . '...... este cliente fue actualizado ');
			return \Redirect::route('clientes.index');
		}








	}

	public function index()
	{
		$clientelista = cliente::lists('nombre', 'id');
		$subarealista = Subarea::lists('nombres', 'id');
		$cliente = Cliente::paginate(100);
		$user = User::paginate(100);
		$ano = Ano::paginate(100);
		$areas = Area::lists('nombres','id');
		return view('clientes.index',compact('cliente','user','clientelista','subarealista','ano','areas','areas'));
	}


	public function create()
	{
		//
	}

	public function store(Request $request)
	{
		$cliente = new Cliente($request->all());
		$cliente->save();
		\Session::flash('mesages', $cliente->nombre . '...... este cliente fue creado ');
		return \Redirect::route('clientes.index');
	}


	public function show($id)
	{
		$cliente=Cliente::find($id);
        return response()->json($cliente->toArray());
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$cliente=Cliente::find($id);
        return response()->json($cliente->toArray());
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$cliente = Cliente::findOrFail($id);
		$cliente->delete();
		\Session::flash('mesages', $cliente->nombre . '...... este cliente fue eliminado ');

		return \Redirect::route('clientes.index');
	}

}
