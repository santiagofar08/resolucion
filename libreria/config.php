<?php
//define ('DB_HOST','localhost');
define ('DB_HOST','localhost');
define ('DB_USER','root');
define ('DB_PASS','');
define ('DB_NAME','bib-t1');


// Nombre de la session (puede dejar este mismo)
$usuarios_sesion="pwd";
class Conexion extends mysqli{

 public $enlace;
 
 function __construct(){
   //$this->enlace=mysql_connect(DB_HOST,DB_USER,DB_PASS);
   //mysql_select_db(DB_NAME,$this->enlace);
   $this->enlace=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    
  
 }
 function __destruct(){
   //mysql_close($this->enlace);
   mysqli_close($this->enlace);
 }

}
