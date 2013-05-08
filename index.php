<?	@session_start();
	require_once("granlibreria.php");
	encabezado("index");
	?>
		<script type="text/javascript">
			$(document).ready(function(){
				var activo=1;				
				$("#titulo_planes").click(function event(){
					if(activo!=1){
						$("#contenedor_paquetes").fadeOut('slow');
						$("#titulo_paquetes").animate({"right": "-395px"}, "slow", function event(){
							$("#titulo_planes").animate({"left": "0px"}, "slow");
							$("#contenedor_planes").fadeIn('slow');
							activo=1;
						});
						
					}
					
				});
				$("#titulo_paquetes").click(function event(){
					if(activo!=2){
						$("#contenedor_planes").fadeOut('slow');
						$("#titulo_planes").animate({"left": "-395px"}, "slow", function event(){
							$("#titulo_paquetes").animate({"right": "0px"}, "slow");
							$("#contenedor_paquetes").fadeIn('slow');
							activo=2;
						});
						
					}
					
					
				});
			});
		</script>
		 
		
		<div id="titulo_planes">
			Paquetes De Paginas Web
		</div>
		<div id="titulo_paquetes">
			Paquetes De Publicidad
		</div>
		<!--<div id="contenedor_planes">
			<div class="planes" id="plan_bronce">
				<div class="titulo_planes_paquetes">PLAN BRONCE</div>
				<div>
					<li>Implementacion de Plantilla</li>
					<li>Maximo 5 Paginas</li>
					<li>Dominio .com </li>
					<li>15 correos personalizados</li>
					<li>Hosting por 1 a&ntilde;o</li>
					<li>GRATIS: Paquete Encuentrame</li>

				</div>
			</div>
			<div class="planes" id="plan_plata">
				<div class="titulo_planes_paquetes">PLAN PLATA</div>
				<div>
					<li>Implementacion de Plantilla</li>
					<li>Maximo 15 Paginas</li>
					<li>Dominio .com </li>
					<li>Formulario de Contactanos</li>
					<li>Adision de Muro de Facebook</li>
					<li>50 correos personalizados</li>
					<li>Hosting por 1 a&ntilde;o</li>
					<li>GRATIS: Paquete Vendo</li>
				</div>
			</div>
			<div class="planes" id="plan_oro">
				<div class="titulo_planes_paquetes">PLAN ORO</div>
				<div>
					<li>Implementacion de Plantilla</li>
					<li>Sin Limite de Paginas</li>
					<li>Dominio .com </li>
					<li>Formularios de Administracion</li>
					<li>Adision de Muro de Facebook, Google +, Twitter</li>
					<li>Correos ilimitados</li>
					<li>Hosting por 1 a&ntilde;o Administrable</li>
					<li>GRATIS: 3 Paquetes Vendo</li>
				</div>
			</div>
		</div>-->
		<div id="contenedor_planes">
		<div id="bronce">
			<div class="titulo">PAQUETE BRONCE</div>
			<div id="fondo_bronce">
				<div class="cuerpo">
				
					<li>Dise&ntilde;o de pagina</li>
					<li>Dominio .com</li>
					<li>5 correos de @tuempresa.com</li>
					<li>Pagina administrable</li>
					<li>Hosting gratis por 1 a&ntilde;o</li>
					<li>Hosting de 5 GB de capacidad</li>
					
					<li><a href="#">PAQUETE AQUI ESTOY</a></li>
					<div class="precio">Q. 1,500.00</div>
				</div>
			</div>
			<div class="ver_mas"><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="CRSHCTEPJPPCC">
<input type="image" src="https://www.paypalobjects.com/es_XC/i/btn/btn_buynow_SM.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>
</div>
		</div>
		<div id="plata">
			<div class="titulo">PAQUETE PLATA</div>
			<div id="fondo_plata">
				<div class="cuerpo">
					<li>Dise&ntilde;o de pagina</li>
					<li>Dominio .com</li>
					<li>50 correos de @tuempresa.com</li>
					<li>Pagina administrable</li>
					<li>Formulario de Contactanos</li>
					<li>Adision de Muro de Facebook</li>
					<li>Hosting gratis por 1 a&ntilde;o</li>
					<li>Hosting de 50 GB de capacidad</li>
					<li><a href="#">PAQUETE ENCUENTRAME GRATIS</a></li>
					<div class="precio">Q. 2,500.00</div>
				</div>
			</div>
			<div class="ver_mas"><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="TSQA443AEWZT6">
<input type="image" src="https://www.paypalobjects.com/es_XC/i/btn/btn_buynow_SM.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>
</div>
		</div>
		<div id="oro">
			<div class="titulo">PAQUETE ORO</div>
			<div id="fondo_oro">
				<div class="cuerpo">
					<li>Dise&ntilde;o de pagina</li>
					<li>Dominio .com</li>
					<li>500 Correos de @tuempresa.com</li>
					<li>Pagina administrable</li>
					<li>Formulario de Contactanos</li>
					<li>Adision de Muro de Facebook</li>
					<li>Hosting gratis por 1 a&ntilde;o</li>
					<li>Hosting  de capacidad ilimitada</li>
					
					<li><a href="#">PAQUETE VENDO GRATIS</a></li>
					<div class="precio">Q. 3,500.00</div>
				</div>
			</div>
			<div class="ver_mas"><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="AP7J2CFQXQ27U">
<input type="image" src="https://www.paypalobjects.com/es_XC/i/btn/btn_buynow_SM.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>
</div>
		</div>
	</div>
		<div id="contenedor_paquetes">
			<div class="planes" id="plan_plata">
				<div class="titulo">AQUI ESTOY</div>
				<div class="cuerpo">
					<li>50 anuncios en paginas anuncios</li>
					<li>Q. 50.00 de Adwords</li>
					<li>Q. 50.00 en Anuncios Facebook</li>
					<li>500 correos de publicidad</li>
					<div class="precio">Q. 200.00</div>
				</div>
				<div class="ver_mas"><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="V7T6TMTETFH78">
<input type="image" src="https://www.paypalobjects.com/es_XC/i/btn/btn_buynow_SM.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>
</div>
			</div>
			<div class="planes" id="plan_plata">
				<div class="titulo">ENCUENTRAME</div>
				<div class="cuerpo">
					<li>150 anuncios en paginas anuncios</li>
					<li>Q. 150.00 de Adwords</li>
					<li>Q. 300.00 en Anuncios Facebook</li>
					<li>1,000 correos de publicidad</li>
					<li>Creacion de Fanspage</li>
					<li>Creacion de cuenta Twitter</li>
					<div class="precio">Q. 600.00</div>
				</div>
				<div class="ver_mas">
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="LVNXXUJ3K33EW">
					<input type="image" src="https://www.paypalobjects.com/es_XC/i/btn/btn_buynow_SM.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
					<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
					</form>

				</div>
			</div>
			<div class="planes" id="plan_plata">
				<div class="titulo">VENDO</div>
				<div class="cuerpo">
					<li>300 anuncios en paginas anuncios</li>
					<li>Q. 350.00 de Adwords</li>
					<li>Q. 500.00 en Anuncios Facebook</li>
					<li>3000 correos de publicidad</li>
					<li>50 publicaciones en Fanspage</li>
					<li>50 retwit</li>
					<div class="precio">Q. 1,200.00</div>
				</div>
				<div class="ver_mas">
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="SJWMEBGZCM4D4">
					<input type="image" src="https://www.paypalobjects.com/es_XC/i/btn/btn_buynow_SM.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
					<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
					</form>

				</div>
			</div>
		</div>
	<?
	pie();
?>