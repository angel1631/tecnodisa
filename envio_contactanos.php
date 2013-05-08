<? 

if(mail('angel1631@gmail.com, jeimyadoradora@gmail.com', 'Contacto desde Tecnodisa.com', "la persona: ".$_POST['nombre'].", se contacto por Tecnodisa.com y escribio: ".$_POST['informacion']."<br> su numero de telefono es: ".$_POST['telefono']." y su direccion de correo electronico es: ".$_POST['correo']."")){
	echo "<p>Gracias por contactarte</p>";
}else{
	echo "<p>Disculpa pero no pudo enviarse <br>tu solicitud prueba dentro de unos segundos</p>";
}

?>