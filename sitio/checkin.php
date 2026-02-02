<?php 
include("encabezado.php");
include("../conexion.php");
?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="diseño.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
    label {
      display: inline-block;
      width: 180px;
      font-weight: bold;
      margin-bottom: 8px;
    }
    input, select {
      padding: 6px;
      margin-bottom: 15px;
      width: 60%;
      border: 1px solid #070000ff;
      border-radius: 6px;
    }
    .btn {
    width: 180px;   /* 👈 todos iguales */
    height: 50px;
    font-size: 16px;
    border: none;
    border-radius: 25px;
    background: black;
    color: white;
    cursor: pointer;
    transition: 0.3s;
    }
    .btn:hover {
      background: #0056b3;
      cursor: pointer;
    }
    table {
      width: 80%;
      margin: 30px auto;
      border-collapse: collapse;
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 3px 12px rgba(0,0,0,0.2);
    }
    th, td {
      padding: 12px 15px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }
    th {
      background: #007bff;
      color: white;
    }
    tr:nth-child(even) {
      background: #f2f2f2;
    }
    tr:hover {
      background: #e1f5fe;
    }
  </style>
</head>
<body>
  <?php
$precios = [
    "Doble"   => 5000,
    "Triple"    => 8000,
    "Cuadruple"   => 10000,
    "Sextuple"=> 12000,
    "12A"=> 6000,
    "12B"=> 6000,
];
?>

<h1>Registro de check-in</h1>

<center>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
   <label>DNI:</label><input type="text" required name="DNI"> <br>
   <label>Teléfono:</label><input type="text" required name="Telefono"> <br>
   <label>Apellido:</label><input type="text" required name="Apellido"> <br>
   <label>Nombre:</label><input type="text" required name="Nombre"> <br>
   <label>Dirección:</label><input type="text" required name="Direccion"> <br>
   <label>Fecha ingreso:</label><input type="date" required name="Fecha_ingreso"> <br>
   <label>Fecha egreso:</label><input type="date" required name="Fecha_egreso"> <br>
    <label>Tipo de Habitacion:</label>
   <select name="Tipo">
      <option value="Doble">Doble</option>
      <option value="Triple">Triple</option>
      <option value="Cuadruple">Cuádruple</option>
      <option value="Sextuple">Sextuple</option>
      <option value="12A">12 A</option>
      <option value="12B">12 B</option>
   </select><br>
 <label>Número de habitación: </label><input type="text" required name="Numero_habitacion"> <br> 
   <label>Cantidad personas:</label><input type="number" required name="Cantidad_personas"> <br>
    <label>Forma de pago:</label>
   <select name="Forma_pago">
      <option>Débito</option>
      <option>Crédito</option>
      <option>Efectivo</option>
      <option>Mercado Pago</option>
   </select><br>
<label>Monto total:</label>
<input type="text" required name="Monto_total"> <br>
<input type="submit" class="btn" name="enviar" value="Agregar">  
</form>



<script>
function calcularMonto() {
    let tipo = document.querySelector("select[name='Tipo']").value;
    let ingreso = document.querySelector("input[name='Fecha_ingreso']").value;
    let egreso = document.querySelector("input[name='Fecha_egreso']").value;
    let montoField = document.querySelector("input[name='Monto_total']");

    // Precios por noche
    let precios = {
    "Doble": 5000,
    "Triple": 8000,
    "Cuadruple": 10000,
    "Sextuple": 12000,
    "12A": 6000,
    "12B": 6000,
    };

    if (tipo && ingreso && egreso) {
        let fechaIngreso = new Date(ingreso);
        let fechaEgreso = new Date(egreso);

        let diffTime = fechaEgreso - fechaIngreso;
        let noches = diffTime / (1000 * 60 * 60 * 24);

        if (noches > 0) {
            let precioNoche = precios[tipo] || 0;
            let total = precioNoche * noches;
            montoField.value = total;
        } else {
            montoField.value = "0";
        }
    }
}

// Ejecutar la función cuando cambian los campos
document.addEventListener("DOMContentLoaded", () => {
    document.querySelector("select[name='Tipo']").addEventListener("change", calcularMonto);
    document.querySelector("input[name='Fecha_ingreso']").addEventListener("change", calcularMonto);
    document.querySelector("input[name='Fecha_egreso']").addEventListener("change", calcularMonto);
});
</script>
</center>

<?php
if(isset($_POST['enviar'])){
    $DNI = $_POST["DNI"];
    $Telefono = $_POST["Telefono"];
    $Apellido = $_POST["Apellido"];
    $Nombre = $_POST["Nombre"];
    $Direccion = $_POST["Direccion"];
    $Monto_total = $_POST["Monto_total"];
    $Fecha_ingreso = $_POST["Fecha_ingreso"];
    $Fecha_egreso = $_POST["Fecha_egreso"];
    $Forma_pago = $_POST["Forma_pago"];
    $Cantidad_personas = $_POST["Cantidad_personas"];
    $Tipo = $_POST["Tipo"];
    $Numero_habitacion = $_POST["Numero_habitacion"];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero_habitacion = $_POST['Numero_habitacion'];

    // Registrar al huésped (tu código normal aquí)
    $sql="INSERT INTO huesped (DNI,Telefono,Apellido,Nombre,Direccion)
          VALUES('$DNI','$Telefono','$Apellido','$Nombre','$Direccion')";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        $sql1="INSERT INTO checkin (Monto_total,Fecha_ingreso,Fecha_egreso,Forma_pago,Cantidad_personas)
               VALUES('$Monto_total','$Fecha_ingreso','$Fecha_egreso','$Forma_pago','$Cantidad_personas')";
        $resultado1=mysqli_query($conexion,$sql1);

        $sql2="INSERT INTO habitacion (Tipo,Numero_habitacion)
               VALUES('$Tipo','$Numero_habitacion')";
        $resultado2=mysqli_query($conexion,$sql2);

        echo "<h2 style='text-align:center;color:green;'>✅ Datos guardados correctamente</h2>";
    } else {
        echo "<h2 style='text-align:center;color:red;'>❌ Error al guardar</h2>";
    }
}
  // Cambiar estado a Ocupada
    $sql = "UPDATE habitacion 
            SET Estado_habitacion = 'Ocupada' 
            WHERE Numero_habitacion = '$Numero_habitacion'";
    mysqli_query($conexion, $sql);
}
?>
    

<?php
// Inicializamos variables
$monto = 0;
$recargo = 0;
$resultado = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["recargo"])) {
    $monto   = isset($_POST["monto"]) ? floatval($_POST["monto"]) : 0;
    $recargo = isset($_POST["recargo"]) ? intval($_POST["recargo"]) : 0;

    if ($monto > 0 && $recargo > 0) {
        $resultado = $monto + ($monto * $recargo / 100);
    }
}
?>
  <center>
    <br>
    <form>
<h2>Calculadora de Recargo a Tarjeta</h2>

<label for="monto">Monto de la tarjeta:</label>
<input type="number" step="0.01" id="monto" required>
<br><br>

<label for="recargo">Seleccione el recargo:</label>
<select id="recargo" required>
    <option value="">--Elegir--</option>
    <option value="10">10 %</option>
    <option value="15">15 %</option>
    <option value="20">20 %</option>
</select>
<br><br>

<button type="button" class="btn" onclick="aplicarRecargo()">Aplicar Recargo</button>

<h3>Resultado:</h3>
<p id="resultado"></p>

<script>
function aplicarRecargo() {
    let monto = parseFloat(document.getElementById("monto").value);
    let recargo = parseFloat(document.getElementById("recargo").value);

    if (isNaN(monto) || isNaN(recargo)) {
        document.getElementById("resultado").innerText = "Completa todos los campos.";
        return;
    }

    let total = monto + (monto * recargo / 100);
    document.getElementById("resultado").innerText =
        `Monto original: $${monto.toFixed(2)} | Con recargo: $${total.toFixed(2)}`;
}
</script>

    </form>

    <?php if ($resultado !== ""): ?>
        <h3>Resultado:</h3>
        <p>Monto original: $<?php echo number_format($monto, 2); ?></p>
        <p>Monto con recargo: $<?php echo number_format($resultado, 2); ?></p>
    <?php endif; ?>
</body>
</center>
</html>
