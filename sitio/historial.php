<?php
// Conexión
include("../conexion.php");
include("encabezado.php"); // 
 // asegúrate que $pdo está definido en conexion.php

// Variables de filtro
$filtro = "";
if (isset($_POST['buscar'])) {
    $busqueda = trim($_POST['busqueda']); // lo que escriba el usuario
    if (!empty($busqueda)) {
        // Filtramos por DNI o por nombre/apellido
        $filtro = " AND (DNI LIKE :busqueda OR Nombre LIKE :busqueda OR Apellido LIKE :busqueda) ";
    }
}

// Consulta principal
$qrystr = "SELECT h.DNI, h.Telefono, h.Apellido, h.Nombre, c.Monto_total, Tipo, Numero_habitacion
           FROM huesped h
           INNER JOIN habitacion_x_huesped hx ON h.idhuesped = hx.huesped_idhuesped
           INNER JOIN habitacion hab ON hx.habitacion_idhabitacion = hab.idhabitacion
           INNER JOIN checkin c ON c.idcheckin = hx.idcheck
           WHERE 1=1 $filtro
           GROUP BY h.DNI, h.Telefono, h.Apellido, h.Nombre
           ORDER BY h.Apellido, h.Nombre";

$stmt = $pdo->prepare($qrystr);

// Si hay filtro, vinculamos el parámetro
if (!empty($filtro)) {
    $stmt->bindValue(':busqueda', "%$busqueda%", PDO::PARAM_STR);
}

$stmt->execute();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Huéspedes</title>
    <style>
 body {
      background: #393a3cff;
      font-family: Arial, sans-serif;
      color: #ffffffff;
    }
    h1 {
      text-align: center;
      margin-top: 20px;
      color: #ffffffff;
    }
    form {
      width: 60%;
      margin: auto;
      background: #01263a;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 3px 12px rgba(0,0,0,0.2);
    }


        table { border-collapse: collapse; width: 100%; margin-top: 10px; }
        th, td { border: 1px solid #ffffffff; padding: 8px; text-align: center; }
        th { background: #092327; color: white; }
        tr { background: #01263a; }
        input, button { padding: 6px; margin: 5px; border-radius: 5px; }
    </style>
</head>
<body>
    <h2>Historial de Huéspedes</h2>

    <!-- Formulario de búsqueda -->
    <form method="POST">
        <input type="text" name="busqueda" placeholder="Buscar por DNI, Nombre o Apellido" value="<?= isset($busqueda) ? htmlspecialchars($busqueda) : '' ?>">
        <button type="submit" name="buscar">Buscar</button>
        <button type="submit" name="ver_todo">Ver Todo</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Telefono</th>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>Monto Total</th>
                <th>Tipo</th>
                <th>Habitacion</th>
            </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".htmlspecialchars($row['DNI'])."</td>";
            echo "<td>".htmlspecialchars($row['Telefono'])."</td>";
            echo "<td>".htmlspecialchars($row['Apellido'])."</td>";
            echo "<td>".htmlspecialchars($row['Nombre'])."</td>";
            echo "<td>".htmlspecialchars($row['Monto_total'])."</td>";
            echo "<td>".htmlspecialchars($row['Tipo'])."</td>";
            echo "<td>".htmlspecialchars($row['Numero_habitacion'])."</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>
