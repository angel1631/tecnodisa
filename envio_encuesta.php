<?
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
@$db = mysql_pconnect("tecnodisacom.ipagemysql.com", "tecnodisa_1514", "angel_1631");
         
    @       mysql_select_db("tecnodisa");
   $hoy=date('Y-m-d');
   $momento= date('H:i:s');
   $con_spam=mysql_query("SELECT hoy from encuesta where ip like '".getRealIP()."'");
   $dat_spam=mysql_fetch_array($con_spam);
   if(mysql_num_rows($con_spam)>=2 && $dat_spam['0']==$hoy){
   	
   			echo "disculpe Pero tenemos inconvenientes con su ip, pruebe mañana";
   		
   }else{
   		mysql_query("INSERT INTO encuesta VALUES('','".$_POST['nombre']."', '".$_POST['telefono']."', '".$_POST['correo']."', '".$_POST['pregunta1']."', '".$_POST['pregunta2']."', '".$_POST['pregunta3']."', '".$_POST['pregunta4']."', '".$hoy."', '".$momento."', '".getRealIP()."')");

			if(mail('angel1631@gmail.com, jeimyadoradora@gmail.com', 'Contacto se acaba de llenar una encuesta', "Nombre: ".$_POST['nombre'].", su respuesta a la pregunta1: ".$_POST['pregunta1']."<br>, su respuesta a la pregunta2: ".$_POST['pregunta2']."<br>, su respuesta a la pregunta3: ".$_POST['pregunta3']."<br>, su respuesta a la pregunta4: ".$_POST['pregunta4']."<br> su numero de telefono es: ".$_POST['telefono']." y su direccion de correo electronico es: ".$_POST['correo']."")){
				echo "<p>Gracias por llenar la encuesta, <br>estas en la rifa de una USB y Descuentos <br>en nuestros servicios de Paginas Web.</p>";
			}else{
				echo "<p>Disculpa pero no pudo enviarse <br>tu encuesta prueba dentro de unos segundos</p>";
			}
   }
    

?>