<?php

use App\Cliente;
use App\Factura;
use App\Esperado;
use App\Documento;
$cliente = Cliente::all();
$contador = 0;
 ?>



<nav class="navbar navbar-default" role="navigation">
<!-- El logotipo y el icono que despliega el menú se agrupan
   para mostrarlos mejor en los dispositivos móviles -->
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse"
        data-target=".navbar-ex1-collapse">
  <span class="sr-only">Desplegar navegación</span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
</button>

<img class="img-responsive ajustar" src="{{asset('images/blanco.png')}}">

</div>
<script src="{{asset('admin/bower_components/jquery/jquery.min.js')}}"></script>
<script>
$(document).ready(function(){
  var notificacion = $('#notificacion').val();
  console.log(notificacion);
  $(".badge").html(notificacion);
});
</script>


<a data-toggle="modal" data-target=".cerrarsession" href="#"><img class=" ajustar-img-user pull-right" src="{{asset('images/usuario.png')}}"></a>
<br>
<p class="pull-right texto-nav">{{ucfirst(Auth::user()->nombres)}}</p>
@include('particiones/cerrarsession')
<div class="collapse navbar-collapse navbar-ex1-collapse">

  <div class="dropdown pull-right noti">
    <a id="dLabel" class="noti" role="button" data-toggle="dropdown" data-target="#" href="/page.html">

      <i style="color:white; font-size:30px;" class="glyphicon glyphicon-bell"></i>
      <span style="background-color:white;color:red;" class="badge"></span>

    </a>

    <ul class="dropdown-menu notifications" role="menu" aria-labelledby="dLabel">

      <div class="notification-heading"><h4 class="menu-title">Facturas incompletas</h4><h4 class="menu-title pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></h4>
      </div>
      <li class="divider"></li>
     <div class="notifications-wrapper">


       @foreach($cliente as $client)

         <?php $esperado = Cliente::find($client->id)->esperados->count(); ?>
         <?php $factura= Factura::where('cliente_id',$client->id)->get(); ?>
         @foreach($factura as $factu)

           <?php $documento = Documento::where('factura_id',$factu->id)->count(); ?>

           <?php $total = $esperado - $documento ?>

           @if($documento != $esperado)
             <?php  $contador++ ?>

               <a class="content" href="{{route('esperado',array($factu->subarea_id,$factu->cliente_id,$factu->ano_id,$factu->mouth_id,$factu->id))}}">
                <div class="notification-item">

                  <h4 class="item-title">{{$factu->nombre}}({{$documento}}/{{$esperado}})<br></strong></h4>
                  <p class="item-info">documentos faltantes <strong style="color:red;">{{$total}}</strong></p>
                </div>
              </a>

          @endif






        @endforeach


       @endforeach


     </div>
      <li class="divider"></li>

    </ul>

  </div>






</div>
</nav>
<input id="notificacion" type="hidden" name="name" value="{{$contador}}">
