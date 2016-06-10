

<html>
<head>
  <title>Adoz lo hace facil</title>
  <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
  <link href="{{asset('css/app.css')}}" rel="stylesheet">
   <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/dist/style.css') }}" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.png')}}" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


</head>
<body>

@include('particiones/navview')

@include('particiones/busqueda')

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Crear Nueva Factura</h4>
      </div>
      <div class="modal-body">

      {!!Form::open(array('route'=>'factura', 'method'=>'POST'))!!}



        <div class="form-group">
        {!!Form::text('nombre', null,['id'=>'icon_prefix','class'=>'form-control','required','placeholder'=>'nombre de la factura'])!!}
        </div>
        {!!Form::hidden('estado', "activo") !!}
         {!!Form::hidden('subarea_id', $archivo)!!}
        {!!Form::hidden('cliente_id', $client)!!}
        {!!Form::hidden('ano_id', $anomandado)!!}
        {!!Form::hidden('mouth_id', $mesmandado)!!}



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

        {!! Form::submit('crear factura',['class'=>'btn btn-primary','id'=>'boton','name'=>'action']) !!}

  {!!Form::close()!!}
      </div>
    </div>
  </div>
</div>




 <br>

 <div class="fixed-action-btn horizontal " style="bottom: 45px; right: 24px;">
   <a data-toggle="modal" data-target="#myModal" href="#"> <img class="ajustar" src="{{ asset('images/icon.png') }}"></img></a>
  </div>

  

    {!! Form::model($archivo,['route' => ['admin',$archivo,$client,$anomandado,$mesmandado], 'method'=>'get','class'=>'navbar-form pull-right ']  )!!}

  <div class="input-group ">

    {!!Form::text('name',null,['class'=>'input-buscar form-control','id'=>'search','type'=>'search'])!!}
      <div class="input-group-btn">
          <button type="submit" class="btn boton-buscar ">
          <span class="glyphicon glyphicon-search"></span>
          </button>

      </div>

  </div>
   <a class="busqueda-avanzada btn btn-primary" data-toggle="modal" data-target="#myModalbusqueda" href="">+</a>
  {!!Form::close()!!}






      <div class="row">



        <div class="col-md-3  vertical global ">


      <br>
      <br>
      <div id="mensajes">

       @if(Auth::user()->tipo == 'admin')

         <div id="jstree">
    <ul>
     <li>clinica altos de san vicente


      <li class="jstree-open">Rutas Administrador

      <ul>
        <li><a ondblclick="location.href='{{route('usuarios.index')}}'" href="#" onclick="return false">Usuarios</a></li>
        <li><a ondblclick="location.href='{{route('clientes.index')}}'" href="#" onclick="return false">Clientes</a></li>
        <li><a ondblclick="location.href='{{route('anos.index')}}'" href="#" onclick="return false">Años</a></li>
        <li><a ondblclick="location.href='{{route('esperados.index')}}'" href="#" onclick="return false">Documentos Esperados</a></li>
      </ul>
        
      </li>


       </li>
    </ul>
  </div>


        @endif




   @if(Auth::user()->tipo == 'Consejo Directivo')

     <div id="jstree">
    <ul>
     <li>az


      <li class="jstree-open">Consejo Directivo
        <ul>
          @foreach($areas1 as $subarea)

          @if($archivo == $subarea->id)
          <li class="jstree-open"><a ondblclick="location.href='{{route('clientes',$subarea->id)}}'" href="#" onclick="return false">{{$subarea->nombres}}</a>

          <ul>

          @foreach($subarea->clientes as $cliente)
          @if($cliente->id == $client)
            <li class="jstree-open"><a ondblclick="location.href='{{route('anos',array($subarea->id,$cliente->id))}}'" href="#" onclick="return false">{{$cliente->nombre}}</a>
            <ul>
            @foreach($anos as $ano)
            @if($anomandado==$ano->id)
              <li class="jstree-open">
              <a ondblclick="location.href='{{route('meses',array($subarea->id,$cliente->id,$ano->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>
                @foreach($meses as $mes)

                <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                        <ul>
                @foreach($factura as $dat)
                @if($dat->mouth_id == $mes->id && $dat->subarea_id == $subarea->id && $dat->cliente_id == $cliente->id && $dat->ano_id == $ano->id )

                    <li><a ondblclick="location.href='{{route('esperado',array($subarea->id,$cliente->id,$ano->id,$mes->id,$dat->id))}}'" href="#" onclick="return false">{{$dat->nombre}}</a>
                    @else



                    @endif
                    @endforeach
               </ul>
                </li>

                @endforeach
              </ul>

              </li>
              @else
              <li>
              <a ondblclick="location.href='{{route('meses',array($subarea->id,$cliente->id,$cliente->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>
                @foreach($meses as $mes)

                <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                      <ul>
                @foreach($factura as $dat)
                @if($dat->mouth_id == $mes->id && $dat->subarea_id == $subarea->id && $dat->cliente_id == $cliente->id && $dat->ano_id == $ano->id )

                    <li><a ondblclick="location.href='{{route('esperado',array($subarea->id,$cliente->id,$ano->id,$mes->id,$dat->id))}}'" href="#" onclick="return false">{{$dat->nombre}}</a>
                    @else



                    @endif
                    @endforeach
               </ul>
                </li>

                @endforeach
              </ul>

              </li>
              @endif
            @endforeach
            </ul>

            </li>
            @else
            <li class=""><a ondblclick="location.href='{{route('anos',array($subarea->id,$cliente->id))}}'" href="#" onclick="return false">{{$cliente->nombre}}</a>
            <ul>
            @foreach($anos as $ano)
              <li>
              <a ondblclick="location.href='{{route('meses',array($subarea->id,$cliente->id,$cliente->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>
                @foreach($meses as $mes)

                <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                      <ul>
                @foreach($factura as $dat)
                @if($dat->mouth_id == $mes->id && $dat->subarea_id == $subarea->id && $dat->cliente_id == $cliente->id && $dat->ano_id == $ano->id )

                    <li><a ondblclick="location.href='{{route('esperado',array($subarea->id,$cliente->id,$ano->id,$mes->id,$dat->id))}}'" href="#" onclick="return false">{{$dat->nombre}}</a>
                    @else



                    @endif
                    @endforeach
               </ul>
                </li>

                @endforeach
              </ul>

              </li>
            @endforeach
            </ul>

            </li>
           @endif
            @endforeach

          </ul>

          </li>
          @else


          <li class=""><a ondblclick="location.href='{{route('clientes',$subarea->id)}}'" href="#" onclick="return false">{{$subarea->nombres}}</a>

          <ul>

          @foreach($subarea->clientes as $cliente)
          @if($cliente->id == $client)

            <li class=""><a ondblclick="location.href='{{route('anos',array($subarea->id,$cliente->id))}}'" href="#" onclick="return false">{{$cliente->nombre}}</a>
            <ul>
            @foreach($anos as $ano)
            @if($anomandado==$ano->id)
              <li class="">
              <a ondblclick="location.href='{{route('meses',array($subarea->id,$cliente->id,$ano->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>
                @foreach($meses as $mes)

                <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                        <ul>
                @foreach($factura as $dat)
                @if($dat->mouth_id == $mes->id && $dat->subarea_id == $subarea->id && $dat->cliente_id == $cliente->id && $dat->ano_id == $ano->id )

                    <li><a ondblclick="location.href='{{route('esperado',array($subarea->id,$cliente->id,$ano->id,$mes->id,$dat->id))}}'" href="#" onclick="return false">{{$dat->nombre}}</a>
                    @else



                    @endif
                    @endforeach
               </ul>
                </li>

                @endforeach
              </ul>

              </li>
              @else
              <li>
              <a ondblclick="location.href='{{route('meses',array($subarea->id,$cliente->id,$cliente->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>
                @foreach($meses as $mes)

                <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                        <ul>
                @foreach($factura as $dat)
                @if($dat->mouth_id == $mes->id && $dat->subarea_id == $subarea->id && $dat->cliente_id == $cliente->id && $dat->ano_id == $ano->id )

                    <li><a ondblclick="location.href='{{route('esperado',array($subarea->id,$cliente->id,$ano->id,$mes->id,$dat->id))}}'" href="#" onclick="return false">{{$dat->nombre}}</a>
                    @else



                    @endif
                    @endforeach
               </ul>
                </li>

                @endforeach
              </ul>

              </li>
              @endif
            @endforeach
            </ul>

            </li>
            @else
            <li class=""><a ondblclick="location.href='{{route('anos',array($subarea->id,$cliente->id))}}'" href="#" onclick="return false">{{$cliente->nombre}}</a>
            <ul>
            @foreach($anos as $ano)
              <li>
              <a ondblclick="location.href='{{route('meses',array($subarea->id,$cliente->id,$cliente->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>
                @foreach($meses as $mes)

                <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                      <ul>
                @foreach($factura as $dat)
                @if($dat->mouth_id == $mes->id && $dat->subarea_id == $subarea->id && $dat->cliente_id == $cliente->id && $dat->ano_id == $ano->id )

                    <li><a ondblclick="location.href='{{route('esperado',array($subarea->id,$cliente->id,$ano->id,$mes->id,$dat->id))}}'" href="#" onclick="return false">{{$dat->nombre}}</a>
                    @else



                    @endif
                    @endforeach
               </ul>
                </li>

                @endforeach
              </ul>

              </li>
            @endforeach
            </ul>

            </li>
           @endif
            @endforeach

          </ul>

          </li>









          @endif

          @endforeach
        </ul>
      </li>


       </li>
    </ul>

  </div>


   @endif


   @if(Auth::user()->tipo == 'Gerencia General')



     <div id="jstree">
    <ul>
     <li>az


      <li class="jstree-open">Gerencia General
        <ul>
          @foreach($areas2 as $subarea)

          @if($archivo == $subarea->id)
          <li class="jstree-open"><a ondblclick="location.href='{{route('clientes',$subarea->id)}}'" href="#" onclick="return false">{{$subarea->nombres}}</a>

          <ul>

          @foreach($subarea->clientes as $cliente)
          @if($cliente->id == $client)
            <li class="jstree-open"><a ondblclick="location.href='{{route('anos',array($subarea->id,$cliente->id))}}'" href="#" onclick="return false">{{$cliente->nombre}}</a>
            <ul>
            @foreach($anos as $ano)
            @if($anomandado==$ano->id)
              <li class="jstree-open">
              <a ondblclick="location.href='{{route('meses',array($subarea->id,$cliente->id,$ano->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>
                @foreach($meses as $mes)

                <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                        <ul>
                @foreach($factura as $dat)
                @if($dat->mouth_id == $mes->id && $dat->subarea_id == $subarea->id && $dat->cliente_id == $cliente->id && $dat->ano_id == $ano->id )

                    <li><a ondblclick="location.href='{{route('esperado',array($subarea->id,$cliente->id,$ano->id,$mes->id,$dat->id))}}'" href="#" onclick="return false">{{$dat->nombre}}</a>
                    @else



                    @endif
                    @endforeach
               </ul>
                </li>

                @endforeach
              </ul>

              </li>
              @else
              <li>
              <a ondblclick="location.href='{{route('meses',array($subarea->id,$cliente->id,$cliente->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>
                @foreach($meses as $mes)

                <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                      <ul>
                @foreach($factura as $dat)
                @if($dat->mouth_id == $mes->id && $dat->subarea_id == $subarea->id && $dat->cliente_id == $cliente->id && $dat->ano_id == $ano->id )

                    <li><a ondblclick="location.href='{{route('esperado',array($subarea->id,$cliente->id,$ano->id,$mes->id,$dat->id))}}'" href="#" onclick="return false">{{$dat->nombre}}</a>
                    @else



                    @endif
                    @endforeach
               </ul>
                </li>

                @endforeach
              </ul>

              </li>
              @endif
            @endforeach
            </ul>

            </li>
            @else
            <li class=""><a ondblclick="location.href='{{route('anos',array($subarea->id,$cliente->id))}}'" href="#" onclick="return false">{{$cliente->nombre}}</a>
            <ul>
            @foreach($anos as $ano)
              <li>
              <a ondblclick="location.href='{{route('meses',array($subarea->id,$cliente->id,$cliente->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>
                @foreach($meses as $mes)

                <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                      <ul>
                @foreach($factura as $dat)
                @if($dat->mouth_id == $mes->id && $dat->subarea_id == $subarea->id && $dat->cliente_id == $cliente->id && $dat->ano_id == $ano->id )

                    <li><a ondblclick="location.href='{{route('esperado',array($subarea->id,$cliente->id,$ano->id,$mes->id,$dat->id))}}'" href="#" onclick="return false">{{$dat->nombre}}</a>
                    @else



                    @endif
                    @endforeach
               </ul>
                </li>

                @endforeach
              </ul>

              </li>
            @endforeach
            </ul>

            </li>
           @endif
            @endforeach

          </ul>

          </li>
          @else

         <li class=""><a ondblclick="location.href='{{route('clientes',$subarea->id)}}'" href="#" onclick="return false">{{$subarea->nombres}}</a>

          <ul>

          @foreach($subarea->clientes as $cliente)
          @if($cliente->id == $client)
            <li class=""><a ondblclick="location.href='{{route('anos',array($subarea->id,$cliente->id))}}'" href="#" onclick="return false">{{$cliente->nombre}}</a>
            <ul>
            @foreach($anos as $ano)
            @if($anomandado==$ano->id)
              <li class="">
              <a ondblclick="location.href='{{route('meses',array($subarea->id,$cliente->id,$ano->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>
                @foreach($meses as $mes)

                <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                      <ul>
                @foreach($factura as $dat)
                @if($dat->mouth_id == $mes->id && $dat->subarea_id == $subarea->id && $dat->cliente_id == $cliente->id && $dat->ano_id == $ano->id )

                    <li><a ondblclick="location.href='{{route('esperado',array($subarea->id,$cliente->id,$ano->id,$mes->id,$dat->id))}}'" href="#" onclick="return false">{{$dat->nombre}}</a>
                    @else



                    @endif
                    @endforeach
               </ul>
                </li>

                @endforeach
              </ul>

              </li>
              @else
              <li>
              <a ondblclick="location.href='{{route('meses',array($subarea->id,$cliente->id,$cliente->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>
                @foreach($meses as $mes)

                <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                      <ul>
                @foreach($factura as $dat)
                @if($dat->mouth_id == $mes->id && $dat->subarea_id == $subarea->id && $dat->cliente_id == $cliente->id && $dat->ano_id == $ano->id )

                    <li><a ondblclick="location.href='{{route('esperado',array($subarea->id,$cliente->id,$ano->id,$mes->id,$dat->id))}}'" href="#" onclick="return false">{{$dat->nombre}}</a>
                    @else



                    @endif
                    @endforeach
               </ul>
                </li>

                @endforeach
              </ul>

              </li>
              @endif
            @endforeach
            </ul>

            </li>
            @else
            <li class=""><a ondblclick="location.href='{{route('anos',array($subarea->id,$cliente->id))}}'" href="#" onclick="return false">{{$cliente->nombre}}</a>
            <ul>
            @foreach($anos as $ano)
              <li>
              <a ondblclick="location.href='{{route('meses',array($subarea->id,$cliente->id,$cliente->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>
                @foreach($meses as $mes)

                <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                        <ul>
                @foreach($factura as $dat)
                @if($dat->mouth_id == $mes->id && $dat->subarea_id == $subarea->id && $dat->cliente_id == $cliente->id && $dat->ano_id == $ano->id )

                    <li><a ondblclick="location.href='{{route('esperado',array($subarea->id,$cliente->id,$ano->id,$mes->id,$dat->id))}}'" href="#" onclick="return false">{{$dat->nombre}}</a>
                    @else



                    @endif
                    @endforeach
               </ul>
                </li>

                @endforeach
              </ul>

              </li>
            @endforeach
            </ul>

            </li>
           @endif
            @endforeach

          </ul>

          </li>



          @endif

          @endforeach
        </ul>
      </li>


       </li>
    </ul>
  </div>
   @endif


   @if(Auth::user()->tipo == 'Direccion Administrativa')

    <div id="jstree">
    <ul>
     <li>az


      <li class="jstree-open">Dirección Dministrativa
        <ul>
          @foreach($areas3 as $subarea)

          @if($archivo == $subarea->id)
          <li class="jstree-open"><a ondblclick="location.href='{{route('clientes',$subarea->id)}}'" href="#" onclick="return false">{{$subarea->nombres}}</a>

          <ul>

          @foreach($subarea->clientes as $cliente)
          @if($cliente->id == $client)
            <li class="jstree-open"><a ondblclick="location.href='{{route('anos',array($subarea->id,$cliente->id))}}'" href="#" onclick="return false">{{$cliente->nombre}}</a>
            <ul>
            @foreach($anos as $ano)
            @if($anomandado==$ano->id)
              <li class="jstree-open">
              <a ondblclick="location.href='{{route('meses',array($subarea->id,$cliente->id,$ano->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>
                @foreach($meses as $mes)
                @if($mesmandado==$mes->id)

                <li class="jstree-open" ><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                   <ul>

                  @foreach($factura as $dat)
                  @if($dat->mouth_id == $mesmandado && $dat->subarea_id == $archivo && $dat->cliente_id == $client && $dat->ano_id == $anomandado )

                    <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id,$dat->id))}}'" href="#" onclick="return false">{{$dat->nombre}}</a>
                    @else



                    @endif
                  @endforeach

                  </ul>

                </li>



                </li>
                @else
                <li class="" ><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                <ul>
                @foreach($factura as $dat)
                @if($dat->mouth_id == $mes->id && $dat->subarea_id == $subarea->id && $dat->cliente_id == $cliente->id && $dat->ano_id == $ano->id )

                    <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id,$dat->id))}}'" href="#" onclick="return false">{{$dat->nombre}}</a>
                    @else



                    @endif
                    @endforeach

                </ul>
                </li>
                @endif

                @endforeach
              </ul>

              </li>
              @else
              <li>
              <a ondblclick="location.href='{{route('meses',array($subarea->id,$cliente->id,$cliente->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>
                @foreach($meses as $mes)

                <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                <ul>
                  @foreach($factura as $factu)
                    @if($factu->mouth_id == $mes->id && $factu->cliente_id == $cliente->id && $factu->ano_id == $ano->id && $factu->subarea_id == $subarea->id)
                    <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id,$factu->id))}}'" href="#" onclick="return false">{{$factu->nombre}}</a></li>
                    @endif
                  @endforeach
                </ul>
                </li>

                @endforeach
              </ul>

              </li>
              @endif
            @endforeach
            </ul>

            </li>
            @else
            <li class=""><a ondblclick="location.href='{{route('anos',array($subarea->id,$cliente->id))}}'" href="#" onclick="return false">{{$cliente->nombre}}</a>
            <ul>
            @foreach($anos as $ano)
              <li>
              <a ondblclick="location.href='{{route('meses',array($subarea->id,$cliente->id,$cliente->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>
                @foreach($meses as $mes)

                <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                  <ul>
                     @foreach($factura as $factu)
                    @if($factu->mouth_id == $mes->id && $factu->cliente_id == $cliente->id && $factu->ano_id == $ano->id && $factu->subarea_id == $subarea->id)
                    <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id,$factu->id))}}'" href="#" onclick="return false">{{$factu->nombre}}</a></li>
                    @endif
                  @endforeach
                  </ul>
                </li>

                @endforeach
              </ul>

              </li>
            @endforeach
            </ul>

            </li>
           @endif
            @endforeach

          </ul>

          </li>
          @else

         <li class=""><a ondblclick="location.href='{{route('clientes',$subarea->id)}}'" href="#" onclick="return false">{{$subarea->nombres}}</a>

          <ul>

          @foreach($subarea->clientes as $cliente)
          @if($cliente->id == $client)
            <li class=""><a ondblclick="location.href='{{route('anos',array($subarea->id,$cliente->id))}}'" href="#" onclick="return false">{{$cliente->nombre}}</a>
            <ul>
            @foreach($anos as $ano)
            @if($anomandado==$ano->id)
              <li class="">
              <a ondblclick="location.href='{{route('meses',array($subarea->id,$cliente->id,$ano->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>
                @foreach($meses as $mes)

                <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                    <ul>
                @foreach($factura as $dat)
                @if($dat->mouth_id == $mes->id && $dat->subarea_id == $subarea->id && $dat->cliente_id == $cliente->id && $dat->ano_id == $ano->id )

                    <li><a ondblclick="location.href='{{route('esperado',array($subarea->id,$cliente->id,$ano->id,$mes->id,$dat->id))}}'" href="#" onclick="return false">{{$dat->nombre}}</a>
                    @else



                    @endif
                    @endforeach
               </ul>
                </li>

                @endforeach
              </ul>

              </li>
              @else
              <li>
              <a ondblclick="location.href='{{route('meses',array($subarea->id,$cliente->id,$cliente->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>
                @foreach($meses as $mes)

                <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                      <ul>
                @foreach($factura as $dat)
                @if($dat->mouth_id == $mes->id && $dat->subarea_id == $subarea->id && $dat->cliente_id == $cliente->id && $dat->ano_id == $ano->id )

                    <li><a ondblclick="location.href='{{route('esperado',array($subarea->id,$cliente->id,$ano->id,$mes->id,$dat->id))}}'" href="#" onclick="return false">{{$dat->nombre}}</a>
                    @else



                    @endif
                    @endforeach
               </ul>
                </li>

                @endforeach
              </ul>

              </li>
              @endif
            @endforeach
            </ul>

            </li>
            @else
            <li class=""><a ondblclick="location.href='{{route('anos',array($subarea->id,$cliente->id))}}'" href="#" onclick="return false">{{$cliente->nombre}}</a>
            <ul>
            @foreach($anos as $ano)
              <li>
              <a ondblclick="location.href='{{route('meses',array($subarea->id,$cliente->id,$cliente->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>
                @foreach($meses as $mes)

                <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                      <ul>
                @foreach($factura as $dat)
                @if($dat->mouth_id == $mes->id && $dat->subarea_id == $subarea->id && $dat->cliente_id == $cliente->id && $dat->ano_id == $ano->id )

                    <li><a ondblclick="location.href='{{route('esperado',array($subarea->id,$cliente->id,$ano->id,$mes->id,$dat->id))}}'" href="#" onclick="return false">{{$dat->nombre}}</a>
                    @else



                    @endif
                    @endforeach
               </ul>
                </li>

                @endforeach
              </ul>

              </li>
            @endforeach
            </ul>

            </li>
           @endif
            @endforeach

          </ul>

          </li>



          @endif
          @endforeach
        </ul>
      </li>


       </li>
    </ul>

  </div>


   @endif

   @if(Auth::user()->tipo == 'Direccion Medica')

   <div id="jstree">
    <ul>
     <li>az


      <li class="jstree-open">Dirección Medica
        <ul>
          @foreach($areas4 as $subarea)

          @if($archivo == $subarea->id)
          <li class="jstree-open"><a ondblclick="location.href='{{route('clientes',$subarea->id)}}'" href="#" onclick="return false">{{$subarea->nombres}}</a>

          <ul>

          @foreach($subarea->clientes as $cliente)
          @if($cliente->id == $client)
            <li class="jstree-open"><a ondblclick="location.href='{{route('anos',array($subarea->id,$cliente->id))}}'" href="#" onclick="return false">{{$cliente->nombre}}</a>
            <ul>
            @foreach($anos as $ano)
            @if($anomandado==$ano->id)
              <li class="jstree-open">
              <a ondblclick="location.href='{{route('meses',array($subarea->id,$cliente->id,$ano->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>
                @foreach($meses as $mes)

                <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                      <ul>
                @foreach($factura as $dat)
                @if($dat->mouth_id == $mes->id && $dat->subarea_id == $subarea->id && $dat->cliente_id == $cliente->id && $dat->ano_id == $ano->id )

                    <li><a ondblclick="location.href='{{route('esperado',array($subarea->id,$cliente->id,$ano->id,$mes->id,$dat->id))}}'" href="#" onclick="return false">{{$dat->nombre}}</a>
                    @else



                    @endif
                    @endforeach
               </ul>
                </li>

                @endforeach
              </ul>

              </li>
              @else
              <li>
              <a ondblclick="location.href='{{route('meses',array($subarea->id,$cliente->id,$cliente->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>
                @foreach($meses as $mes)

                <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                      <ul>
                @foreach($factura as $dat)
                @if($dat->mouth_id == $mes->id && $dat->subarea_id == $subarea->id && $dat->cliente_id == $cliente->id && $dat->ano_id == $ano->id )

                    <li><a ondblclick="location.href='{{route('esperado',array($subarea->id,$cliente->id,$ano->id,$mes->id,$dat->id))}}'" href="#" onclick="return false">{{$dat->nombre}}</a>
                    @else



                    @endif
                    @endforeach
               </ul>
                </li>

                @endforeach
              </ul>

              </li>
              @endif
            @endforeach
            </ul>

            </li>
            @else
            <li class=""><a ondblclick="location.href='{{route('anos',array($subarea->id,$cliente->id))}}'" href="#" onclick="return false">{{$cliente->nombre}}</a>
            <ul>
            @foreach($anos as $ano)
              <li>
              <a ondblclick="location.href='{{route('meses',array($subarea->id,$cliente->id,$cliente->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>
                @foreach($meses as $mes)

                <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                      <ul>
                @foreach($factura as $dat)
                @if($dat->mouth_id == $mes->id && $dat->subarea_id == $subarea->id && $dat->cliente_id == $cliente->id && $dat->ano_id == $ano->id )

                    <li><a ondblclick="location.href='{{route('esperado',array($subarea->id,$cliente->id,$ano->id,$mes->id,$dat->id))}}'" href="#" onclick="return false">{{$dat->nombre}}</a>
                    @else



                    @endif
                    @endforeach
               </ul>
                </li>

                @endforeach
              </ul>

              </li>
            @endforeach
            </ul>

            </li>
           @endif
            @endforeach

          </ul>

          </li>
          @else

        <li class=""><a ondblclick="location.href='{{route('clientes',$subarea->id)}}'" href="#" onclick="return false">{{$subarea->nombres}}</a>

          <ul>

          @foreach($subarea->clientes as $cliente)
          @if($cliente->id == $client)
            <li class=""><a ondblclick="location.href='{{route('anos',array($subarea->id,$cliente->id))}}'" href="#" onclick="return false">{{$cliente->nombre}}</a>
            <ul>
            @foreach($anos as $ano)
            @if($anomandado==$ano->id)
              <li class="">
              <a ondblclick="location.href='{{route('meses',array($subarea->id,$cliente->id,$ano->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>
                @foreach($meses as $mes)

                <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                      <ul>
                @foreach($factura as $dat)
                @if($dat->mouth_id == $mes->id && $dat->subarea_id == $subarea->id && $dat->cliente_id == $cliente->id && $dat->ano_id == $ano->id )

                    <li><a ondblclick="location.href='{{route('esperado',array($subarea->id,$cliente->id,$ano->id,$mes->id,$dat->id))}}'" href="#" onclick="return false">{{$dat->nombre}}</a>
                    @else



                    @endif
                    @endforeach
               </ul>
                </li>

                @endforeach
              </ul>

              </li>
              @else
              <li>
              <a ondblclick="location.href='{{route('meses',array($subarea->id,$cliente->id,$cliente->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>
                @foreach($meses as $mes)

                <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                      <ul>
                @foreach($factura as $dat)
                @if($dat->mouth_id == $mes->id && $dat->subarea_id == $subarea->id && $dat->cliente_id == $cliente->id && $dat->ano_id == $ano->id )

                    <li><a ondblclick="location.href='{{route('esperado',array($subarea->id,$cliente->id,$ano->id,$mes->id,$dat->id))}}'" href="#" onclick="return false">{{$dat->nombre}}</a>
                    @else



                    @endif
                    @endforeach
               </ul>
                </li>

                @endforeach
              </ul>

              </li>
              @endif
            @endforeach
            </ul>

            </li>
            @else
            <li class=""><a ondblclick="location.href='{{route('anos',array($subarea->id,$cliente->id))}}'" href="#" onclick="return false">{{$cliente->nombre}}</a>
            <ul>
            @foreach($anos as $ano)
              <li>
              <a ondblclick="location.href='{{route('meses',array($subarea->id,$cliente->id,$cliente->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>
                @foreach($meses as $mes)

                <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id))}}'" href="#" onclick="return false">{{$mes->nombre}}</a>
                      <ul>
                @foreach($factura as $dat)
                @if($dat->mouth_id == $mes->id && $dat->subarea_id == $subarea->id && $dat->cliente_id == $cliente->id && $dat->ano_id == $ano->id )

                    <li><a ondblclick="location.href='{{route('esperado',array($subarea->id,$cliente->id,$ano->id,$mes->id,$dat->id))}}'" href="#" onclick="return false">{{$dat->nombre}}</a>
                    @else



                    @endif
                    @endforeach
               </ul>
                </li>

                @endforeach
              </ul>

              </li>
            @endforeach
            </ul>

            </li>
           @endif
            @endforeach

          </ul>

          </li>



          @endif

          @endforeach
        </ul>
      </li>


       </li>
    </ul>
  </div>

   @endif


      </div>
      </div>



      <br>



      <br><br><br>
       <div class="col-md-9" id="global">
       <br><br><br>
       <p class="text-center"><span style="color:blue;" id="cargar" class="fa fa-spin fa-4x"></span></p>
        <div class="data"> @include('paginacion')</div>
         
           </div>

      </div>

     </div> <!-- cierre del row -->



     <footer>
       <br>
       <div class="container-fluid">


       <div class="row">
         <div class="col-sm-offset-4 col-md-8">

           <div class="row">
             <div class="col-md-3">
               <h5 style="color:white;">
                 condiciones de uso
               </h5>

             </div>

             <div class="col-md-4">
               <h5 style="color:white;">
                 politicas y condiciones
               </h5>

             </div>
           </div>



         </div>

       </div>
       </div>

     </footer>










	</body>
<script src="{{asset('admin/bower_components/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>

	<script src="{{ asset('js/jstree.min.js') }}"></script>
  <script src="{{ asset('js/alertify.js') }}"></script>






	<script>

  $("#jstree").jstree({

"themes" : {
"theme" : "apple",
"dots" : true,
"icons" : true
},
"plugins" : [ "html_data", "themes", "ui" ]
});
	</script>

  <script>
    $('.datepicker').datepicker({
        format: "yyyy-mm-dd",
        language: "es",
        autoclose: true
    });
</script>




</html>
