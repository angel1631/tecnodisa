<?
require_once("granlibreria.php");
conecbase();
$hoy=date('Y-m-d');
$columnas="";
$valores="";
$consulta=mysql_query("select pagina, COUNT(*) from visitas WHERE fecha like '$hoy' GROUP BY pagina");
for($i=0;$i<mysql_num_rows($consulta);$i++){
	$dat_consulta=mysql_fetch_array($consulta);
	$columnas= $dat_consulta['0'].",".$columnas;
	$valores=$dat_consulta['1'].",".$valores;
}
$cantidad=mysql_num_rows($consulta);
echo "	<input type=hidden id=cantidad_columnas value=\"".$cantidad."\" > 
		<input type=hidden id=valores value=\"".$valores."\" >
		<input type=hidden id=nombres value=\"".$columnas."\" >";

?>