  <div class="row">
@foreach($dato as $sub)

<div class="col-md-2 col-xs-3 col-sm-3">
 <a   href="{{route('esperado',array($archivo,$client,$anomandado,$mesmandado,$sub->id))}}" >
     <img class="carpeta img-responsive center-block" src="{{asset('images/carpeta.png')}}">
     <p class="text-center carpeta-texto"><strong>{{$sub->nombre}}</strong></p>
 </a>
</div>

  @endforeach
</div>
  <div class="row">
    <div class="col-md-offset-4 col-md-4">
      <br>
        {!!$dato->render()!!}
        <br>

    </div>

  </div>
