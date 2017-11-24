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
 <div  class=" container-fluid">

 	<div class="col-md-12">

 		<div class="row">

 		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

  <div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          estas ordenanzas coinciden con su busqueda
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">

      	@if(count($archivo) != 0)
    	  <div class="row">
					@foreach($archivo as $sub)

				<div class="col-md-2 col-xs-3 col-sm-3">
				 <a   href="{{route('archivo',['subarea' => $sub->subarea_id,'ano' => $sub->ano_id,'name'=> $sub->name])}}" >
				     <img class="carpeta img-responsive center-block" src="{{asset('images/carpeta.png')}}">
				     <p class="text-center carpeta-texto"><strong>{{$sub->name}}</strong></p>
				 </a>
			</div>

			  @endforeach

		</div>
		@else
		no hay ordenanzas que coincidan con su busqueda
		@endif
      </div>
    </div>
  </div>

</div>


 		</div>
 	</div>
 </div>

  <footer style="bottom: 0; position: fixed; width: 100%;">
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




<script src="{{asset('admin/bower_components/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
</body>
</html>