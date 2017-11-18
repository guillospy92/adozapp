<?php    
 /* Categoría: Gráfico de Barras */ 

 /* Declaramos las librerías pChart */ 
 include("pChart2.1.4/class/pData.class.php"); 
 include("pChart2.1.4/class/pDraw.class.php"); 
 include("pChart2.1.4/class/pImage.class.php"); 

 /* --> \\ CREAMOS Y LLENAMOS EL OBJETO "pData: DATOS PARA EL GRÁFICO" // <--*/ 
 $MyData = new pData();   
 // Preparamos los juegos de datos a mostrar "Valores del eje Y"
 $MyData->addPoints(array(1,0,4,2),"Alex"); 
 $MyData->addPoints(array(5,7,3,1),"Carlos"); 
 // Título del eje Y Axis
 $MyData->setAxisName(0,"Experiencia");
 // Valores del eje X
 $MyData->addPoints(array("C++","Java","PHP","PASCAL"),'Lenguajes');
 $MyData->setSerieDescription('Lenguajes','Lenguajes de Programación');
 // Título del eje X Abscisa
 $MyData->setAbscissa('Lenguajes'); 

 /* --> \\ CREAMOS EL OBJETO pChart Y LO ASOCIAMOS CON LOS DATOS PARA EL GRÁFICO pData" // <--*/
 $myPicture = new pImage(700,280,$MyData); 
 $myPicture->drawGradientArea(0,0,700,280,DIRECTION_VERTICAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>100)); 
 $myPicture->drawGradientArea(0,0,700,280,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>20)); 
 // Se establece el tipo de fuente para el gráfico 
 $myPicture->setFontProperties(array("FontName"=>"pChart2.1.4/fonts/pf_arma_five.ttf","FontSize"=>8));
 
 // Definimos el título para el gráfico
 $myPicture->drawText(220,20,"Lenguajes de Programación",array("FontSize"=>14,"Align"=>TEXT_ALIGN_BOTTOMLEFT));
 $myPicture->drawText(300,40,"Los más usados",array("FontSize"=>10,"Align"=>TEXT_ALIGN_BOTTOMLEFT));
 
 /* Dibujamos la escala  */ 
 $myPicture->setGraphArea(50,50,680,250);
 $myPicture->drawScale(array("Mode" => SCALE_MODE_START0,"CycleBackground"=>TRUE,"DrawSubTicks"=>TRUE,"GridR"=>0,"GridG"=>0,"GridB"=>0,"GridAlpha"=>10));
 
 /* Establecemos la sombra para el gráfico */  
 $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 

 
 /* Dibujamos el gráfico */ 
 $settings = array("Gradient"=>TRUE,"DisplayPos"=>LABEL_POS_INSIDE,"DisplayValues"=>TRUE,"DisplayR"=>255,"DisplayG"=>255,"DisplayB"=>255,"DisplayShadow"=>TRUE,"Surrounding"=>10);
 $myPicture->drawBarChart($settings); 

 /* Dibujamos la leyenda para el gráfico */ 
 $myPicture->drawLegend(580,12,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL)); 

 /* --> \\ CREANDO LA IMÁGEN // <-- */ 
 $myPicture->autoOutput("pictures/example.drawBarChart.shaded.png");
?>