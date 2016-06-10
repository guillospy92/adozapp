<div class="modal fade" tabindex="-1" role="dialog" id="mymodalverano">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">detalle del año</h4>
      </div>
      <div class="modal-body">
        {!!Form::open()!!}

        
                     <div class="form-group">
                        {!!Form::label('inputEmail3', 'Nombre', array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'nombre'))!!}
                    {!!Form::text('nombre', null,['class'=>'form-control', 'id'=>'nombreverano', 'placeholder'=>'Nombre','disabled'])!!}
                    </div>



                     <div class="form-group">
                        {!!Form::label('inputEmail3', 'estado', array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'nombre'))!!}
                    {!!Form::text('nombre', null,['class'=>'form-control', 'id'=>'estadoverano', 'placeholder'=>'Nombre','disabled'])!!}
                    </div>



                     <div class="form-group">
                        {!!Form::label('inputEmail3', 'Fecha', array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'nombre'))!!}
                    {!!Form::text('nombre', null,['class'=>'form-control', 'id'=>'fechaverano', 'placeholder'=>'Nombre','disabled'])!!}
                    </div>

                    
                    


                         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
         {!!Form::close()!!}

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
