 <html>
  <head>
    <title>adozhome</title>
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">

    <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('css/dist/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.png')}}" />
    <link href="{{asset('css/dropzone.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/jquery.toast.css')}}" rel="stylesheet">
     <link href="{{asset('css/bootstrap-datepicker3.min.css')}}" rel="stylesheet">
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
              <li>Dirección Administrativa
                  <li class="jstree-open">Rutas Administrador
                    <ul>
                      <li><a ondblclick="location.href='{{route('usuarios.index')}}'" href="#" onclick="return false">Usuarios</a></li>
                      <li><a ondblclick="location.href='{{route('clientes.index')}}'" href="#" onclick="return false">Clientes</a></li>
                      <li><a ondblclick="location.href='{{route('anos.index')}}'" href="#" onclick="return false">Años</a></li>

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

            </ul>
          </div>
        @endif
      </div>
    </div>
    <div class="col-md-9 ">

      <div class="pull-right" style="margin-bottom: 5px" >
        <button value="1" class="btn btn-sm btn-primary" id="mostrar-info">Subir archivos</button>
        <button class="btn btn-sm btn-primary" onclick="ExcelUpload()">Cargar Indices</button>
       </div>
       <div class="pull-left">
         <button id="submit" class="btn btn-primary btn-sm" style="display: none">Carga masiva</button>
         {!! Form::open (['route' => ['archivo',$sub,$ano],'method' => 'get','class' => 'form-inline', 'id' => 'form-data']) !!}
             <div class="form-group">
                <label class="sr-only" for="Buscar">Amount (in dollars)</label>
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></div>
                  <input type="text" name="name" class="form-control" id="Buscar" placeholder="Buscar">
                </div>
            </div>
          <button type="submit" class="btn btn-default">Enviar</button>
           <button data-toggle="modal" data-target="#search-advanze" type="button" class="btn btn-default">Busqueda Avanzada</button>
         {!! Form::close() !!}
       </div>
       <div class="divider" style="width: 100%;height: 2px;border-bottom: 1px #9c9696 solid;float: right;"></div>
       <br><br><br>
      <div class="row">
          <div class="col-md-12" style="display: none" id="info-data">
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
           <div class="col-md-12" id="mostrar-guardados" style="margin-right: 7px;">
            <div class="row">
              @foreach($archivos_db as $archivo)
                  <div class="col-md-2" style="margin-bottom: 15px;">
                  <a href="#" style="color: black" data-path="{{ asset('uploads/'.str_replace(' ', '%20', $archivo->file)) }}" class="obtenerruta">
                     <p class="text-center">
                        <span style="font-size: 61px; color: #d6d2d2" class="fa fa-file-pdf-o text-center">
                        </span><br>
                         <span class="text-center" style="font-size: 10px;">
                          {!! substr($archivo->name,0,23) !!}
                        </span>
                     </p>
                  </a>
                  </div>
              @endforeach
            </div>
           <div class="row">
             <div class="colmd-12" style="text-align: center">
               <p class="text-center">{!! $archivos_db->render() !!}</p>
             </div>
           </div>
          </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <footer style="margin-left: -30px;"></footer>
  </div>
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

      <div class="modal fade bs-example-modal-lg" id="excel-upoload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
     <div class="modal-dialog" role="">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel">Indices De Busqueda</h4>
         </div>
        {!! Form::open(['route'=> 'excel','method'=> 'post', 'files'=>'true',]) !!}
           <div class="modal-body">
              <div class="form-group">
                <label for="exampleInputFile">Seleccionar Archivo</label>
                <input class="form-control" name="file" type="file" id="exampleInputFile" required="" >
                <input type="hidden" value="{{ $ano }}" name="ano">
                <input type="hidden" value="{{ $sub }}" name="subarea">
              </div>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary">Enviar</button>
              <div class="pull-left">
                <a class="btn btn-default" href="{{ asset('excel/indices.xlsx') }}" download>Descargar Excel</a>
              </div>
           </div>
        {!! Form::close() !!}
       </div>
     </div>
   </div>


      <div class="modal fade bs-example-modal-lg" id="search-advanze" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
     <div class="modal-dialog" role="">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel">Busqueda Avanzada</h4>
         </div>
        {!! Form::open(['route'=> 'busquedaavanzada','method'=> 'post']) !!}
           <div class="modal-body">
              <div class="form-group">
                <label for="exampleInputFile">Titulo De Ordenanza</label>
                <input class="form-control" name="titulo" type="text" id="exampleInputFile">
                <input type="hidden" value="{{ $ano }}" name="ano">
                <input type="hidden" value="{{ $sub }}" name="subarea">
              </div>
               <div class="form-group">
                <label for="exampleInputFile">Numero De Ordenanza</label>
                <input class="form-control" name="numero" type="text" id="exampleInputFile"  >
              </div>
               <div class="form-group">
                <label for="exampleInputFile">Fecha De Publicación</label>
                <div class="input-group date datepicker" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                  <input type="text" name="fecha" class="form-control">
                  <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                  </div>
                 </div>
              </div>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary">Enviar</button>
           </div>
        {!! Form::close() !!}
       </div>
     </div>
   </div>
       <div class="modal fade bs-example-modal-lg" id="error-excel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
     <div class="modal-dialog" role="">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel">Estos Archivos no se Subieron ya que no existen en la BD</h4>
         </div>
           <div class="modal-body">
           @if($errors != 1)
            @if(count($errors) != 0)
              <table class="table table-bordered table-striped">
                <thead>
                  <th>Titulo de Ordenanza</th>
                  <th>Numero de Ordenanza</th>
                </thead>
                <tbody>
                    @foreach($errors as $i => $error)

                        <tr>
                         <td>{{$error[1]}}</td>
                         <td>{{$error[0]}}</td>
                        </tr>
                     @endforeach
                </tbody>
              </table>
            @endif
          @endif
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </div>
       </div>
     </div>
   </div>
  </body>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="{{ asset('js/jstree.min.js') }}"></script>
  <script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('js/dropzone.js') }}"></script>
  <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap-datepicker.es.min.js') }}"></script>
  <script src="{{ asset('js/jquery.toast.js') }}"></script>

  <script>
    @if(Session::has('mesages'))
        $.toast({
          heading: 'Error Solo Documentos De Excel',
          text: '{{Session::get('mesages')}}',
          position: 'bottom-right',
          hideAfter: false,
          icon: 'error'
        })
  @endif
     @if($errors != 1)
      @if(count($errors) != 0)
        $('#error-excel').modal('show');
      @endif
    @endif
    $(function () {
      $.fn.datepicker.defaults.language = 'es';
      $('.datepicker').datepicker({
        endDate: new Date(),
        todayHighlight: true,
      });
      $('#jstree').jstree();
      $('button').on('click', function () {
        $('#jstree').jstree(true).select_node('child_node_1');
        $('#jstree').jstree('select_node', 'child_node_1');
        $.jstree.reference('#jstree').select_node('child_node_1');
      });
      var action = 0
      Dropzone.options.imageUpload = {
        maxFilesize : 8,
        autoProcessQueue: false,
        maxFiles: 100,
        parallelUploads: 1,
        addRemoveLinks: true,
        acceptedFiles: ".pdf,",
        init: function() {
          var submitBtn = document.querySelector("#submit");
          imageUpload = this;
          submitBtn.addEventListener("click", function(e){
            imageUpload.processQueue();
          });
           this.on('error', function(file, errorMessage) {
                 $.toast({
                    heading: 'El archivo con el nombre ' + file.name,
                    text: 'Se Elimino ya que Pesa mas de 8MB',
                    position: 'bottom-right',
                    hideAfter: false,
                    icon: 'error'
                  });
                    imageUpload.removeFile(file);

            });
            this.on('success',function(file){
              imageUpload.options.autoProcessQueue = true;
            });

            this.on("processing", function() {
               processing = true;
            });

           this.on('queuecomplete',function(file,res){

              if(true == processing){

               $.toast({
                  heading: 'Guardado Con Exito',
                  text: 'Rediriegiendo a la vista de ordenanzas',
                  hideAfter: 4000,
                  icon: 'success',
                  position: 'bottom-right',
                  loader: true,        // Change it to false to disable loader
                  loaderBg: '#9EC600'  // To change the background
              });
               setTimeout(function(){
                 location.href ="{{ route('archivo',[$sub,$ano]) }}";

                }, 4000);
            }
           });

        }
      };
    });

    $('#mostrar-info').click(function(event) {
      console.log($(this).val());
      if($(this).val() == 1){
        $("#info-data").show();
        $("#mostrar-guardados").hide();
        $(this).text('Mostrar Guardados');
        $(this).val(2);
        $("#submit").show();
         $("#form-data").hide();
      }else{
         $("#info-data").hide();
        $("#mostrar-guardados").show();
        $(this).text('Subir Archivos');
        $(this).val(1);
         $("#submit").hide();
         $("#form-data").show();
      }
    });

    $('.obtenerruta').click(function(){
      $("#visordocumento").modal('show');
      $('.visor').empty();
      var visor = $(".visor");
      var path = $(this).data('path');
      visor.append("<embed src="+path+" width='1000' height='375'>");
   });

    function ExcelUpload(){
      $("#excel-upoload").modal('show');
    }
  </script>
</html>