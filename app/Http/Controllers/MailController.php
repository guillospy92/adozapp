<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Cliente;
use App\Subarea;
use App\User;
use App\Ano;
use App\Area;
use Storage;
use Response;



class MailController extends Controller {


		public function __construct()
	{
		$this->middleware('auth');
		//$this->middleware('isAdmin');

	}



	public function index()
	{

		$clientelista = cliente::lists('nombre', 'id');
		$subarealista = Subarea::lists('nombres', 'id');
		$cliente = Cliente::paginate(100);
		$user = User::paginate(100);
		$ano = Ano::paginate(100);
		$areas = Area::lists('nombres','id');
		return view('mail.index',compact('cliente','user','clientelista','subarealista','ano','areas'));
		
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


	public function store(Request $request)
	{

		 if($request->hasFile('file') ){ 
         
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $nombre=$file->getClientOriginalName();
        $r= Storage::disk('local')->put($nombre,  \File::get($file));
       
       

         } 
         else{

            return "no";
         } 

        if($r){
            return $nombre ;
        }
        else
        {
            return "error vuelva a intentarlo";
        }
		

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
		//
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
		//
	}

}
