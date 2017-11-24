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
      <div class="col-md-3 vertical global"><br><br>
        <div id="mensajes">
               @if(Auth::user()->tipo == 'admin')

         <div id="jstree">
    <ul>
     <li>Dirección Administrativa


      <li class="jstree-open">Rutas Administrador

      <ul>
        <li><a ondblclick="location.href='{{route('usuarios.index')}}'" href="#" onclick="return false">Usuarios</a></li>
        <li><a ondblclick="location.href='{{route('subareas.index')}}'" href="#" onclick="return false">Subareas</a></li>
        <li><a ondblclick="location.href='{{route('anos.index')}}'" href="#" onclick="return false">Años</a></li>
        <!--<li><a ondblclick="location.href='{{route('esperados.index')}}'" href="#" onclick="return false">Documentos Esperados</a></li> !-->
      </ul>

      </li>


       </li>
    </ul>
  </div>


        @endif
          @if(Auth::user()->tipo == 'Area Administradora')
             <div id="jstree">
              <ul>

                  <li class="jstree-open">Area Administradora
                    <ul>
                      @foreach($areas3 as $subarea)
                        @if($subarea->id == $sub) <li class="jstree-open"> @else <li> @endif
                          <a ondblclick="location.href='{{route('anos',$subarea->id)}}'" href="#" onclick="return false">
                            {{$subarea->nombres}}
                          </a>
                          <ul>
                            @foreach($anos as $ano)
                              <li>
                                <a ondblclick="location.href='{{route('archivo',[$subarea->id,$ano->id])}}'" href="#" onclick="return false">
                                  {{$ano->nombre}}
                                </a>
                              </li>
                            @endforeach
                          </ul>
                        </li>
                     @endforeach
                  </ul>
                </li>

            </ul>
          </div>
        @endif
      </div>
    </div><br><br>
    <div class="col-md-9 ">
      <div class="row">
       @foreach($anos as $ano)
          <div class="col-md-3">
            <a href="{{route('archivo',[$sub,$ano->id])}}">
                <img class="carpeta img-responsive center-block" src="{{asset('images/carpeta.png')}}">
                <p class="text-center carpeta-texto"><strong>{{$ano->nombre}}</strong></p>
            </a><br><br>
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
  <script src="{{ asset('js/jstree.min.js') }}"></script>
  <script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script>
    $(function () {
      // 6 create an instance when the DOM is ready
      $('#jstree').jstree();
      $('button').on('click', function () {
        $('#jstree').jstree(true).select_node('child_node_1');
        $('#jstree').jstree('select_node', 'child_node_1');
        $.jstree.reference('#jstree').select_node('child_node_1');
      });
    });
  </script>
</html>
