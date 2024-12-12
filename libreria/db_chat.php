<?php 
include ("conexion.php");
$con = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

function formatDate($date){
	return date('g:i a', strtotime($date));
}
?>
