<? 	require_once("granlibreria.php");
	encabezado("contactanos");
?>
<script type="text/javascript">
	$(document).ready(function event(){
		$("#boton_enviar").click(function event(){
			if($("#nombre").val().length >0 && $("#telefono").val().length>0 && $("#correo").val().length>0 && $("#informacion").val().length>0){
				$(".img_ajax").css("display", "block");
				$(".respuesta").val("");
				$(".respuesta").load("envio_contactanos.php",{nombre: $("#nombre").val(), telefono: $("#telefono").val(), correo: $("#correo").val(), informacion: $("#informacion").val()}, function event(){
					$(".img_ajax").css("display", "none");
				});
			}else{
				alert("Todos los campos son obligatorios");
			}
			
		});
	});
</script>
<div class="formularios">
	<ul>Nombre: </ul><input type="text" id="nombre"><br>
	<ul>Telefono: </ul><input type="text" id="telefono"><br>
	<ul>Correo Electronico: </ul><input type="text" id="correo"><br>
	<ul>En que le podemos servir? </ul><textarea id="informacion"></textarea> <br>
	<input id="boton_enviar" type="button" value="Contactar...">
	<img class="img_ajax" src="apariencia/ajax.gif" >
	<div class="respuesta">
		
	</div>
</div>


<?
	pie();
?>