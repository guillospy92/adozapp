<div class="modal fade" tabindex="-1" role="dialog" id="mymodalupdateano">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">actualizar año</h4>
      </div>
      <div class="modal-body">
        {!!Form::open(['route'=>'actualizarano','method'=>'POST'])!!}

        {!!Form::hidden('id', null,['class'=>'form-control', 'id'=>'idano']) !!}
                    
                     <div class="form-group">
                        {!!Form::label('inputEmail3', 'año', array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'nombre'))!!}
                    {!!Form::text('nombre', null,['class'=>'form-control', 'id'=>'nombreupdateano', 'placeholder'=>'Nombre'])!!}
                    </div>

                    
                    <div class="form-group">
                        {!!Form::label('inputEmail3', 'Estado',
                         array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'nombre'))!!}
                        {!!Form::select('estado', array(
                        'opcion' => array('A' => 'activo','I'=>'inactivo'),
                       
                        ),null,array('class'=>'form-control','id'=>'estadoupdateano'));!!}
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
