<center>
<?php include("encabezado.php"); ?>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú de habitaciones</title>
  
</head>
<body>

  <h1>Menú de habitaciones</h1>
  <div id="menu">
     <a href="habitacion doble.php">
    <button class="menubutton" onclick="cargarHabitaciones('dobles')">Habitaciones Dobles</button>
     <a href="habitacion triple.php">
    <button class="menubutton" onclick="cargarHabitaciones('triples')">Habitaciones Triples</button>
     <a href="habitacion cuadruple.php">
    <button class="menubutton" onclick="cargarHabitaciones('cuadruples')">Habitaciones Cuádruples</button>
    <a href="habitacion sextuple.php">
    <button class="menubutton" onclick="cargarHabitaciones('sextuple')">Habitacion Sextuple</button>
     <a href="habitacion fondo.php">
    <button class="menubutton" onclick="cargarHabitaciones('fondo')">Habitacion fondo</button>
  </div>
  <div id="habitaciones"></div>
</a>
  <script>
      
      function cargarHabitaciones(tipo) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("habitaciones").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "habitaciones.php?tipo=" + tipo, true);
  xhttp.send();
}
  </script>

</body>

<style>
  body {
  background: linear-gradient(135deg, #1f2937, #374151);
  font-family: 'Poppins', sans-serif;
  color: #fff;
  text-align: center;
}

h1, h2 {
  margin-bottom: 20px;
  text-shadow: 2px 2px 4px rgba(0,0,0,0.6);
}

.menu {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
  justify-items: center;
  margin: 40px auto;
  max-width: 800px;
}

.menubutton {
  background: #ffffff;
  color: #111;
  padding: 15px 25px;
  border: none;
  border-radius: 12px;
  font-size: 18px;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
  box-shadow: 0 4px 8px rgba(0,0,0,0.3);
}

.menubutton:hover {
  background: #3b82f6;
  color: #fff;
  transform: scale(1.05);
}
  body {
      background: #393a3cff;
      font-family: Arial, sans-serif;
      color: #ffffffff;
    }

    #menu {
  margin-bottom: 20px;
}

#menubutton {
  padding: 10px;
  margin-right: 10px;
  cursor: pointer;
}

</style>



