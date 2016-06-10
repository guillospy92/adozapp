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
    $mes = Mouth::all();
    $factura = Factura::all();


		return view('home',compact('anos','area','area1','area2','area3','area4',
      'areas1','areas2','areas3','areas4','mes','factura'));

	}


  public function client($id)
  {

    $areas1 = Subarea::with('clientes')->paginate(100)->where('area_id',1);
    $areas2 = Subarea::with('clientes')->paginate(100)->where('area_id',2);
    $areas3 = Subarea::with('clientes')->paginate(100)->where('area_id',3);
    $areas4 = Subarea::with('clientes')->paginate(100)->where('area_id',4);
    $client = Subarea::find($id)->clientes;
		$clientt = Subarea::find($id)->clientes->count();
  	$anos = Ano::all();
    $meses = Mouth::all();
    $factura = Factura::all();
    $archivo = $id;


    return view ('clientes',compact('meses','areas1','areas2','areas3','areas4','client','archivo','anos','factura','clientt'));
  }

  public function anos($sub,$id)
  {


    $areas1 = Subarea::with('clientes')->paginate(100)->where('area_id',1);
    $areas2 = Subarea::with('clientes')->paginate(100)->where('area_id',2);
    $areas3 = Subarea::with('clientes')->paginate(100)->where('area_id',3);
    $areas4 = Subarea::with('clientes')->paginate(100)->where('area_id',4);
    $anos = Ano::all();
    $client = $id;
    $archivo = $sub;
    $meses = Mouth::all();
    $factura = Factura::all();


    return view('anos',compact('areas1','areas2','areas3','areas4','anos','archivo','client','meses','factura'));

  }

  public function meses($sub,$cliente,$id)
  {

    $areas1 = Subarea::with('clientes')->paginate(100)->where('area_id',1);
    $areas2 = Subarea::with('clientes')->paginate(100)->where('area_id',2);
    $areas3 = Subarea::with('clientes')->paginate(100)->where('area_id',3);
    $areas4 = Subarea::with('clientes')->paginate(100)->where('area_id',4);
    $meses = Mouth::all();
    $anos = Ano::all();
    $anomandado=$id;
    $archivo=$sub;
    $client=$cliente;
    $factura = Factura::all();

    return view('meses',compact('areas1','areas2','areas3','areas4','anos','archivo','client','meses','anomandado','factura'));
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
													 ->where('mouth_id', $mesmandado)->paginate(20);
					 if ($request->ajax()) {
							 return Response()->json(view('paginacion')->with(compact('dato','archivo','client','anomandado','mesmandado'))->render());
					 }

			 return view('archivos', compact('dato', 'areas1', 'areas2', 'areas3', 'areas4', 'archivo', 'anos', 'anomandado', 'client', 'meses', 'mesmandado', 'factura'));
	 }

	public function createarchivos(Request $request)
	{


		$date = Carbon::now();
		$date = $date->format('d-m-Y');
		$fileinput=$request->file('file');
		list($names, $extension) = explode('.', $fileinput->getClientOriginalName());
      	$filename = $date.$fileinput->getClientOriginalName();
      	$name = $names;
      	\Storage::disk('local')->put($filename,  \File::get($fileinput));
      	$filesize = $fileinput->getClientSize()/1024;
      	$filetipo = $fileinput->guessExtension();
      	$subarea= $request->get('subarea_id');
        $cliente = $request->get('cliente_id');
        $ano = $request->get('ano_id');
        $mes = $request->get('mouth_id');


      	$file = new Archivo;

      	$file->file = $filename;
      	$file->name = $name;
      	$file->size = $filesize;
      	$file->tipo = $filetipo;
      	$file->subarea_id = $subarea;
        $file->cliente_id = $cliente;
        $file->ano_id = $ano;
        $file->mouth_id = $mes;
      	$file->save();
      	\Session::flash('mesages', $file->name . 'fue subido con exito ');
      	return \Redirect::route('admin',array($subarea,$cliente,$ano,$mes));



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
    //print_r($documentos);
    //exit();

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