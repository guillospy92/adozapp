<!DOCTYPE html>
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

  <div class="container-fluid">

    <div class="col-md-3 global">

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






   @if(Auth::user()->tipo == 'Direccion Administrativa')

    <div id="jstree">
    <ul>



      <li class="jstree-open">Dirección Administrativa
        <ul>
          @foreach($areas3 as $subarea)

          <li><a ondblclick="location.href='{{route('anos',$subarea->id)}}'" href="#" onclick="return false">{{$subarea->nombres}}</a>

            <ul>
            @foreach($anos as $ano)
              <li><a ondblclick="location.href='{{route('archivo',array($subarea->id,$ano->id))}}'" href="#" onclick="return false">{{$ano->nombre}}</a>
              <ul>

              </ul>
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


    <div class="col-md-8">
      <div class="row">

      <br><br><br>






       @if(Auth::user()->tipo == 'Direccion Administrativa' || Auth::user()->tipo == 'admin')

      @include('particiones.direccionadministrativa')


      @else

      @endif





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

<script src="{{asset('admin/bower_components/jquery/jquery.min.js')}}"></script>
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


  </script>
</html>
