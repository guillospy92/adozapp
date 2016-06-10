
<!DOCTYPE html>
<html>
<head>


<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->

		<link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
		<link href="{{asset('css/css-login.css')}}" rel="stylesheet">
		<link href="{{asset('css/css-login2.css')}}" rel="stylesheet">
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.png')}}" />
		<title>adoz login</title>

</head>
<body >




<br><br><br><br><br><br><br>
<div class="col-md-offset-4 col-md-4 ">


	<img class="center-block img-responsive" src="{{asset('images/LOGO-07.png')}}" alt="">
		<br>


			<form role="form" id="myFormLogin" method="POST" action="{{ url('/auth/login') }}">

				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br>

				 	@if (count($errors) > 0)



					@foreach ($errors->all() as $error)
						<span class="error help-block with-errors"><strong>{{$error}}</strong></span>
					@endforeach

					<script type="text/javascript">

					 $("·validar").click(function(){

					 	  $(".input-group").addClass("has-error");

					 	});

					</script>


					@endif

				<div class="input-group ">

				<span class="icono-login input-group-addon"><i class="fondo-icono glyphicon glyphicon-user"></i></span>
				 <strong><input required type="email" class="form-control inputtext"  name="email" value="{{ old('email') }}"></strong>
				  <span class="help-block with-errors"></span>


	 			 </div>
	 			 <br>





	 			  <div class="input-group">
	                       <span class="icono-login input-group-addon"><i class="fondo-icono glyphicon glyphicon-lock"></i></span>
	                        <input required  type="password" class="form-control inputtext " name="password">
	                        <span class="help-block with-errors"></span>
	                    </div>



	  				<br>
	  				 <label class="textonegro " >
					    <input class="" type="checkbox" name="remember" id="remember">
					   Recordarme</label>




				    <span class="olvidar-contrasena"><a class="pull-right olvidar-contrasena" href="#"> <strong>¿olvidastes tu contraseña?</strong> </a></span><br>
				    <br>
				   <input type="submit" class="validar center-block inputboton btn btn-primary " value="Ingresar">

			</form>



	</div>







</body>



<script src="{{asset('admin/bower_components/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/validator.js') }}"></script>

<script>
    $('#myFormLogin').validator()

</script>

</html>
