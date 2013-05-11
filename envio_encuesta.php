<? 
@$db = mysql_pconnect("tecnodisacom.ipagemysql.com", "tecnodisa_1514", "angel_1631");
         
    @       mysql_select_db("tecnodisa");
   
    mysql_query("INSERT INTO encuesta VALUES('','".$_POST['nombre']."', '".$_POST['telefono']."', '".$_POST['correo']."', '".$_POST['pregunta1']."', '".$_POST['pregunta2']."', '".$_POST['pregunta3']."', '".$_POST['pregunta4']."', '".$hoy."', '".$momento."')");

if(mail('angel1631@gmail.com, jeimyadoradora@gmail.com', 'Contacto se acaba de llenar una encuesta', "Nombre: ".$_POST['nombre'].", su respuesta a la pregunta1: ".$_POST['pregunta1']."<br>, su respuesta a la pregunta2: ".$_POST['pregunta2']."<br>, su respuesta a la pregunta3: ".$_POST['pregunta3']."<br>, su respuesta a la pregunta4: ".$_POST['pregunta4']."<br> su numero de telefono es: ".$_POST['telefono']." y su direccion de correo electronico es: ".$_POST['correo']."")){
	echo "<p>Gracias por llenar la encuesta, <br>estas en la rifa de una USB y Descuentos <br>en nuestros servicios de Paginas Web.</p>";
}else{
	echo "<p>Disculpa pero no pudo enviarse <br>tu encuesta prueba dentro de unos segundos</p>";
}

?>