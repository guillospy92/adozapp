<html>
  <head>
    <title>adozhome</title>

    <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
  <link href="{{asset('css/app.css')}}" rel="stylesheet">
  <link href="{{ asset('css/dist/style.css') }}" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.png')}}" />




  </head>
  <body>

@include('particiones/navview')








      <div class="row">

      <div class="col-md-3 col-sm-3 vertical global">


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
            <li class="jstree-open"><a ondblclick="location.href='{{route('anos',array($subarea->id,$cliente->id))}}'" href="#" onclick="return false">{{$cliente->nombre}}</a>
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

      <br><br>


      <div class="col-md-9 ">


      <div class="row">


       @foreach($meses as $mese)

        <div class="col-md-3">
          <a href="{{route('admin',array($archivo,$client,$anomandado,$mese->id))}}" >
            <img class="carpeta img-responsive center-block" src="{{asset('images/carpeta.png')}}">
              <p class="text-center carpeta-texto"><strong>{{$mese->nombre}}</strong></p>
          </a>
          <br><br>



      </div>
      @endforeach
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

	<script>


  $(function () {
    // 6 create an instance when the DOM is ready
    $('#jstree').jstree();
    // 7 bind to events triggered on the tree
    $('#jstree').on("changed.jstree", function (e, data) {
      console.log(data.selected);
    });
    // 8 interact with the tree - either way is OK
    $('button').on('click', function () {
      $('#jstree').jstree(true).select_node('child_node_1');
      $('#jstree').jstree('select_node', 'child_node_1');
      $.jstree.reference('#jstree').select_node('child_node_1');
    });
  });


	$(document).ready(function(){

		$(".dropdown-button").dropdown();
		 $(".button-collapse").sideNav();
		  $(".button-collapse").sideNav();

	});

	</script>
</html>
