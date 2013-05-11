<? 	require_once("granlibreria.php");
	encabezado("contactanos");
?>
<script type="text/javascript">
	$(document).ready(function event(){
		$("#boton_enviar").click(function event(){
			if($("#nombre").val().length >0 && $("#telefono").val().length>0 && $("#correo").val().length>0 && $("#pregunta1").val().length>0 && $("#pregunta2").val().length>0 && $("#pregunta3").val().length>0 && $("#pregunta4").val().length!="-"){
				$(".img_ajax").css("display", "block");
				$(".respuesta").val("");
				$(".respuesta").load("envio_encuesta.php",{nombre: $("#nombre").val(), telefono: $("#telefono").val(), correo: $("#correo").val(), pregunta1: $("#pregunta1").val(), pregunta2: $("#pregunta2").val(), pregunta3: $("#pregunta3").val(), pregunta4: $("#pregunta4").val()}, function event(){
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
	<ul>Que Opina de la apariencia de nuestra Pagina Web? </ul><textarea id="pregunta1"></textarea> <br>
	<ul>Le intereso alguno de nuestros servicios? </ul><textarea id="pregunta2"></textarea> <br>
	<ul>Podria darnos algunas mejoras para nuestra Pagina Web? </ul><textarea id="pregunta3"></textarea> <br>
	<ul>Como nos encontro?</ul>	<select id="pregunta4">
									<option value="-">-----</option>
									<option value="google">Google</option>
									<option value="facebook">Facebook</option>
									<option value="anuncio">Anuncio en otra Pagina</option>
									<option value="otro">Otros</option>
								</select><br>
	<input id="boton_enviar" type="button" value="Contestar">
	<img class="img_ajax" src="apariencia/ajax.gif" >
	<div class="respuesta">
		
	</div>
</div>


<?
	pie();
?>