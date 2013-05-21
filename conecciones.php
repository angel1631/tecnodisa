<?
function conecbase(){
	@$db = mysql_pconnect("tecnodisacom.ipagemysql.com", "tecnodisa_1514", "angel_1631");         
	@mysql_select_db("tecnodisa");
}

?>