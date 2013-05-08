<?	session_start();
	require_once("granlibreria.php");
	function getRealIP()
{
 
   if( $_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
   {
      $client_ip = 
         ( !empty($_SERVER['REMOTE_ADDR']) ) ? 
            $_SERVER['REMOTE_ADDR'] 
            : 
            ( ( !empty($_ENV['REMOTE_ADDR']) ) ? 
               $_ENV['REMOTE_ADDR'] 
               : 
               "unknown" );
 
      // los proxys van añadiendo al final de esta cabecera
      // las direcciones ip que van "ocultando". Para localizar la ip real
      // del usuario se comienza a mirar por el principio hasta encontrar 
      // una dirección ip que no sea del rango privado. En caso de no 
      // encontrarse ninguna se toma como valor el REMOTE_ADDR
 
      $entries = preg_split('/[, ]/', $_SERVER['HTTP_X_FORWARDED_FOR']);
 
      reset($entries);
      while (list(, $entry) = each($entries)) 
      {
         $entry = trim($entry);
         if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
         {
            // http://www.faqs.org/rfcs/rfc1918.html
            $private_ip = array(
                  '/^0\./', 
                  '/^127\.0\.0\.1/', 
                  '/^192\.168\..*/', 
                  '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/', 
                  '/^10\..*/');
 
            $found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);
 
            if ($client_ip != $found_ip)
            {
               $client_ip = $found_ip;
               break;
            }
         }
      }
   }
   else
   {
      $client_ip = 
         ( !empty($_SERVER['REMOTE_ADDR']) ) ? 
            $_SERVER['REMOTE_ADDR'] 
            : 
            ( ( !empty($_ENV['REMOTE_ADDR']) ) ? 
               $_ENV['REMOTE_ADDR'] 
               : 
               "unknown" );
   }
 
   return $client_ip;
 
}   
	function encabezado($pagina){ //esta funcion me servira para no estar creando el encabezado en todas las paginas y para cuando tenga que modificar algo solo modifico este
	$hoy=date('Y-m-d');
    $momento=date('H:i:s');
    @$db = mysql_pconnect("tecnodisacom.ipagemysql.com", "tecnodisa_1514", "angel_1631");
         
    @       mysql_select_db("tecnodisa");
   
    mysql_query("INSERT INTO visitas VALUES('','$pagina', '$hoy', '$momento', '".getRealIP()."')");
    ?>
    <style type="text/css">
            #publicar{
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0px;
                left: 0px;
                background: rgba(0,0,0,0.5);
                z-index: 50;
            }
            #imagen_publicidad{
                position: absolute;
                left: 0px;
                right: 0px;
                margin-left: auto;
                margin-right: auto;
                box-shadow: 0, 0, 50px white;
                width: 400px;
                height: 400px;
                background: white;
            }
        </style>
       
    <div id="publicar">
         
            <div id="imagen_publicidad"><img src="p_encuesta.jpg"></div>
        </div>
	<head>
		<meta name="author" content="Tecnodisa J.A."  lang="es" />
    	<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
    	<link rel="stylesheet" type="text/css" href="css/tema.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/estilo_plaquetas.css">
    

        <link href='http://fonts.googleapis.com/css?family=Gabriela' rel='stylesheet' type='text/css'><!--para texto de sopa de letras -->
        <link href='http://fonts.googleapis.com/css?family=Wellfleet' rel='stylesheet' type='text/css'><!--titulo planes y paquetes -->
        <link href='http://fonts.googleapis.com/css?family=Lilita+One' rel='stylesheet' type='text/css'><!--titulo plaquetas -->
        <script type="text/javascript" src="js/js_animacion.js"></script>
        <link rel="stylesheet" type="text/css" href="css/estilo_animacion.css">
    	<script type="text/javascript">
    		$(document).ready(function(){
                alto=$(window).height();
                alto=(alto-400)/2;
                $("#imagen_publicidad").css("margin-top", alto);
                $("#publicar").click(function event(){
                    $("#publicar").fadeOut('slow', function() {
   
                    });
                });
    			var alto_baner=$('#baner').height();
    			var ancho_imagen=$('#contenedor_texto_baner').width();
    			$(".imagen_baner").css('height', alto_baner);

    			var y_actual=0;
    			var x_actual=0;
    			var contador=1;
    			var direccion="jalar";
    			var direcciona="jalar";
    			var contadora=1;
    			function mover_arriba(){
    				if(contador<5 && direccion=="jalar"){
						y_actual=y_actual+alto_baner;
    					$("#slide_baner").animate({"top": ("-"+y_actual)}, 4000, function event(){
    						mover_arriba();
    					});
    					contador++;
    				}else{
    					direccion="bajar";
    					y_actual=y_actual-alto_baner;
    					$("#slide_baner").animate({"top": ("-"+y_actual)}, 4000, function event(){
    						mover_arriba();	
    					});
    					contador--;
    					if(contador==1){
    						direccion="jalar";
    					}
    				}
    				
    			};
    			function mover_lados(){

    				if(contadora<4 && direcciona=="jalar"){
						x_actual=x_actual+ancho_imagen;
    					$("#texto_baner").animate({"left": ("-"+x_actual)}, 3000, function event(){
    						mover_lados();
    					});
    					contadora++;
    				}else{
    					direcciona="bajar";
    					x_actual=x_actual-ancho_imagen;
    					$("#texto_baner").animate({"left": ("-"+x_actual)}, 3000, function event(){
    						mover_lados();	
    					});
    					contadora--;
    					if(contadora==1){
    						direcciona="jalar";
    					}
    				}
    			};
    			
    				
    				mover_arriba();
    				mover_lados();

    			
    		});
    	</script>
        <script type="text/javascript">
            $(document).ready(function (){
            llamada_retrasada(0,animar_entrada,"#animacion_1", ".op", 55, 90,5000);
            llamada_retrasada(7000,animar_salida,"#animacion_1", ".op", 55, 90,5000);
            llamada_retrasada(12000,crear_grafica,"#animacion_1", ".estadistica",35,125,5000);
            llamada_retrasada(12000,animar_entrada,"#animacion_1", ".se", 55, 90,5000);
            llamada_retrasada(21000,animar_salida,"#animacion_1", ".se",55,90,5000);
            llamada_retrasada(21000,animar_salida,"#animacion_1", ".estadistica",55,90,5000);
            llamada_retrasada(28000,animar_entrada,"#animacion_1", ".tre", 55, 90,5000);
            llamada_retrasada(35000,animar_salida, "#animacion_1", ".tre", 55, 90,5000);
            llamada_retrasada(42000,animar_entrada, "#animacion_1", ".cua", 55,90,5000);
            llamada_retrasada(49000,animar_salida, "#animacion_1", ".cua", 55,90,5000);
        
        setInterval(function(){
            
            llamada_retrasada(0,animar_entrada,"#animacion_1", ".op", 55, 90,5000);
            llamada_retrasada(7000,animar_salida,"#animacion_1", ".op", 55, 90,5000);
             llamada_retrasada(12000,crear_grafica,"#animacion_1", ".estadistica",35,125,5000);
            llamada_retrasada(14000,animar_entrada,"#animacion_1", ".se", 55, 90,5000);
            llamada_retrasada(21000,animar_salida,"#animacion_1", ".estadistica",55,90,5000);
            llamada_retrasada(21000,animar_salida,"#animacion_1", ".se",55,90,5000);
            llamada_retrasada(28000,animar_entrada,"#animacion_1", ".tre", 55, 90,5000);
            llamada_retrasada(35000,animar_salida, "#animacion_1", ".tre", 55, 90,5000);
            llamada_retrasada(42000,animar_entrada, "#animacion_1", ".cua", 55,90,5000);
            llamada_retrasada(49000,animar_salida, "#animacion_1", ".cua", 55,90,5000);
        
        
        },56000);

    });
        </script>
	</head>
    
	<body>
       
		<div id="contenedor"> 
			<div id="baner">
				<div id="animacion_1">
                    <label class="op">I</label>
                    <label class="op">N</label>
                    <label class="op">V</label>
                    <label class="op">I</label>
                    <label class="op">E</label>
                    <label class="op">R</label>
                    <label class="op">T</label>
                    <label class="op">E</label>
                    <label class="op">&nbsp;</label>
                    <label class="op">E</label>
                    <label class="op">N</label>
                    <label class="op">&nbsp;</label>
                    <label class="op">T</label>
                    <label class="op">U</label>
                    <label class="op">&nbsp;</label>
                    <label class="op">N</label>
                    <label class="op">E</label>
                    <label class="op">G</label>
                    <label class="op">O</label>
                    <label class="op">C</label>
                    <label class="op">I</label>
                    <label class="op">O</label>

                    <label class="se">Y</label>
                    <label class="se">&nbsp;</label>
                    <label class="se">V</label>
                    <label class="se">E</label>
                    <label class="se">&nbsp;</label>
                    <label class="se">C</label>
                    <label class="se">O</label>
                    <label class="se">M</label>
                    <label class="se">O</label>
                    <label class="se">&nbsp;</label>
                    <label class="se">C</label>
                    <label class="se">R</label>
                    <label class="se">E</label>
                    <label class="se">C</label>
                    <label class="se">E</label>
                    
                    

                    <label class="tre">D</label>
                    <label class="tre">E</label>
                    <label class="tre">S</label>
                    <label class="tre">D</label>
                    <label class="tre">E</label>
                    <label class="tre">&nbsp;</label>
                    <label class="tre">Q</label>
                    <label class="tre">.</label>
                    <label class="tre">&nbsp;</label>
                    <label class="tre">1</label>
                    <label class="tre">,</label>
                    <label class="tre">5</label>
                    <label class="tre">0</label>
                    <label class="tre">0</label>
                    <label class="tre">.</label>
                    <label class="tre">0</label>
                    <label class="tre">0</label>

                    <label class="cua">S</label>
                    <label class="cua">O</label>
                    <label class="cua">L</label>
                    <label class="cua">O</label>
                    <label class="cua">&nbsp;</label>
                    <label class="cua">E</label>
                    <label class="cua">N</label>
                    <label class="cua">&nbsp;</label>
                    <label class="cua">T</label>
                    <label class="cua">E</label>
                    <label class="cua">C</label>
                    <label class="cua">N</label>
                    <label class="cua">O</label>
                    <label class="cua">D</label>
                    <label class="cua">I</label>
                    <label class="cua">S</label>
                    <label class="cua">A</label>
                    
                    <label class="estadistica"></label>
                    <label class="estadistica"></label>
                    <label class="estadistica"></label>
                    <label class="estadistica"></label>
                    <label class="estadistica"></label>
                    <label class="estadistica"></label>
                    <label class="estadistica"></label>
                    
                   

                </div>
				
				
				<div id="slide_baner">
					
					<li><img class="imagen_baner" src="css/1.png"></li>
					<li><img class="imagen_baner" src="css/2.png"></li>
					<li><img class="imagen_baner" src="css/3.png"></li>
					<li><img class="imagen_baner" src="css/4.png"></li>
					<li><img class="imagen_baner" src="css/5.png"></li>
				</div>

			</div>
			<div id="navegacion">
				<div id="t_izquierdo"></div>
				<div id="opciones"><a href="index.php"><li class="opcion_navegacion">INICIO</li></a><a href="portafolio.php"><li class="opcion_navegacion">PLANTILLAS</li></a><a href="informacion.php"><li class="opcion_navegacion">INFORMACION</li></a><a href="nosotros.php"><li class="opcion_navegacion">NOSOTROS</li></a><li class="opcion_navegacion">COMO COMPRAR</li><a href="contactanos.php"><li class="opcion_navegacion">CONTACTANOS</li></a></div>
				<div id="t_derecho"></div>
            </div>
			<div id="cuerpo">
<?	
	}
	function pie(){// la segunda parte de la pagina despues del cuerpo
	?>
								</div>
		</div>
		<div id="pie">
            Siempre sera un gusto atenderle, no dude en contactarnos a los telefonos: 5515-0693, 4837-6459, 6646-3172
		</div>
	</body>
<?
	}

?>