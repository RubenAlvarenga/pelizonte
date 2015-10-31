<?php 
$host='localhost';
$user='root';
$password='admin';
$db="pelizonte";
$enlace = mysql_connect($host, $user, $password);
if (!mysql_select_db($db, $enlace)){
	die ('ERROR de acceso a Base de datos');
}
?>