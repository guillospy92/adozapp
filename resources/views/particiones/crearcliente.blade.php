<div class="modal fade" tabindex="-1" role="dialog" id="mymodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">crear nuevo cliente</h4>
      </div>
      <div class="modal-body">
        {!!Form::open(['route'=>'clientes.store','method'=>'POST','id'=>'myFormCliente'])!!}

                      <div class="form-group has-feedback">
                        {!!Form::label('inputEmail3', 'Nombre', array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'nombre'))!!}
                    {!!Form::text('nombre', null,['class'=>'form-control', 'placeholder'=>'Digite el nombre del cliente','required','maxlength'=>'30','minlength'=>'3'])!!}
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                    </div>


                    <div class="form-group">
                        {!!Form::label('inputEmail3', 'Estado',
                         array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'nombre'))!!}
                        {!!Form::select('estado', array(
                        'opcion' => array(''=>'escoga un estado','A' => 'activo','I'=>'inactivo'),

                        ),null,array('class'=>'form-control','required'));!!}
                    </div>








      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit">crear</button>
         {!!Form::close()!!}

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
