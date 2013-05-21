<?
require_once("granlibreria.php");
conecbase();
$hoy=date('Y-m-d');
$consulta=mysql_query("select pagina, COUNT(*) from visitas WHERE fecha like '$hoy' GROUP BY pagina");
for($i=0;$i<mysql_num_rows($consulta);$i++){
	$dat_consulta=mysql_fetch_array($consulta);
	echo $dat_consulta['0'].".....".$dat_consulta['1']."<br>";
}
?>