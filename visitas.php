<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
		
		$("#respuesta_grafica_lineal").load("enviar_visitas_fecha.php",{},function event(){
			crear_grafica_lineas();
		});
		//dibujar();
		
		var aprovar = "no";
	    //Inicio de camino
	    

		var auto_refresh = setInterval(

            function traer_datos()
            {
                    $("#respuesta_visitas").load("enviar_visitas.php",{},function event(){
						crear_grafica();
					});
            },2000);
		function crear_grafica_lineas(){
			//alert("mi")
			var alto = $("#lienzo1").height();
			var ancho= $("#lienzo1").width();
			//var alto_barra = ((alto-10)/10);   	//el alto de las barras horizontales que daran el total
			//var posicion = alto;				//la posicion dende comienza a generar las barras
			var cadena_html="";
			var maximo=0;
			var maximo_grafica=0;
			var apuntador="";
			var ancho_disponible=(ancho-(ancho*0.1));
			var paleta_colores="ivory,lightcyan,pink,chocolate,lightblue,plum,coral,lightgreen,silver,orange,peru,yellowgreen";
			var colores=paleta_colores.split(",");	
			var nombres = $("#nombres_lineal").val();
			var nombres_c=nombres.split(",");
			var fechas = $("#fechas_lineal").val();
			var fechas_c=fechas.split(",");
			var valores =	$("#valores_lineal").val();
			var valores_c=valores.split(",");
			var cantidad_items = $("#cantidad_items").val();
			var dias = $("#dias").val();
			

			for(j=0;j<(cantidad_items*dias);j++){
				if(parseFloat(valores_c[j])>parseFloat(maximo)){	
					maximo=valores_c[j];
					}
					
			}			
	
			if(maximo<10){
				maximo_grafica=10;
			}else if(maximo>=10  && maximo<100){
				maximo_grafica=parseFloat(maximo)+5;
			}else if(maximo>=100 && maximo<1000){
				maximo_grafica=parseFloat(maximo)+50;
			}else if(maximo>=1000 && maximo<10000){
				maximo_grafica=parseFloat(maximo)+500;
			}
			
			var aumento_grafica=(maximo_grafica/10);
			
			var posicion_lineas=(alto-(alto/10));
			
			var lienzo = document.getElementById("lienzo1").getContext("2d");
			
			lienzo.strokeStyle = "white";
			lienzo.beginPath();
			lienzo.fillStyle="white";
    		lienzo.font="12px Arial";

			lienzo.moveTo(0, posicion_lineas);
			var contador_grafica=0;
			lienzo.fillText("0",0,alto)
			for(i=1;i<=10;i++){
				contador_grafica=contador_grafica+aumento_grafica;
				lienzo.lineTo(ancho,posicion_lineas);
				lienzo.fillText(contador_grafica,0,posicion_lineas)
				posicion_lineas=posicion_lineas-(alto/10);
				lienzo.moveTo(0,posicion_lineas);
			}
			lienzo.stroke();
			var posicion_x=(ancho-ancho_disponible);
			var aumento_x=(ancho_disponible/dias);
			var posicion=0;
			var mn=0;
			lienzo.strokeStyle = colores[mn];
			for(j=0;j<(cantidad_items*dias);j++){

				posicion=(alto-((valores_c[j]*alto)/maximo_grafica));
				
				if((j%dias)==0){
					
					
					posicion_x=(ancho-ancho_disponible);
					lienzo.moveTo(posicion_x,posicion);
					mn++;	
				}
				lienzo.lineTo(posicion_x,posicion);
				posicion_x=posicion_x+aumento_x;
			}
			
			lienzo.stroke();
			
		}				
		function crear_grafica(){
		    //Trazar linea
			var alto = $("#grafica").height(); 	//el alto total del div donde va a estar la grafica
			var alto_barra = ((alto-10)/10);   	//el alto de las barras horizontales que daran el total
			var posicion = alto;				//la posicion dende comienza a generar las barras
			var cadena_html="";					//declaro la cadena html donde se crearan las barras
			var posicion_columna=($("#grafica").width()*0.1);
			var maximo=0;
			var maximo_grafica=0;
			var apuntador="";
			var ancho_disponible=($("#grafica").width()-($("#grafica").width()*0.1));
			var ancho_columnas=(ancho_disponible-(((ancho_disponible/$("#cantidad_columnas").val())/5)*$("#cantidad_columnas").val()))/$("#cantidad_columnas").val();
			var paleta_colores="ivory,lightcyan,pink,chocolate,lightblue,plum,coral,lightgreen,silver,orange,peru,yellowgreen";
			var colores=paleta_colores.split(",");
			var contador_grafica=0;
			var textos =	$("#nombres").val();
			var nombre_barra = textos.split(",");
			var valores = $("#valores").val();
			var valor_barra	= valores.split(",");
			for(j=0;j<$("#cantidad_columnas").val();j++){
				cadena_html=cadena_html+"<div id="+nombre_barra[j]+" class=columna ></div>";
				if(parseFloat(valor_barra[j])>parseFloat(maximo)){	
					maximo=valor_barra[j];
				}
				
			}

			if(maximo<10){
				maximo_grafica=10;
			}else if(maximo>=10  && maximo<100){
				maximo_grafica=parseFloat(maximo)+5;
			}else if(maximo>=100 && maximo<1000){
				maximo_grafica=parseFloat(maximo)+50;
			}else if(maximo>=1000 && maximo<10000){
				maximo_grafica=parseFloat(maximo)+500;
			}
			
			var aumento_grafica=maximo_grafica/10;
			for(i=1;i<=10;i++){
				contador_grafica=contador_grafica+aumento_grafica;
				cadena_html=cadena_html+"<div class=opcion >"+contador_grafica+"</div>"; //agrego a la cadena lo que tenia la cadena mas una nueva div
			}

			cadena_html=cadena_html+"<div id=leyenda>";
			for(k=0;k<$("#cantidad_columnas").val();k++){
				cadena_html=cadena_html+"<label class=leyenda_nombre >"+nombre_barra[k]+"</label><label class=leyenda_valor >"+valor_barra[k]+"</label><label class=leyenda_muestra  style=background:"+colores[k]+">.</label><br>";
			}
			cadena_html=cadena_html+"</div>"
			$("#grafica").html(cadena_html);	//agrego a la div principal la cadena html donde estan todas las div
			$(".opcion").each(function(){		//recorro todas las barras
				posicion=posicion-(alto_barra+1);	//en la posicion que va a estar esta barra seria el total de la div menos el alto de de la barra + el total del borde
				$(this).css("top", posicion);	//le doy una posicion de tope para ir dejandolos en cascada o apilarlas
			});
			
			for(x=0;x<$("#cantidad_columnas").val();x++){
				apuntador="#"+nombre_barra[x];
				alto_bar=((valor_barra[x]*alto)/maximo_grafica);
				$(apuntador).css("height",alto_bar);
				$(apuntador).css("top", (alto-alto_bar));
				$(apuntador).css("background", colores[x]);

				$(apuntador).css("left", posicion_columna);
				$(apuntador).css("width", ancho_columnas);
				
				posicion_columna=posicion_columna+ancho_columnas+((ancho_disponible/$("#cantidad_columnas").val())/5);
					
			}
			if(aprovar=="no"){
				
				aprovar="si";
			}
		    

			
			$(".opcion").css("height", alto_barra);	//le digo a las barras que tengan un mismo alto
			
		}
		crear_grafica();
		
	});



function retornarLienzo(x)
{
   var canvas = document.getElementById(x);
   if (canvas.getContext) 
   {
     var lienzo = canvas.getContext("2d");   
     return lienzo;
   }
   else
     return false;
}

function dibujar()
{
   var lienzo=retornarLienzo("lienzo1");
   if (lienzo)
   { 
     lienzo.strokeStyle = "white";
    //Inicio de camino
    lienzo.beginPath();
    lienzo.moveTo(0,10);
    lienzo.lineTo(150,300);
    lienzo.lineTo(200,100);
    //Trazar linea
    lienzo.stroke();
   }
}
</script>
<style type="text/css">
	.leyenda_muestra{
		width: 25px;	
	}
	.leyenda_valor{
		width: 50px;
		text-align: center;
		
	}
	.leyenda_nombre{
		width: 125px;
		
		
	}
	#leyenda label{
		display: inline-block;
	}
	.opcion{
		background: mediumslateblue;
		border-top: 1px dotted white;
		position: absolute;
		width: 100%;
		z-index: 0;
		color: white;
	}
	#grafica{
		position: absolute;
		width: 500px;
		height: 300px;
		background: red;
		box-shadow: 0px 0px 10px black;
	} 
	.columna{
		position: absolute;
		background: green;
		box-shadow: 2px -2px 3px black; 
		z-index: 2;
		text-align: center;
	}
	#leyenda{
		position: absolute;
		left: 550px;
		width: 200px;
		box-shadow: 3px 0px 5px black;
	}
	
	canvas{
		background: black;
		position: absolute;
		top: 350px;
	}	
</style>

<div id="grafica">

</div>
<div id="respuesta_visitas">

</div>
<div id="respuesta_grafica_lineal"></div>
<canvas  id="lienzo1" width="500" height="300">
Su navegador no permite utilizar canvas.
</canvas>