<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Esperado;
use App\Cliente;
use App\User;
use App\Ano;
use App\Documento;
use App\Area;


class EsperadoController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	//	$this->middleware('isAdmin');

	}





	public function actualizaresperado(Request $request)
	{

		$fileinput=$request->file('file');
		$filename = $fileinput->getClientOriginalName();
		$filetipo = $fileinput->guessExtension();
		\Storage::disk('local')->put($filename,  \File::get($fileinput));
		$id_esperado = $request->get('id');
		$subarea= $request->get('subarea_id');
  	$cliente= $request->get('cliente_id');
    $ano= $request->get('ano_id');
    $mes= $request->get('mouth_id');
    $factu= $request->get('factura_id');
		$document = new documento;
		$document->cliente_id =$cliente;
		$document->esperado_id =$id_esperado;
		$document->factura_id =$factu;
		$document->subarea_id =$subarea;
		$document->file = $filename;
		$document->tipo = $filetipo;
		$document->save();

		return \Redirect::route('esperado',array($subarea,$cliente,$ano,$mes,$factu));
	}




	public function index()
	{
		$clientelista = cliente::lists('nombre', 'id');
		$esperadolista = Esperado::all();
		$cliente = Cliente::paginate(100);
		$user = User::paginate(100);
		$ano = Ano::paginate(100);
		$areas = Area::lists('nombres','id');
		return view('esperados.index',compact('cliente','user','ano','areas','clientelista','esperadolista'));
	}




	public function store(Request $request)
	{
		$documentos = $request->get('esperado_id');
		$cliente = $request->get('cliente_id');
		foreach ($documentos as $documento)
		{

			$esperado = Esperado::find($documento);
			$client = \DB::select("select * from cliente_esperado where  cliente_id='$cliente' AND esperado_id='$documento'");
			$clients = count($client);
			if($clients ==0){
				$esperado->clientes()->attach($cliente);
			}
			else{

			}



		}
			\Session::flash('mesas',  '...... este cliente fue actualizado ');
			return \Redirect::route('esperados.index');


	}





	public function edit($id)
	{
		$esperado=Esperado::find($id);
    return response()->json($esperado->toArray());
	}





}//cierre de la llave principal
