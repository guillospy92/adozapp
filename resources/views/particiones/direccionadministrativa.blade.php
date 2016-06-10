@foreach($area3 as $area1)

<div class="col-md-3 ">

  <a href="{{route('clientes',$area1->id)}}" >

  <img class="carpeta img-responsive center-block" src="{{asset('images/carpeta.png')}}">
  <p class="text-center carpeta-texto"><strong>{{$area1->nombres}}</strong></p>

  </a>
  <br><br>


 </div>



@endforeach
