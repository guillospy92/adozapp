<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <title>adoz Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Guillermo Romo">

    <!-- The styles -->
    <link  href="{{asset('admin/css/bootstrap-cerulean.min.css')}}" rel="stylesheet">

    <link href="{{asset('admin/css/charisma-app.css')}}" rel="stylesheet">
    <link href="{{asset('admin/bower_components/fullcalendar/dist/fullcalendar.css')}}" rel="stylesheet">
    <link href="{{asset('admin/bower_components/fullcalendar/dist/fullcalendar.print.css')}}" rel="stylesheet" media="print">
    <link href="{{asset('admin/bower_components/chosen/chosen.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/bower_components/colorbox/example3/colorbox.css')}}" rel="stylesheet">
    <link href="{{asset('admin/bower_components/responsive-tables/responsive-tables.css')}}" rel="stylesheet">
    <link href="{{asset('admin/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/jquery.noty.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/noty_theme_default.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/elfinder.min.css')}}" rel='stylesheet'>
    <link href="{{asset('admin/css/elfinder.theme.css')}}" rel='stylesheet'>
    <link href="{{asset('admin/css/jquery.iphone.toggle.css')}}" rel='stylesheet'>
    <link href="{{asset('admin/css/uploadify.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/animate.min.css')}}" rel="stylesheet">

    <!-- jQuery -->
    <script src="{{asset('admin/bower_components/jquery/jquery.min.js')}}"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="{{asset('admin/img/favicon.ico')}}">

</head>

<body>
    <!-- topbar starts -->
    @include('particiones.crearcliente')
    @include('particiones.actualizarcliente')
    @include('particiones.vercliente')
    @include('particiones.asociar')
    @include('particiones.crearano')
    @include('particiones.verano')
    @include('particiones.actualizarano')
    @include('particiones.crearusuarios')

    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"> <img alt="Charisma Logo" src="{{asset('admin/img/logo20.png')}}" class="hidden-xs"/>
                <span>AdoZ</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs">{{Auth::user()->nombres}}</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Perfil</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ url('/auth/logout') }}">salir</a></li>
                </ul>
            </div>


            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                <li><a href="#"><i class="glyphicon glyphicon-globe"></i> ir al sitio oficial</a></li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> acciones <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">estadisticas</a></li>
                        <li><a href="#">graficas estadisticas</a></li>
                        <li><a href="#">otras</a></li>

                    </ul>
                </li>
                <li>
                    <form class="navbar-search pull-left">
                        <input placeholder="buscar" class="search-query form-control col-md-10" name="query"
                               type="text">
                    </form>
                </li>
            </ul>

        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">

        <!-- left menu starts -->
         @include('particiones.nav')
        <!--/span-->
        <!-- left menu ends -->



        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="#">home</a>
        </li>

    </ul>
</div>
<div class=" row">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="6 new members." class="well top-block" href="#">
            <i class="glyphicon glyphicon-user blue"></i>

            <div>Total clientes</div>
            <div>{!!$cliente->total()!!}</div>

        </a>
    </div>

     <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="6 new members." class="well top-block" href="#">
            <i class="glyphicon glyphicon-user blue"></i>

            <div>Total usuarios</div>
            <div>{!!$user->total()!!}</div>

        </a>
    </div>

      <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="6 new members." class="well top-block" href="#">
            <i class="glyphicon glyphicon-cog blue"></i>

            <div>Años Activos</div>
            <div>{!!$ano->total()!!}</div>

        </a>
    </div>

      <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="6 new members." class="well top-block" href="#">
            <i class="glyphicon glyphicon-list-alt blue"></i>

            <div>reportes</div>
            <div>{!!$user->total()!!}</div>

        </a>
    </div>


</div>

<div class="row">
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Años</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
    <div class="box-content">
    @if(Session::has('mesages'))
    <div class="alert alert-info" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('mesages')}}
    </div>
     @endif

    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Año</th>
        <th>estado</th>
        <th>fecha</th>
        <th>acciones</th>

    </tr>
    </thead>
    <tbody>
    @foreach($ano as $anos)
    <tr>
        <td class="">{{$anos->nombre}}</td>
        <td class="center obtenerestado">{{$anos->estado}}</td>
        <td class="center obtenerfecha">{{$anos->created_at}}</td>

        <td class="center">
            <a data-toggle="modal" data-target="#mymodalverano" href=""  class="verano btn btn-success"  data-path="{{$anos->id}}">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                Ver
            </a>
            <a data-toggle="modal" data-target="#mymodalupdateano" href=""  class="actualizarano btn btn-info"  data-path="{{$anos->id}}">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Actualizar
            </a>

            <a class="btn btn-danger" >

               {!!Form ::open(['route'=>['anos.destroy',$anos->id],'method'=>'DELETE'])!!}

                <button class=" btn-danger" type="submit" onclick="return confirm ('seguro que quuires elimiar este año')" >eliminar </button>


                {!!form::close()!!}



            </a>

        </td>
    </tr>

    @endforeach

    </tbody>
    </table>
    </div>
    </div>
    </div>



    <!--/span-->

    </div><!--/row-->
</div><!--/row-->

<div class="row">

</div><!--/row-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <!-- Ad, you can remove it -->
    <div class="row">


</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- library for cookie management -->
<script src="{{asset('admin/js/jquery.cookie.js')}}"></script>
<!-- calender plugin -->
<script src="{{asset('admin/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('admin/bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
<!-- data table plugin -->
<script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>

<!-- select or dropdown enhancer -->
<script src="{{asset('admin/bower_components/chosen/chosen.jquery.min.js')}}"></script>
<!-- plugin for gallery image view -->
<script src="{{asset('admin/bower_components/colorbox/jquery.colorbox-min.js')}}"></script>
<!-- notification plugin -->
<script src="{{asset('admin/js/jquery.noty.js')}}"></script>
<!-- library for making tables responsive -->
<script src="{{asset('admin/bower_components/responsive-tables/responsive-tables.js')}}"></script>
<!-- tour plugin -->
<script src="{{asset('admin/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js')}}"></script>
<!-- star rating plugin -->
<script src="{{asset('admin/js/jquery.raty.min.js')}}"></script>
<!-- for iOS style toggle switch -->
<script src="{{asset('admin/js/jquery.iphone.toggle.js')}}"></script>
<!-- autogrowing textarea plugin -->
<script src="{{asset('admin/js/jquery.autogrow-textarea.js')}}"></script>
<!-- multiple file upload plugin -->
<script src="{{asset('admin/js/jquery.uploadify-3.1.min.js')}}"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="{{asset('admin/js/jquery.history.js')}}"></script>
<!-- application script for Charisma demo -->
<script src="{{asset('admin/js/charisma.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{ asset('js/alertify.js') }}"></script>
<script src="{{ asset('js/validator.js') }}"></script>
<script>
    function validar_texto(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;

    tecla_final = String.fromCharCode(tecla);

    return patron.test(tecla_final);
}

 $("#areas").change(function(event){

        $.get("subareas/"+event.target.value+"",function(response,subareas){

            console.log(response);
            $("#subareas").empty();
            for(i=0; i<response.length;i++){

                $("#subareas").append("<option value='"+response[i].id+"'>"+response[i].nombres+"</option>")
            }


        });
    });
    $('#myFormAno').validator()

</script>

 @if(Session::has('mesas'))

          <script>

          alert("los datos fueron asociados correctamente");

          </script>

           @endif



</body>
</html>
