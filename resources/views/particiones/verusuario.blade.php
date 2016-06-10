<div class="modal fade" tabindex="-1" role="dialog" id="mymodalusuariover">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">detalle del usuario</h4>
      </div>
      <div class="modal-body">
        {!!Form::open(['route'=>'usuarios.store','method'=>'POST'])!!}
                    
                     <div class="form-group">
                        {!!Form::label('inputEmail3', 'Nombres', array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'nombre'))!!}
                    {!!Form::text('nombres', null,['disabled','id'=>'usuarionombre','class'=>'form-control', 'placeholder'=>'Nombres'])!!}
                    </div>

                    <div class="form-group">
                        {!!Form::label('inputEmail3', 'Apellidos', array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'nombre'))!!}
                    {!!Form::text('apellidos', null,['id'=>'usuarioapellido','disabled','class'=>'form-control', 'placeholder'=>'Apellido'])!!}
                    </div>

                     <div class="form-group">
                        {!!Form::label('inputEmail3', 'Usario', array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'nombre'))!!}
                    {!!Form::text('username', null,['id'=>'usuariouser','disabled','class'=>'form-control', 'placeholder'=>'Usuario'])!!}
                    </div>

                      <div class="form-group">
                        {!!Form::label('inputEmail3', 'Email', array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'nombre'))!!}
                    {!!Form::text('email', null,['id'=>'usuarioemail','disabled','class'=>'form-control', 'placeholder'=>'Email'])!!}
                    </div>

                    

                      <div class="form-group">
                        {!!Form::label('inputEmail3', 'Telefono', array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'nombre'))!!}
                    {!!Form::text('telefono', null,['id'=>'usuariotelefono','disabled','class'=>'form-control', 'placeholder'=>'Telefono'])!!}
                    </div>

                     <div class="form-group">
                        {!!Form::label('inputEmail3', 'Direccion', array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'nombre'))!!}
                    {!!Form::text('direccion', null,['id'=>'usuariodireccion','disabled','class'=>'form-control', 'placeholder'=>'Direccion'])!!}
                    </div>

                    <div class="form-group">
                        {!!Form::label('inputEmail3', 'Tipo',
                         array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'nombre'))!!}
                        {!!Form::select('tipo', array(
                        'opcion' => array('Consejo Directivo' => 'Consejo Directivo','Gerencia General'=>'Gerencia General','Direccion Administrativa'=>'Direccion Administrativa','Direccion Medica'=>'Direccion Medica','admin'=>'admin'),
                       
                        ),null,array('id'=>'usuariotipo','disabled','class'=>'form-control'));!!}
                    </div>

                  


               
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
         {!!Form::close()!!}

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->