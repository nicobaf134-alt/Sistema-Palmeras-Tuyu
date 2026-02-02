<?php
 @session_start();
 if ($_SESSION['login']=="ok") {
  	require_once("../conexion.php");
  	$usuario = strtoupper($_SESSION['ape_user'] . $_SESSION['nom_user']);
   $usuario_id = $_SESSION["idadministrador"];
  	if(!isset($_GET['pag'])) {
  		$pagina = "hola.php";
  	} else {
  		$pagina = $_GET['pag'] . ".php";
  	}
?>

<html>
<head>
	<meta charset="utf-8">
	<title>Inicio</title>
</head>
<body>
    <!--ENCABEZADO-->
    <div>
    	<?php 
    	include ("encabezado.php");
    	?>
    </div>
    <!--PAGINA-->
    <div>
    	<?php 
    	  if (file_exists($pagina)) {
    	  	include ($pagina);
    	  } else {
    	  	echo "Pagina no encontrada";
    	  }
    	?>
    </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


<?php 
 } else {
 	header("location:../login	/encabezado.php");
 }
?>