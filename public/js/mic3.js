var chart;
var chardata = [];

   
    $(document).ready(function() {
      $('#bar,#pie,#donut').click(function(){

        chart.transform(this.id)

      });


       $("#anos").change(function(event){

          $("#chart").css("display", "none");
           $("#cargar").addClass('fa-refresh');
            $.get("obtenerjson/"+event.target.value+"",function(response,subareas){
           //$.get("http://localhost/adozapp/public/obtenerjson/"+event.target.value+"",
            //function(res,state){

              chardata = [];
              var arr;
              

              for(i=0; i<res.length;i++){


                
                console.log(res[i].nombre,res[i].mouth.nombre);
               


                 }

              });

        
       });

      
       $("#cargar").addClass('fa-refresh');
      $.get("obtenerjson/",function(res,factura){
        //$.get("http://localhost/adozapp/public/obtenerjson",function(res,factura){

        chardata = [];
        var arr;

      


      for(i=0; i<res.length;i++){



        arr = [res[i].nombre,res[i].facturas.length];
        chardata.push(arr)


      }



      chart =  c3.generate({

          bindto: "#chart",
          data : {
            type : 'bar',
            columns: chardata

          },

          bar : {

            width:{

              ratio:1
            }

          },

          tooltip: {
            format: {
              title: function (x) { return 'total facturas'  }
            }
          },

          axis:{
            //rotated:true,
            y:{

              label: 'cantidad de facturas'

            },

            x:{
              show: true, 
              label:'meses'
            }

          }



      });

       $("#cargar").removeClass('fa-refresh');


      });














        });
