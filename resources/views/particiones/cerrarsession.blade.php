<div class="modal fade cerrarsession"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header ">
         <h4 class="modal-title">Adoz</h4>
      </div>
      <div class="modal-body">

        <div class="row">


          <div class="col-md-12">
            <div class="row">
              <div class="col-md-offset-1 col-md-3">
                <br>
                  <img src="{{asset('images/alerta.png')}}" alt="" />
              </div>
              <div class="col-md-8">
                <br>
                  <p class=" cerrar-session"><strong>¿Desea cerrar sessión</strong></p>

              </div>


            </div>



          </div>

        </div>
        <br>

        <div class="row">


          <div class="col-md-offset-4 col-md-9">
            <a class="btn btn-default boton-cerrar-session" href="{{ url('/auth/logout') }}">Si</a>
            <button class="btn btn-default boton-cerrar-session" data-dismiss="modal" >No</button>
            

          </div>

        </div>


      </div>


    </div>

  </div>
</div>
