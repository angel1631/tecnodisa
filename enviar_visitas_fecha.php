<?
require_once("granlibreria.php");
conecbase();
$dias_mostrar=10;
function restar_fechas($numero_dias){
	if(date('d')>$numero_dias){
		
		$hoy=date('Y-m');
		$hoy=$hoy."-".(date('d')-$numero_dias);
	}else{
		$hoy=date('Y');
		$hoy=$hoy."-".(date('m')-1)."-".(30-($numero_dias-date('d')));
	}
	return $hoy;
}

$columnas="";
$valores="";
$dias="";
$nombres="";
$consulta=mysql_query("select pagina from visitas WHERE fecha >= '$hoy' GROUP BY pagina");
for($i=0;$i<mysql_num_rows($consulta);$i++){
	$dat_lista=mysql_fetch_array($consulta);
	for($j=$dias_mostrar;$j>=0;$j--){
		$can_elementos=mysql_query("select pagina from visitas WHERE pagina like '".$dat_lista['0']."' AND fecha like '".restar_fechas($j)."'");
		if(mysql_num_rows($can_elementos)>0){
			
			$valores=mysql_num_rows($can_elementos).",".$valores;
		}else{
			$valores="0,".$valores;
		}
	}
	$nombres=$dat_lista['0'].",".$nombres;
}
for($k=$dias_mostrar;$k>=0;$k--)
	$dias=restar_fechas($k).",".$dias;

$cantidad=mysql_num_rows($consulta)*$dias_mostrar;
echo "	<input type=hidden id=cantidad_items value=\"".$cantidad."\" > 
		<input type=hidden id=dias value=\"".$dias_mostrar."\" >
		<input type=hidden id=fechas_lineal value=\"".$dias."\" >
		<input type=hidden id=nombres_lineal value=\"".$nombres."\" >
		<input type=hidden id=valores_lineal value=\"".$valores."\" >";

?>