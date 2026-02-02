<?php
$usuario = $_POST['usuario'];
$password = $_POST['password'];

include("../conexion.php");

// Buscamos solo por nombre de usuario
$qrystr = "SELECT * FROM administrador WHERE usuario_login = :usuario";
$stmt = $pdo->prepare($qrystr);
$stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
$stmt->execute();

$row = $stmt->fetch();

// Verificamos el hash con el nombre de columna correcto (usuario_password)
if ($row && password_verify($password, $row['usuario_password'])) {
    @session_start();
    $_SESSION['login'] = "ok";
    $_SESSION['nom_user'] = $row['usuario_nombre'];
    $_SESSION['ape_user'] = $row['usuario_apellido'];
    // IMPORTANTE: Cambiamos idadministrador por usuario_id
    $_SESSION['idadministrador'] = $row['usuario_id']; 
    header("location:../sitio/checkin.php");
} else {
    header("location:../login/index.php?error=1");
}
?>