<div class="modal fade" tabindex="-1" role="dialog" id="mymodalusuario">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">crear nuevo usuario</h4>
      </div>


      <div class="modal-body">
        {!!Form::open(['route'=>'usuarios.store','method'=>'POST','id'=>'myForm'])!!}
        
        <div class="col-md-6">
        <br><br>
        <div class="form-group  ">
                       
                    {!!Form::text('nombres', null,['class'=>'form-control', 'placeholder'=>'Nombres','id'=>'inputName',
                      'maxlength'=>'30','minlength'=>'3','required'

                    ])!!}

                   
                   <span class="help-block with-errors"></span>
                

                    </div>

                    <div class="form-group  ">
                       
                    {!!Form::text('apellidos', null,['class'=>'form-control', 'placeholder'=>'Apellidos','maxlength'=>'30','minlength'=>'3','required'])!!}
                    
                        <span class="help-block with-errors"></span>
                    </div>
                        
                

                     <div class="form-group ">
                       
                    {!!Form::text('username', null,['class'=>'form-control', 'placeholder'=>'digite su Usuario','maxlength'=>'30','minlength'=>'3','required'])!!}
                    
                        <span class="help-block with-errors"></span>
                    </div>

                      <div class="form-group ">
                       
                    {!!Form::email('email', null,['class'=>'form-control', 'placeholder'=>'Email','id'=>'inputEmail','data-error'=>'el correo es invalido tiene que ser algo asi ejemplo@gmail.com','required','placeholder'=>'digite su email'])!!}
                    
                    <div class="help-block with-errors"></div>
                    </div>

                      <div class="form-group">
                        
                    {!!Form::password('password',['class'=>'form-control','data-minlength'=>'8','id'=>'inputPassword','required','placeholder'=>'ingrese su contraseña'])!!}
                    <span class="help-block">como minimo una contraseña de 8 caracteres</span>
                    </div>
          
        </div>

        <div class="col-md-6">
        <br>
        <br>
          

                     <div class="form-group">
                       
                    {!!Form::password('confirmPassword',['class'=>'form-control','id'=>'inputPasswordConfirm','data-match'=>'#inputPassword','data-match-error'=>'las contraseñas no coinciden','placeholder'=>'confirme su contraseña'])!!}
                    <div class="help-block with-errors"></div>
                    </div>

                      <div class="form-group">
                       
                    {!!Form::text('telefono', null,['class'=>'form-control', 'placeholder'=>'Telefono'])!!}
                    
                    </div>

                     <div class="form-group">
                        
                    {!!Form::text('direccion', null,['class'=>'form-control', 'placeholder'=>'Direccion'])!!}
                     
                    </div>

                    <div class="form-group">
                       
                        {!!Form::select('tipo', array(
                        'opcion' => array(''=>'selecione el area que pertenece','Consejo Directivo' => 'Consejo Directivo','Gerencia General'=>'Gerencia General','Direccion Administrativa'=>'Direccion Administrativa','Direccion Medica'=>'Direccion Medica','admin'=>'admin'),
                       
                        ),null,array('class'=>'form-control','required'));!!}
                       <span class="help-block with-errors">este campo es requerido</span>

                    </div>

                       <div class="form-group">
                       
                        {!!Form::select('estado', array(
                        'opcion' => array(''=>'selecione un estado','A' => 'activo','I'=>'inactivo'),
                       
                        ),null,array('class'=>'form-control','required','data-placeholde'=>'selecione un estado'));!!}
                        <span class="help-block with-errors">este campo  es requerido</span>
                    </div>
        </div>

        

 
                    
                     


                   
                    
                


                
               
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        {!! Form::submit('crear',['class'=>'btn btn-primary','id'=>'confirmation']) !!}
         {!!Form::close()!!}

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->