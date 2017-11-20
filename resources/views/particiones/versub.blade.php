<div class="modal fade" tabindex="-1" role="dialog" id="mymodalversub">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">detalle del año</h4>
      </div>
      <div class="modal-body">
       {!!Form::open(['route'=>'actualizarsub','method'=>'POST'])!!}

        {!!Form::hidden('id', null,['class'=>'form-control', 'id'=>'idsubarea']) !!}


                     <div class="form-group">
                        {!!Form::label('inputEmail3', 'Nombre', array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'nombre'))!!}
                    {!!Form::text('nombres', null,['class'=>'form-control', 'id'=>'nombreversub', 'placeholder'=>'Nombre','required'])!!}
                    </div>




                         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button class="btn btn-primary" type="submit">actualizar</button>

         {!!Form::close()!!}

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
