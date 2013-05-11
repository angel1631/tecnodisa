<? 	require_once("granlibreria.php");
	encabezado("portafolio");
?>
		<script type="text/javascript" src="http://jqueryrotate.googlecode.com/svn/trunk/jQueryRotate.js"></script>
	<script type="text/javascript">
	

	$(document).ready(function(){
		
		var seleccion			= $();
		var ancho_inicial		= 0;
		var alto_inicial		= 0;
		var posicion_x			= 0;
		var posicion_y			= 0;
		var valor_x				= 0;
		var valor_y				= 0;
		var ancho_marco			= 400;
		var alto_marco			= 400;
		var ancho_marco_segundo	= 450;
		var alto_marco_segundo	= 400;
		var limite_marco_ancho	= ancho_marco*0.9;
		var limite_marco_alto 	= alto_marco*0.9; 
		var x					= 0;
		var proporcion			= 0;
		var signo				= "";
		var anterior			=$();
		var incremental			=0;
		$(".marco_rotar_imagenes").css("width", ancho_marco);
		$(".marco_rotar_imagenes").css("height", alto_marco);
		//$(".marco_rotar_imagenes").css("overflow", "hidden")
		$(".marco_rotar_imagenes img").each(function(){
			
			$(this).css("z-index", incremental);
			//ancho_inicial=$(this).width();
			//alto_inicial=$(this).height();
			if(ancho_inicial>alto_inicial){
				proporcion=alto_inicial/ancho_inicial;
				if(ancho_inicial>limite_marco_ancho){
					
					//$(this).width(limite_marco_ancho);
					//$(this).height(limite_marco_ancho*proporcion);
					redimensionar($(this));
					centrar($(this));
					rotar($(this));					
				}else{
					redimensionar($(this));
					centrar($(this));
					rotar($(this));
				}
			}else{
				//proporcion=ancho_inicial/alto_inicial;
				if(alto_inicial>limite_marco_alto){
					//$(this).height(limite_marco_alto);
					//$(this).width(limite_marco_alto*proporcion);
					redimensionar($(this));
					centrar($(this));
					rotar($(this));
				}else{
					redimensionar($(this));
					centrar($(this));
					rotar($(this));
				}
			}
			
			//$(this).width(ancho_marco*0.8);	
			x=x+1;
			incremental=incremental+1;
		});
		function centrar(elemento){
				ancho_inicial=elemento.width();
				alto_inicial=elemento.height();
				if(ancho_inicial>alto_inicial){
					posicion_x=(ancho_marco-ancho_inicial)/2;
					posicion_y=(alto_marco-(ancho_inicial*proporcion))/2;
					elemento.css("top", posicion_y);
					elemento.css("left", posicion_x);
				}else{
					posicion_y=(alto_marco-alto_inicial)/2;
					posicion_x=(ancho_marco-ancho_inicial)/2;
					elemento.css("top",posicion_y);
					elemento.css("left", posicion_x);
				}
		}
		function regresar_x(){
			
		}
		function redimensionar(elemento){
			ancho_inicial=elemento.width();
			alto_inicial=elemento.height();
			if(ancho_inicial>alto_inicial){
				proporcion=alto_inicial/ancho_inicial;
				if(ancho_inicial>limite_marco_ancho){
					
					elemento.width(limite_marco_ancho);
					elemento.height(limite_marco_ancho*proporcion);
				}
			}else{
				proporcion=ancho_inicial/alto_inicial;
				if(alto_inicial>limite_marco_alto){
					elemento.height(limite_marco_alto);
					elemento.width(limite_marco_alto*proporcion);
				}
			}
		}
		function redimensionar_x(elemento){
			ancho_inicial=elemento.width();
			alto_inicial=elemento.height();

			if(ancho_inicial>alto_inicial){
				proporcion=alto_inicial/ancho_inicial;
				//alert(proporcion);
				
					valor_x=ancho_marco_segundo;
				
			}else{
				proporcion=ancho_inicial/alto_inicial;
				
					valor_x=alto_marco_segundo*proporcion;
				
			}
			return valor_x;
			
		}
		function redimensionar_y(elemento){
			ancho_inicial=elemento.width();
			alto_inicial=elemento.height();
			if(ancho_inicial>alto_inicial){
				proporcion=alto_inicial/ancho_inicial;
				
					valor_y=(ancho_marco_segundo*proporcion);
				
			}else{
				proporcion=ancho_inicial/alto_inicial;
				
					valor_y=alto_marco_segundo;
				
			}
			return valor_y;
		}
		function centrar_derecha(elemento, limite_marco){
			ancho_inicial=elemento.width();
				//alto_inicial=elemento.height();
				if(ancho_inicial>alto_inicial){
					posicion_x=(limite_marco-ancho_inicial)/2;
					//posicion_y=(alto_marco-(ancho_inicial*proporcion))/2;
					
				}else{
					//posicion_y=(alto_marco-alto_inicial)/2;
					posicion_x=(limite_marco-ancho_inicial)/2;
					
				}
			return posicion_x;
		}
		function centrar_arriba(elemento, limite_marco){
				//ancho_inicial=elemento.width();
				alto_inicial=elemento.height();
				if(ancho_inicial>alto_inicial){
					//posicion_x=(ancho_marco-ancho_inicial)/2;
					posicion_y=(limite_marco-(ancho_inicial*proporcion))/2;
					
				}else{
					posicion_y=(limite_marco-alto_inicial)/2;
					//posicion_x=(ancho_marco-ancho_inicial)/2;
					
				}
			return posicion_y;
		}
		function rotar(elemento){
			numero_aleatorio=Math.round(Math.random()*360);
			if(Math.round(Math.random()*10)>=5){
				signo="+";
			}else{
				signo="-";
			}
			
			elemento.rotate({
		      angle:0, 
		      animateTo: numero_aleatorio 
		     
		   });
		}
		function sacar(elemento,nueva_posicion){
			
			incremental=incremental+1;
			redimensionar(anterior);
			anterior.animate({"left": centrar_derecha(anterior, ancho_marco), "top": centrar_arriba(anterior,alto_marco)},2000,function event(){
				$(this).css("box-shadow", "0px 0px 0px #000");
				});
			//alert(redimensionar_x(elemento));
			elemento.animate({"left": (centrar_derecha(elemento, ancho_marco_segundo)+ancho_marco), "top": centrar_arriba(elemento, alto_marco_segundo), "width": redimensionar_x(elemento), "height": redimensionar_y(elemento)},2000,function event(){
				$(this).css("box-shadow", "0px 0px 5px #000");
				rotar(anterior);
				anterior = elemento;
				//elemento.css("-webkit-transform", "rotate(0deg)");
				elemento.rotate({
					angle:360,
					animateTo: 0
				});
				elemento.css("z-index", incremental);
				
			});
		}
		function regresar(elemento){

		}	
		$(".marco_rotar_imagenes img").click(function event(){

			//anterior.animate("z-index": "10");
			
			sacar($(this),425);
			//$(this).css("z-index", "12");
			//anterior.css("display","none");
			
			
		});
		
		
		
	
		
	});
</script>
<style type="text/css">
	.marco_rotar_imagenes{
		
		position: absolute;
	}
	.marco_rotar_imagenes img{
		position: absolute;
		cursor: hand;
		
	}
</style>
<div class="marco_rotar_imagenes">
	<img src="rotar_imagen/1.jpg" width="1350" height="665">
	<img src="rotar_imagen/2.png" width="1288" height="802">
	<img src="rotar_imagen/3.png" width="1288" height="802">
	<img src="rotar_imagen/4.png" width="1277" height="805">
	<img src="rotar_imagen/5.png" width="1282" height="803">
	<img src="rotar_imagen/6.png" width="1282" height="805">
	<img src="rotar_imagen/7.png" width="1366" height="768">
	<img src="rotar_imagen/8.png" width="1366" height="768">
	<img src="rotar_imagen/9.png" width="1366" height="768">

</div>

<?
	pie();
?>