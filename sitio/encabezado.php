<html>
<head>
	<meta charset="utf-8">
	<title>Menú De Navegación</title>
</head>
<body>
	<style>
		body {
    margin: 0;
  padding: 0;
		}
	header {
  background: linear-gradient(90deg, #0f172a, #1e3a8a); /* degradado */
  padding: 20px 40px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  color: white;
  position: sticky;
  top: 0;
  z-index: 1000;
  margin: 0;
  padding: 0 20px;  /* podés ajustar si querés un poco de espacio interno */
  width: 100%;
  box-sizing: border-box;
  min-height: 70px;
  
}

a {
  text-decoration: none;  /* quita el subrayado */
  color: white;           /* cambia el color del texto */
}

/* Cuando el enlace ya fue visitado */
a:visited {
  color: white;           /* evita que quede violeta */
}

/* Cuando pasás el mouse por encima */
a:hover {
  color: #38bdf8;         /* color celeste al pasar el mouse */
  text-decoration: underline; /* opcional, podés dejarlo sin */
}

header .logo {
  letter-spacing: 1px;  display: flex;
  align-items: center;
  font-size: 1.4rem;
  font-weight: bold;
  color: white;
}

header nav a {
  color: white;
  margin: 0 15px;
  text-decoration: none;
  font-size: 16px;
  transition: 0.3s;
}

header nav a:hover {
  color: #38bdf8; /* celeste al pasar el mouse */
}

header .logout {
  background: #dc2626;
  padding: 8px 15px;
  border-radius: 6px;
  color: white;
  font-weight: bold;
}
header .logout:hover {
  background: #b91c1c;
}
a, a:visited, a:hover, a:active {
  text-decoration: none !important; /* fuerza quitar subrayado */
}
nav a {
  margin-left: 20px;
  color: white;
  text-decoration: none;
  font-size: 1.1rem;
}

</style>
<header>
	<a href="checkin.php">
  <div class="logo">🏨 Hotel Palmeras del Tuyú</div>
  </a>
  <nav>
    <a href="checkin.php">Check-In</a>
    <a href="habitaciones_encabezado.php"> Habitación</a>
    <a href="historial.php"> Historial</a>
    <a href="/hotel/login/cerrar_session.php" class="logout">Cierre de sesión</a>
    
  </nav>
</header>
</body>
</html>