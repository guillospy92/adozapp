<div class="modal fade" tabindex="-1" role="dialog" id="mymodalusuarioactualizar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">actualizar usuario</h4>
      </div>
      <div class="modal-body">
        {!!Form::open(['route'=>'actualizarusuario','method'=>'POST'])!!}

              {!!Form::hidden('id', null,['id'=>'idusuarios','class'=>'form-control', 'placeholder'=>'Nombres'])!!}

                     <div class="form-group">
                        {!!Form::label('inputEmail3', 'Nombres', array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'nombre'))!!}
                    {!!Form::text('nombres', null,['id'=>'actualizarnombres','class'=>'form-control', 'placeholder'=>'Nombres'])!!}
                    </div>

                    <div class="form-group">
                        {!!Form::label('inputEmail3', 'Apellidos', array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'nombre'))!!}
                    {!!Form::text('apellidos', null,['id'=>'actualizarapellidos','class'=>'form-control', 'placeholder'=>'Apellido'])!!}
                    </div>

                     <div class="form-group">
                        {!!Form::label('inputEmail3', 'Usario', array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'nombre'))!!}
                    {!!Form::text('username', null,['id'=>'actualizarusername','class'=>'form-control', 'placeholder'=>'Usuario'])!!}
                    </div>

                      <div class="form-group">
                        {!!Form::label('inputEmail3', 'Email', array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'nombre'))!!}
                    {!!Form::text('email', null,['id'=>'actualizaremail','class'=>'form-control', 'placeholder'=>'Email'])!!}
                    </div>

                      <div class="form-group">
                        {!!Form::label('inputEmail3', 'Contraseña', array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'Contrasena'))!!}
                    {!!Form::text('password', null,['id'=>'actualizarpassword','class'=>'form-control', 'placeholder'=>'Contraseña'])!!}
                    </div>

                      <div class="form-group">
                        {!!Form::label('inputEmail3', 'Telefono', array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'nombre'))!!}
                    {!!Form::text('telefono', null,['id'=>'actualizartelefono','class'=>'form-control', 'placeholder'=>'Telefono'])!!}
                    </div>

                     <div class="form-group">
                        {!!Form::label('inputEmail3', 'Direccion', array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'nombre'))!!}
                    {!!Form::text('direccion', null,['id'=>'actualizardireccion','class'=>'form-control', 'placeholder'=>'Direccion'])!!}
                    </div>



                       <div class="form-group">
                        {!!Form::label('inputEmail3', 'Estado',
                         array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'nombre'))!!}
                        {!!Form::select('estado', array(
                        'opcion' => array('A' => 'activo','I'=>'inactivo'),

                        ),null,array('id'=>'actualizarestado','class'=>'form-control'));!!}
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