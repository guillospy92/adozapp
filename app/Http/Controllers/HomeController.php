<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Area;
use App\Subarea;
use App\Archivo;
use Carbon\Carbon;
use App\User;
use App\Ano;
use App\Mouth;
use App\Cliente;
use App\Factura;
use App\Esperado;
use App\Documento;
use Response;
use Storage;
use Maatwebsite\Excel\Facades\Excel;



class HomeController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
    $this->errors = [];

	}



	public function index()
	{

		$areas1 =	Subarea::with('clientes')->paginate(100)->where('area_id',1);
    $areas2 = Subarea::with('clientes')->paginate(100)->where('area_id',2);
    $areas3 = Subarea::with('clientes')->paginate(100)->where('area_id',1);
    $areas4 = Subarea::with('clientes')->paginate(100)->where('area_id',4);
    $anos = Ano::all();
		$area3 = Area::find(1)->subareas;

    $ano= Ano::all();
		return view('home',compact('anos','area','area1','area2','area3','area4', 'areas1','areas2','areas3','areas4','mes','factura'));
	}


  public function anos($sub)
  {
    $areas3 = Subarea::with('clientes')->paginate(100)->where('area_id',1);
    $anos = Ano::all();
    return view('anos',compact('areas3','anos','sub'));
  }


  public function archivo($sub,$ano, Request $request)
  {
    $errors = 1;
    if($request->has('errors')){
       $errors = $request->get('errors');

    }
    $archivos_db = Archivo::name($request->get('name'))->where('subarea_id',$sub)->where('ano_id',$ano)->orderBy('id', 'desc')->paginate(18);
    $areas3 = Subarea::with('clientes')->paginate(100)->where('area_id',1);
    $anios = Ano::all();
    return view('archivo',compact('areas3','anios','sub','ano','archivos_db','errors'));
  }

  public function excel(Request $request){

    $file = $request->file('file');

    if($file->getMimeType() == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
      Excel::load($file, function($reader)use($request) {
        if(count($reader->get()) > 300){
          \Session::flash('mesages','solo se permiten 300 registros por carga');
          return redirect()->back();
        }else{
           foreach ($reader->get() as $i => $data) {

            $archivo = Archivo::where('subarea_id',$request->get('subarea'))
              ->where('ano_id',$request->get('ano'))
              ->where('name',$data->numero_de_ordenanza)
              ->first();
            if($archivo){
              $archivo->ordenanza = $data->titulo_ordenanza;
              $archivo->fecha = $data->fecha;
              $archivo->save();
            }else{
              if($data->numero_de_ordenanza || $data->titulo_ordenanza || $data->fecha ){
                array_push( $this->errors,[$data->numero_de_ordenanza,$data->titulo_ordenanza,$data->fecha]);
              }
            }
          }
        }
      });

    }else{
      \Session::flash('mesages','Esta Extension de archivos no esta permitida solo xlsx,xlsm,xltx');
       return redirect()->back();
    }

    return redirect()->route('archivo',['sub' => $request->get('subarea'), 'ano' => $request->get('ano'),'errors' => $this->errors]);
  }

    public function createarchivos(Request $request)
    {

       $path = public_path().'/uploads/';
       $files = $request->file('file');
       list($names, $extension) = explode('.', $files->getClientOriginalName());
       try{
            $file_bd = strtotime("now").$files->getClientOriginalName();
            $files->move($path, $file_bd);
            $archivo = new Archivo();
            $archivo->file = $file_bd;
            $archivo->name = $names;
            $archivo->subarea_id = $request->get('subarea');
            $archivo->ano_id = $request->get('ano');
            $archivo->save();
            return $archivo;
       }catch(Exception $e){
          return "Tuvimos Problema con la carga de archivos";
       }
   }




  public function busquedaavanzada(Request $request){

    $titulo = $request->get('titulo');
    $numero = $request->get('numero');
    $fecha = new Carbon($request->get('fecha'));
    $subarea = $request->get('subarea');
    $anios = $request->get('ano');
    $archivo = Archivo::where(function($q)use($numero){
      if($numero){
         $q->where('name','LIKE','%'.$numero.'%');
      }
    })->orwhere(function($q) use($request){
      if($request->has('fecha')){
        $q->whereNotNull('fecha');
        $q->where('fecha',$fecha);
      }
    })->orwhere(function($q)use($titulo){
      if($titulo){
        $q->whereNotNull('ordenanza');
        $q->where('ordenanza','LIKE','%'.$titulo.'%');
      }
    })->get();

   return view('resultado',compact('archivo'));
  }


  public function getsubareas(Request $request, $id){

    if($request->ajax()){
      $subareas = Subarea::subareas($id);
      return response()->json($subareas);
    }

  }


  public function jsonfac(){

    $factura = Mouth::with('facturas')->get();


    return response()->json($factura);

  }


  public function jsonfacid($id){

    $factura = Mouth::with('facturas')->where('ano_id',$id)->get();
    return response()->json($factura);
  }


  public function sendd(Request $request)


   {

    $pathToFile="";
    $containfile=false;
    if($request->hasFile('file') ){
       $containfile=true;
       $file = $request->file('file');
       $nombre=$file->getClientOriginalName();
       $pathToFile= public_path('uploads')."/". $nombre;
    }


    $destinatario=$request->input("email");
    $asunto=$request->input("asunto");
    $contenido=$request->input("editor1");




    $data = array('contenido' => $contenido);
 $r= \Mail::send('mail.plantilla_correo', $data, function ($message) use ($asunto,$destinatario,  $containfile,$pathToFile) {
        $message->from('guillospy@gmail.com', 'adozapp');
        $message->to($destinatario)->subject($asunto);
       if($containfile){
        $message->attach($pathToFile);
        }

    });

    if($r){

    \Session::flash('mesages', 'el correo se envio correctamente ');

           return \Redirect::route('enviaremail.index');
    }
    else
    {
         \Session::flash('mesages', 'upsss esto es embarazaso no fue enviado');

           return \Redirect::route('enviaremail.index');
    }


    }














}
