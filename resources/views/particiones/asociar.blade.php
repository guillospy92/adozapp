<div class="modal fade" tabindex="-1" role="dialog" id="mymodalasociar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">asociar cliente con subarea</h4>
      </div>
      <div class="modal-body">
        {!!Form::open(['route'=>'asociar','method'=>'POST'])!!}


                     <div class="form-group">
                        {!!Form::label('inputEmail3', 'Cliente', array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'nombre'))!!}
                         {!!Form:: select('cliente_id',$clientelista,null,['class'=>'form-control','for' => 'exampleInputEmail1','required'])!!}
                   

                       
                    </div>  


                     <div class="form-group">
                        {!!Form::label('inputEmail3', 'Subarea', array('class' => ''),array('for' => 'exampleInputEmail1'), array('placeholder' => 'nombre'))!!}
                         {!!Form:: select('subarea_id',$subarealista,null,['class'=>'form-control','for' => 'exampleInputEmail1','required'])!!}
                   

                       
                    </div>      

                    


       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit">asociar</button>
      {!!Form::close()!!}

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
