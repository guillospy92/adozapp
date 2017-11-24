<!DOCTYPE html>
<html>
<head>
  <title>Adoz lo hace facil</title>
  <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
  <link href="{{asset('css/app.css')}}" rel="stylesheet">
  <link href="{{ asset('css/dist/style.css') }}" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.png')}}" />
   <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">

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

				 <div class="col-md-2" style="margin-bottom: 15px;">
                  <a href="#" style="color: black" data-path="{{ asset('uploads/'.str_replace(' ', '%20', $sub->file)) }}" class="obtenerruta">
                     <p class="text-center">
                        <span style="font-size: 61px; color: #d6d2d2" class="fa fa-file-pdf-o text-center">
                        </span><br>
                         <span class="text-center" style="font-size: 10px;">
                          {!! substr($sub->name,0,23) !!}
                        </span>
                     </p>
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
   </div
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
<script>
     $('.obtenerruta').click(function(){
      $("#visordocumento").modal('show');
      $('.visor').empty();
      var visor = $(".visor");
      var path = $(this).data('path');
      visor.append("<embed src="+path+" width='1000' height='375'>");
   });
</script>
</body>
</html>