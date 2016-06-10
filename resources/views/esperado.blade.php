<html>
<head>
  <title>Adoz lo hace facil</title>
  <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
  <link href="{{asset('css/app.css')}}" rel="stylesheet">
  <link href="{{ asset('css/dist/style.css') }}" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.png')}}" />


</head>
<body>

@include('particiones/navview')




 <br>

      <div class="row">




        <div class="col-md-3 vertical global">




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
                    <li><a ondblclick="location.href='{{route('admin',array($subarea->id,$cliente->id,$ano->id,$mes->id,$dat->id))}}'" href="#" onclick="return false">{{$factu->nombre}}</a></li>
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




       <div class="col-md-8" id="global">

       @if($docu == 0)


        <table class="table table-bordered table-responsive">
          <thead>
            <th>documento</th>
            <th>prioridad</th>
            <th>documento</th>
          </thead>
          <tbody>

              @foreach($esperado as $espe)
              <tr>
              <td>{{$espe->nombre}}</td>
              <td>Alta</td>
              <td>
                <a data-path="{{$espe->id}}" class="actualizardocumento btn btn-primary" href="#" data-toggle="modal" data-target="#modal11">
                Subir archivo
                </a>
              </td>
            </tr>
              @endforeach

          </tbody>
        </table >


       @endif



       @if($docu != 0)

         <div class="panel panel-primary">
           <div class="panel-heading">
             <h3 class="panel-title">Documentos Esperados</h3>
           </div>
           <div class="panel-body">

             <table class="table table-bordered table-responsive">
               <thead>
                 <th>nombre del documento</th>
                 <th>archivo</th>
                 <th>extencion</th>
                 <th>Alta</th>

               </thead>

               <tbody>

                      <?php
                  $ini;
            $max = count($documentos);
              ?>
            @foreach($esperado as $espe)
               <?php $ini = 0; ?>
              <tr>
              <td>{{$espe->nombre}}</td>

              @foreach($documentos as $docu)
                  <?php $ini++;
                   ?>
                  @if($espe->id == $docu->esperado_id)
                      <td><a data-path="{{ asset('uploads/'.str_replace(' ', '%20', $docu->file)) }}" class="obtenerruta" href="#" data-toggle="modal" data-target="#visordocumento">{{$docu->file}}</a></td>
                        <td>{{$docu->tipo}}</td>
                      <td>{{$docu->created_at}}</td><?php break; ?>
                  @else
                      @if($ini === $max)
                      <td class="danger">
                          <a data-path="{{$espe->id}}" class="actualizardocumento btn btn-danger" href="#" data-toggle="modal" data-target="#modal11">
                          Subir archivo
                          </a>
                      </td>
                      <td class="danger">
                      no ha subido documento
                      </td>

                      <td class="danger">
                        no ha subido documento
                      </td>


                      @endif
                  @endif
              @endforeach
          </tr>
      @endforeach




               </tbody>

             </table>

           </div>
         </div>



           @endif

   <div class="modal fade" id="modal11" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">

    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cargar un archivo</h4>
      </div>
      <div class="modal-body">
        {!!Form::open(['route'=>'actualizaresperado','method'=>'POST','files'=>true])!!}



          {!!Form::hidden('id', null,['id'=>'idesperado','class'=>'form-control', 'placeholder'=>'Nombres'])!!}

           {!!Form::text('nombre', null,['id'=>'actualizardocumento','class'=>'form-control','disabled'])!!}<br>

          {!!Form::file('file',['class'=>'form-control','id'=>'file','required'])!!}

          {!!Form::hidden('subarea_id', $archivo)!!}
          {!!Form::hidden('cliente_id', $client)!!}
          {!!Form::hidden('ano_id', $anomandado)!!}
          {!!Form::hidden('mouth_id', $mesmandado)!!}
          {!!Form::hidden('factura_id', $fac)!!}
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       {!! Form::submit('subir documento',['class'=>'btn btn-primary']) !!}

         {!!Form::close()!!}
     </div>
    </div>
  </div>

</div>



      </div> <!-- cierre de la columna col s8 -->
     </div> <!-- cierre del row -->


     <div class="modal fade bs-example-modal-lg" id="visordocumento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
     <div class="modal-dialog modal-lg" role="">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel">Visor de Documentos</h4>
         </div>
         <div class="modal-body">
           <div class="visor">

           </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

         </div>
       </div>
     </div>
   </div>

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
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

  <script src="{{ asset('js/jstree.min.js') }}"></script>
  <script src="{{ asset('js/alertify.js') }}"></script>


          <script>

      $('.actualizardocumento').click(function(){

        var id = $(this).data('path');
        var route = "/esperados/"+id+"/edit";
        //var route = "http://localhost/adozapp/public/esperados/"+id+"/edit";

        $.get(route,function(res){

            $("#actualizardocumento").val(res.nombre);
            $("#idesperado").val(res.id);




        });
    });


     $('.obtenerruta').click(function(){

    $('.visor').empty();
    var visor = $(".visor");
    var path = $(this).data('path');
    console.log(path);
    visor.append("<embed src="+path+" width='10px' height='37px' />");








  });

          </script>





  <script>






  $("#jstree").jstree({

"themes" : {
"theme" : "apple",
"dots" : true,
"icons" : true
},
"plugins" : [ "html_data", "themes", "ui" ]
});



  $(document).ready(function(){

    $(".dropdown-button").dropdown();
     $(".button-collapse").sideNav();
       $('.modal-trigger').leanModal();
       $('.materialboxed').materialbox();
       $('select').material_select();


  });

    $('.obtenerruta').click(function(){

    $('.visor').empty();
    var visor = $(".visor");
    var path = $(this).data('path');
    visor.append("<embed src="+path+" width='1000' height='375'>");





  });

  </script>



</html>
