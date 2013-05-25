<?@ require_once("granlibreria.php");
conecbase();
$hoy=date('Y-m-d');
$consulta=mysql_query("select id, ip, pagina from visitas WHERE fecha like '$hoy' order by id desc");
for($i=0;$i<mysql_num_rows($consulta);$i++){
	$dat_consulta=mysql_fetch_array($consulta);
	echo $dat_consulta['0'].".....".$dat_consulta['1'].".....".$dat_consulta['2']."<br>";
}
?>