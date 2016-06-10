<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Cliente;
use App\Subarea;
use App\User;
use App\Ano;
use App\Area;

class AnoController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');

	}

	public function actualizarano(Request $request){

		$id = $request->get('id');
		$ano = Ano::findOrFail($id);
		$ano->fill($request->all());
		$ano->save();
		\Session::flash('mesages', $ano->nombre . '...... este año fue actualizado ');
		return \Redirect::route('anos.index');
	}
	


	public function index()
	{
		$clientelista = cliente::lists('nombre', 'id');
		$subarealista = Subarea::lists('nombres', 'id');
		$cliente = Cliente::paginate(100);
		$user = User::paginate(100);
		$ano = Ano::paginate(100);
		$areas = Area::lists('nombres','id');
		return view('ano.index',compact('cliente','user','clientelista','subarealista','ano','areas'));
	}
	

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$ano = new Ano($request->all());
		$ano->save();
		\Session::flash('mesages', $ano->nombre . '...... este año fue creado exitosamente ');
		return \Redirect::route('anos.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$ano=Ano::find($id);
        return response()->json($ano->toArray());
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ano=Ano::find($id);
        return response()->json($ano->toArray());
	}

	public function update($id)
	{
		//
	}


	public function destroy($id)
	{
		$ano = Ano::findOrFail($id);
		$ano->delete();
		\Session::flash('mesages', $ano->nombre . '...... este año fue eliminado ');

		return \Redirect::route('anos.index');
	}

}
