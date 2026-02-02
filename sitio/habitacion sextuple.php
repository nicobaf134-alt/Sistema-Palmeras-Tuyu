<html>
<?php include("../conexion.php");
include("encabezado.php");?>
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="diseño.css">
  <title>Estado de las habitaciones </title>
  
</head>


<body>
<?php
// --- PROCESAR CAMBIO DE ESTADO ---
if (isset($_POST['cambiar_estado'])) {
    $numero = $_POST['numero_habitacion'];

    // Obtener estado actual
    $query = "SELECT Estado_habitacion FROM habitacion WHERE Numero_habitacion = $numero";
    $resultado = mysqli_query($conexion, $query);
    $fila = mysqli_fetch_assoc($resultado);

    // Cambiar estado
    $nuevo_estado = ($fila['Estado_habitacion'] == 'Ocupada') ? 'Disponible' : 'Ocupada';

    // Actualizar en la base de datos
    $update = "UPDATE habitacion SET Estado_habitacion = '$nuevo_estado' WHERE Numero_habitacion = $numero";
    mysqli_query($conexion, $update);

    // Redirigir para evitar re-envío de formulario
    header("Location: habitacion sextuple.php");
    exit();
}
?>
<style>

    body {
      background: #393a3cff;
      font-family: Arial, sans-serif;
      color: #ffffffff;
     }
        table {
            background: #01263a;
            border-collapse: collapse;
            margin: 20px auto;
            width: 70%;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #080808ff;
            color: white;
        }
        button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-liberar { background-color: orange; color: white; }
    </style>
</head>
    <h1 style="text-align:center;">Estado de las habitaciones cuadruples</h1>

   <?php
$sql = "SELECT Numero_habitacion, Estado_habitacion
        FROM habitacion
        WHERE Tipo = 'Sextuple' 
          AND Numero_habitacion IN (6)";
$result = mysqli_query($conexion, $sql);

echo "<table>";
echo "<tr><th>Número de Habitación</th><th>Estado</th><th>Acción</th></tr>";

while ($fila = mysqli_fetch_assoc($result)) {
    $color = ($fila['Estado_habitacion'] == 'Ocupada') ? 'red' : 'green';

    echo "<tr>";
    echo "<td>" . $fila['Numero_habitacion'] . "</td>";
    echo "<td style='background-color:$color; color:white;'>" . $fila['Estado_habitacion'] . "</td>";
    echo "<td>
            <form method='post'>
                <input type='hidden' name='numero_habitacion' value='" . $fila['Numero_habitacion'] . "'>
                <button type='submit' name='cambiar_estado' class='btn-liberar'>Cambiar estado</button>
            </form>
          </td>";
    echo "</tr>";
}

echo "</table>";
?>
    


</body>
</html>