<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Cliente;
use App\Subarea;
use App\User;
use App\Ano;
use App\Area;



class UserController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
		//$this->middleware('isAdmin');

	}


	public function actualizarusuario(Request $request){

		$id = $request->get('id');
		$usu = User::findOrFail($id);
		$usu->nombres = $request->get('nombres');
        $usu->apellidos = $request->get('apellidos');
        $usu->username = $request->get('username');
        $usu->email = $request->get('email');
        if($request->get('password') != "") $usu->password = $request->get('password');
        $usu->telefono = $request->get('telefono');
        $usu->direccion = $request->get('direccion');
        $usu->estado = $request->get('estado');


        $updated = $usu->save();


		\Session::flash('mesages', $usu->nombres . '...... este usuario fue actualizado ');
		return \Redirect::route('usuarios.index');
	}


	public function index()
	{
		$clientelista = cliente::lists('nombre', 'id');
		$subarealista = Subarea::lists('nombres', 'id');
		$cliente = Cliente::paginate(100);
		$user = User::paginate(100);
		$ano = Ano::paginate(100);
		$areas = Area::lists('nombres','id');
		return view('usuarios.index',compact('cliente','user','clientelista','subarealista','ano','areas'));
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
		$user = new User($request->all());
		$user->tipo = "Area Administradora";

		$user->save();
		\Session::flash('mesages', $user->nombres . '...... este usuario fue creado ');
		return \Redirect::route('usuarios.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user=User::find($id);
        return response()->json($user->toArray());
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user=User::find($id);
        return response()->json($user->toArray());
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::findOrFail($id);
		$user->delete();
		\Session::flash('mesages', $user->nombres . '...... este usuario fue eliminado ');

		return \Redirect::route('usuarios.index');
	}

}
