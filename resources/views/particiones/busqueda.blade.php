
<div class="modal fade" id="myModalbusqueda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Busqueda avanzada</h4>
      </div>
      <div class="modal-body">

      {!!Form::open(['route'=>'busquedaavanzada','method'=>'POST'])!!}

      <div class="form-group">
        <label for="">Nombre</label>
        {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'nombre de la factura o nombre del archivo o tipo de archivo'])!!}

      </div>
      
      <p class="text-center">busque por una fecha especifica o por rango de fecha</p><br>
        <div class="form-inline">
         <div class="form-group">
            
              <div class="input-group">
                <input type="text" class="form-control datepicker" name="date" placeholder="fecha de subida de factura o archivo">
                  <div class="input-group-addon">
                   <span class="glyphicon glyphicon-th"></span>
                  </div>
              </div>
          </div>

          <div class="form-group">
            <label for="date">rango por fecha </label>
              <div class="input-group">
                <input type="text" class="form-control datepicker" name="date2" placeholder="fecha de subida de factura o archivo">
                  <div class="input-group-addon">
                   <span class="glyphicon glyphicon-th"></span>
                  </div>
              </div>
          </div>
          </div>

    
    

       

                     
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Buscar</button>
      </div>
        {!!Form::close()!!}
    </div>
  </div>
</div>

