
$(document).ready(function() {
  
  $(document).on('click','.pagination a',function(e){
   e.preventDefault();
   var page = $(this).attr('href').split('page=')['1'];
   var route = $(this).attr('href').split('?page=')['0'];
   $("#cargar").addClass('fa-refresh');
   $.ajax({
       url: route,
       data: {page: page},
       type: 'GET',
       dataType: 'json',
       success: function(data){
          $("#cargar").removeClass('fa-refresh');
           $('.data').html(data);
       }
   });
   
 });


    $('.actualizar').click(function(){

        var id = $(this).data('path');
        var route = "/clientes/"+id+"/edit";

        $.get(route,function(res){

            $("#nombreupdate").val(res.nombre);
            $("#estadoupdate").val(res.estado);
            $("#idcliente").val(res.id);



        });
    });


    $('.vercliente').click(function(){

        var id = $(this).data('path');
        var route = "/clientes/"+id+"/";
        $.get(route,function(res){

            $("#nombrever").val(res.nombre);
            $("#estadover").val(res.estado);
            $("#fechaver").val(res.created_at);
            var nombre = res.nombre
            modal_title.html('Detalle del cliente: ' + nombre);



        });
    });

    $('.verano').click(function(){

        var id = $(this).data('path');
        var route = "/anos/"+id+"/";
        $.get(route,function(res){

            $("#nombreverano").val(res.nombre);
            $("#estadoverano").val(res.estado);
            $("#fechaverano").val(res.created_at);

        });
    });

    $('.actualizarano').click(function(){

        var id = $(this).data('path');
        var route = "/anos/"+id+"/edit";

        $.get(route,function(res){

            $("#nombreupdateano").val(res.nombre);
            $("#estadoupdateano").val(res.estado);
            $("#idano").val(res.id);



        });
    });


     $('.verusuario').click(function(){

        var id = $(this).data('path');
        var route = "/usuarios/"+id+"/";
        $.get(route,function(res){

            $("#usuarionombre").val(res.nombres);
            $("#usuarioapellido").val(res.apellidos);
            $("#usuariouser").val(res.username);
            $("#usuarioemail").val(res.email);
            $("#password").val(res.password);
            $("#usuariotelefono").val(res.telefono);
            $("#usuariodireccion").val(res.direccion);
            $("#usuariotipo").val(res.tipo);
            $("#estadou").val(res.estado);

        });
    });



    $('.actualizarusuario').click(function(){

        var id = $(this).data('path');
        var route = "/usuarios/"+id+"/edit";

        $.get(route,function(res){

            $("#actualizarnombres").val(res.nombres);
            $("#actualizarapellidos").val(res.apellidos);
            $("#actualizarusername").val(res.username);
            $("#actualizaremail").val(res.email);
            $("#actualizarpassword").val(res.password);
            $("#actualizartelefono").val(res.telefono);
            $("#actualizardireccion").val(res.direccion);
            $("#actualizartipo").val(res.tipo);
             $("#actualizarestado").val(res.estado);
            $("#idusuarios").val(res.id);



        });
    });

});
