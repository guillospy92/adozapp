 <html>
  <head>
    <title>adozhome</title>
    <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('css/dist/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.png')}}" />
    <link href="{{asset('css/dropzone.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/jquery.toast.css')}}" rel="stylesheet">
  </head>
  <body>
  @include('particiones/navview')
  <div class="container-fluid">
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
          @if(Auth::user()->tipo == 'Direccion Administrativa')
             <div id="jstree">
              <ul>
                <li>clinica altos de san vicente
                  <li class="jstree-open">Dirección Administrativa
                    <ul>
                      @foreach($areas3 as $subarea)
                        @if($subarea->id == $sub) <li class="jstree-open"> @else <li> @endif
                          <a ondblclick="location.href='{{route('anos',$subarea->id)}}'" href="#" onclick="return false">
                            {{$subarea->nombres}}
                          </a>
                          <ul>
                            @foreach($anios as $anio)
                              <li>
                                <a ondblclick="location.href='{{route('archivo',[$subarea->id,$anio->id])}}'" href="#" onclick="return false">
                                  {{$anio->nombre}}
                                </a>
                              </li>
                            @endforeach
                          </ul>
                        </li>
                     @endforeach
                  </ul>
                </li>
              </li>
            </ul>
          </div>
        @endif
      </div>
    </div>
    <div class="col-md-9 ">

      <div class="row">
          <div class="col-md-12">

          </div>
          <div class="col-md-12" id="mostrar-guardados" style="margin-right: 7px"></div>
          <div class="col-md-12" id="cargar-archivos" style="margin-right: 7px">
           <div class="panel panel-default">
             <div class="panel-heading" style="height: 50px">
              <div class="pull-right" >
                <button class="btn btn-sm btn-primary">Subir archivos</button>
                <button class="btn btn-sm btn-primary">Cargar Indices</button>
              </div>
              <div class="pull-left">
                <button id="submit" class="btn btn-primary btn-sm">Carga masiva</button>
              </div>
             </div>
                <div class="panel-body">
                   {!! Form::open([
                    'route'=> 'createfile',
                    'method' => 'post',
                    'files'=>'true',
                    'id' => 'image-upload',
                    'class' => 'dropzone',
                    'name' => 'file',
                    'style' => 'border: 2px #1472db dashed !important;'])
                  !!}
                   <div class="dz-message" style="height: 200px;font-size: 34px;color: #e2dfdf;text-align: center;font-family: -webkit-body;font-weight: 500;font-style: italic;">
                            Arrastrar Archivos maximos 100 pdf
                    </div>
                    <div class="dropzone-previews"></div>
                    <input type="hidden" name="subarea" value="{{ $sub }}">
                    <input type="hidden" name="ano" value="{{ $ano }}">
                {!! Form::close() !!}
               </div>
           </div>
          </div>
      </div>
</div>
    </div>
  <div class="container-fluid">
    <footer style="margin-left: -30px;"></footer>
  </div>

  </body>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="{{ asset('js/jstree.min.js') }}"></script>
  <script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('js/dropzone.js') }}"></script>
  <script src="{{ asset('js/jquery.toast.js') }}"></script>

  <script>
    $(function () {
      // 6 create an instance when the DOM is ready
      $('#jstree').jstree();
      $('button').on('click', function () {
        $('#jstree').jstree(true).select_node('child_node_1');
        $('#jstree').jstree('select_node', 'child_node_1');
        $.jstree.reference('#jstree').select_node('child_node_1');
      });

      Dropzone.options.imageUpload = {
        maxFilesize    :       12,
        autoProcessQueue: false,
        maxFiles: 240,
        parallelUploads: 100,
        init: function() {
          var submitBtn = document.querySelector("#submit");
          imageUpload = this;
          submitBtn.addEventListener("click", function(e){
            imageUpload.processQueue();
          });
          this.on("complete", function(file) {
            imageUpload .removeFile(file);

          });




        }
      };
    });
  </script>
</html>
