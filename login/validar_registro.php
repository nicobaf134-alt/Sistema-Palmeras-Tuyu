<?php
include("../conexion.php"); // Usamos la conexión PDO que ya tenés

$CLAVE_CORRECTA = "12345";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $apellido = $_POST['apellido'];
    $nombre = $_POST['nombre'];
    $pw = $_POST['pw'];
    $clave_registro = $_POST['clave_registro'];

    // 1. Verificar clave de seguridad
    if ($clave_registro !== $CLAVE_CORRECTA) {
        echo "<script>alert('Error: Clave de registro no válida.'); window.history.back();</script>";
        exit;
    }

    // 2. Hashear la contraseña
    $hash = password_hash($pw, PASSWORD_DEFAULT);

    // 3. Insertar usando PDO (Más seguro)
    try {
        $sql = "INSERT INTO administrador (usuario_login, usuario_apellido, usuario_nombre, usuario_password, clave_registro) 
                VALUES (:user, :ape, :nom, :pass, :clave)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':user'  => $usuario,
            ':ape'   => $apellido,
            ':nom'   => $nombre,
            ':pass'  => $hash,
            ':clave' => 0 // O el valor que prefieras
        ]);

        echo "<script>alert('Usuario registrado correctamente'); window.location.href='index.php';</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>