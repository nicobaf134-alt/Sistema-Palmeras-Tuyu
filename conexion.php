<?php 
  $c_database = "test";
  $c_conexion = "localhost";
  $c_usuario = "root";
  $c_password = "";

  function abrirBase_pdo() {
  	global $c_database, $c_conexion, $c_usuario, $c_password;
  	$dsn = "mysql:host=$c_conexion;dbname=$c_database";
  	$nombre_usuario = $c_usuario;
  	$password = $c_password;
  	$opciones = array(
  		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',PDO::ATTR_PERSISTENT => false
  	);
  	$gbd = new PDO($dsn, $nombre_usuario, $password, $opciones);
  	return ($gbd);
  }

function cerrarBase_pdo(){
  global $gbd;
  $gbd =null;
}


  if(!$pdo = abrirBase_pdo()) {
  	echo "No me puedo conectar";
  }
  $conexion=mysqli_connect($c_conexion,$c_usuario,$c_password,$c_database,);
  
?>