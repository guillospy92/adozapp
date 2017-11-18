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

	}



	public function index()
	{

		$areas1 =	Subarea::with('clientes')->paginate(100)->where('area_id',1);
    $areas2 = Subarea::with('clientes')->paginate(100)->where('area_id',2);
    $areas3 = Subarea::with('clientes')->paginate(100)->where('area_id',3);
    $areas4 = Subarea::with('clientes')->paginate(100)->where('area_id',4);
    $anos = Ano::all();
		$area1 = Area::find(1)->subareas;
		$area2 = Area::find(2)->subareas;
		$area3 = Area::find(3)->subareas;
		$area4 = Area::find(4)->subareas;
    $ano= Ano::all();
		return view('home',compact('anos','area','area1','area2','area3','area4', 'areas1','areas2','areas3','areas4','mes','factura'));
	}


  public function anos($sub)
  {
    $areas3 = Subarea::with('clientes')->paginate(100)->where('area_id',3);
    $anos = Ano::all();
    return view('anos',compact('areas3','anos','sub'));
  }


  public function archivo($sub,$ano, Request $request)
  {
    $archivos_db = Archivo::name($request->get('name'))->where('subarea_id',$sub)->where('ano_id',$ano)->orderBy('id', 'desc')->paginate(18);
    $areas3 = Subarea::with('clientes')->paginate(100)->where('area_id',3);
    $anios = Ano::all();
    return view('archivo',compact('areas3','anios','sub','ano','archivos_db'));
  }

  public function excel(Request $request){
 
    $file = $request->file('file');

    if($file->getMimeType() == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
      Excel::load($file, function($reader) {
        if(count($reader->get()) > 300){
          \Session::flash('mesages','solo se permiten 300 registros por carga');
          return redirect()->back();
        }else{
           foreach ($reader->get() as $i => $data) {
            dd($data);
          }
        } 
      });
    }else{
      \Session::flash('mesages','Esta Extension de archivos no esta permitida solo xlsx,xlsm,xltx');
       return redirect()->back();
    }
 
  }





	public function archivos(Request $request, $sub, $cliente, $ano, $id) {

					 $areas1 = Subarea::with('clientes')->paginate(100)->where('area_id', 1);
					 $areas2 = Subarea::with('clientes')->paginate(100)->where('area_id', 2);
					 $areas3 = Subarea::with('clientes')->paginate(100)->where('area_id', 3);
					 $areas4 = Subarea::with('clientes')->paginate(100)->where('area_id', 4);
					 $meses = Mouth::all();
					 $anos = Ano::all();
					 $anomandado = $ano;
					 $archivo = $sub;
					 $client = $cliente;
					 $mesmandado = $id;
					 $factura = Factura::paginate(100);
					 $dato = Factura::name($request->get('name'))->orderBy('created_at', 'desc')
													 ->where('subarea_id', $archivo)
													 ->where('cliente_id', $client)->where('ano_id', $anomandado)
													 ->where('mouth_id', $mesmandado)->paginate(12);
					 if ($request->ajax()) {
							 return Response()->json(view('paginacion')->with(compact('dato','archivo','client','anomandado','mesmandado'))->render());
					 }

			 return view('archivos', compact('dato', 'areas1', 'areas2', 'areas3', 'areas4', 'archivo', 'anos', 'anomandado', 'client', 'meses', 'mesmandado', 'factura'));
	 }


    public function createarchivos(Request $request)
    {
       $path = public_path().'/uploads/';
       $files = $request->file('file');
       try{
            $file_bd = strtotime("now").$files->getClientOriginalName();
            $fileName = $files->getClientOriginalName();
            $files->move($path, $file_bd);
            $archivo = new Archivo();
            $archivo->file = $file_bd;
            $archivo->name = $fileName;
            $archivo->subarea_id = $request->get('subarea');
            $archivo->ano_id = $request->get('ano');
            $archivo->save();
            return $archivo;
       }catch(Exception $e){
          return "Tuvimos Problema con la carga de archivos";
       }     
   }



	public function esperado(Request $request, $sub,$cliente,$ano,$mes,$factu){

    {
      $areas1 = Subarea::with('clientes')->paginate(100)->where('area_id',1);
      $areas2 = Subarea::with('clientes')->paginate(100)->where('area_id',2);
      $areas3 = Subarea::with('clientes')->paginate(100)->where('area_id',3);
      $areas4 = Subarea::with('clientes')->paginate(100)->where('area_id',4);
      $meses = Mouth::all();
      $anos = Ano::all();
      $anomandado = $ano;
      $archivo = $sub;
      $client = $cliente;
      $mesmandado=$mes;
      $fac= $factu;
      $factura = Factura::all();
      $esperado = Cliente::find($client)->esperados;
      $documentos = Documento::where('cliente_id',$cliente)->where('factura_id',$fac)->where('subarea_id',$sub)->get();
      $docu = Documento::where('factura_id',$factu)->count();


      return view('esperado',compact('dato','areas1','areas2','areas3','areas4',
        'archivo','anos','anomandado','client','meses','mesmandado','factura','esperado','fac','documentos','docu'));
  }



	}


  public function nuevafactura(Request $request){

    $subarea=$request->get('subarea_id');
    $cliente=$request->get('cliente_id');
    $ano=$request->get('ano_id');
    $mes=$request->get('mouth_id');
    $factura = new Factura($request->all());
    $factura->save();
   return \Redirect::route('admin',array($subarea,$cliente,$ano,$mes));



  }


	public function reporte(Request $request){

    $subarea = $request->get('nombres');
    $area = $request->get('id');
    $areaget = Area::where('id',$area)->first();
    $subareaget = Subarea::where('id',$subarea)->first();


		$date = date('Y-m-d');
		$time = time();
        $invoice = "2222";
        $view =  \View::make('reporte', compact( 'date','time', 'invoice','areaget','subareaget'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');

	}


  public function busquedaavanzada(Request $request){

    $word = $request->get('nombre');
    $date = $request->get('date');
    $date1 = $request->get('date2');



    if($word == '' ){

      $result = Factura::where('created_at', 'LIKE', '%'.$date.'%')->get();
      $documento = Documento::where('created_at', 'LIKE', '%'.$date.'%')->get();


    }


     if($date == '' ){

      $result = Factura::where('nombre', 'LIKE', '%'.$word.'%')->get();
      $documento = Documento::where('file', 'LIKE', '%'.$word.'%')->orwhere('tipo', 'LIKE', '%'.$word.'%')->get();


    }




    if($date != '' &&  $word !='' ){

      $result = Factura::where('created_at', 'LIKE', '%'.$date.'%')->orwhere('nombre', 'LIKE', '%'.$word.'%')->get();
      $documento = Documento::where('file', 'LIKE', '%'.$word.'%')->orwhere('tipo', 'LIKE', '%'.$word.'%')
      ->orwhere('created_at', 'LIKE', '%'.$date.'%')
      ->get();

    }

    if($word == '' && $date != '' && $date1 != ''){

       $result = Factura::whereBetween('created_at', array($date, $date1))->get();
       $documento = Documento::whereBetween('created_at', array($date, $date1))->get();

    }

      if($word != '' && $date != '' && $date1 != ''){

       $result = Factura::where('created_at', 'LIKE', '%'.$date.'%')->orwhere('nombre', 'LIKE', '%'.$word.'%')->get();
       $documento = Documento::whereBetween('created_at', array($date, $date1))->get();

    }


    $maxdocu = count($documento);
    $maxfactu = count($result);


   return view('resultado',compact('result','documento','maxdocu','maxfactu'));






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
