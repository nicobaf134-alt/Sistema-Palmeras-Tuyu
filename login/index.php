
<script>
	function validarform() {
		flogin = document.getElementById("flogin");
		user = document.getElementById("user");
		psw = document.getElementById("psw");
		if (user.value.trim() == "") {
			alert("El usuario no debe estar vacio");
			return false;
		}
		if (psw.value.trim().length<6) {
			alert("La contraseña debe tener mas de 6 caracteres");
			return false;
		}
		flogin.submit();
	}

	function validarlogin() {
		flogin = document.getElementById("flogi");
		user = document.getElementById("reg_user");
		psw = document.getElementById("reg_psw");
		nom = document.getElementById("reg_nom");
		ape = document.getElementById("reg_ape");
		if (user.value.trim() == "") {
			alert("El usuario no se puede registrar, llenar todos los campos como corresponde ");
			return false;
		}
		
		if (psw.value.trim().length<6) {
			alert("La contraseña debe tener mas de 6 caracteres");
			return false;
		}
		if (nom.value.trim() == "") {
			alert("El nombre no debe estar vacio");
			return false;
		}
		if (ape.value.trim() == "") {
			alert("El apellido no debe estar vacio");
			return false;
		}
	
		flogin.submit();
	}
</script>

<html>
<head>
	<!--<link rel="stylesheet" type="text/css" href="estilo.css">-->
</head>
<title>Iniciar Sesion</title>
<center>
  <h1>Inicio de sesion</h1>
	<style>
	body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      height: 100vh; /* altura total */
      display: flex;
      justify-content: center;  /* centro horizontal */
      align-items: center;      /* centro vertical */
      background-color: #393a3cff;
    }

    .contenedor {
      display: flex;
      justify-content: center;
      gap: 50px;
      margin-top: 30px;
    }

    .card {
      background-color: #01263a;  /* 🔹 Color de fondo */
      color: white;               /* 🔹 Texto en blanco */
      border-radius: 10px;
      padding: 20px;
      width: 250px;
      box-shadow: 2px 2px 10px rgba(228, 58, 58, 0.3);
      text-align: center;
    }

    .card h2 {
      margin-bottom: 15px;
      font-size: 20px;
    }
  h1 {
  margin-bottom: 20px;
  text-shadow: 2px 2px 4px rgba(0,0,0,0.6);
   color: #fff; 
  }

    .card input[type="text"],
    .card input[type="password"] {
      width: 90%;
      padding: 8px;
      margin: 5px 0;
      border-radius: 5px;
      border: 1px solid #020202ff;
    }

    .card input[type="submit"] {
      margin-top: 10px;
      padding: 8px 15px;
      border: none;
      border-radius: 5px;
      background-color: #0077cc;
      color: white;
      cursor: pointer;
    }

    .card input[type="submit"]:hover {
      background-color: #005fa3;
    }

  </style>


  <div class="contenedor">
<div class="card">	
<h2>LOGIN</h2>
  <form id="flogin" action="validar_login.php" method="POST">
  	Usuario<br>
    <input id="user" type="text" name="usuario"><br><br>
    Contraseña<br>
    <input id="psw" type="password" name="password"><br><br>
    <input type="submit" value="Ingresar" onclick="validarform()">
  </form>
</div>

<div class="card">
  <h3>NUEVO REGISTRO </h3>
<form id="flogi" method="POST" action="validar_registro.php">
<input id="reg_user"type="text" maxlength="20" name="usuario" placeholder="Usuario">
<br>	<br>
<input id="reg_ape" type="text" maxlength="20" name="apellido" placeholder="Apellido">
<br>	<br>
<input id="reg_nom" type="text" maxlength="20" name="nombre" placeholder="Nombre">
<br>	<br>
<input id="reg_psw" type="password" maxlength="20"  name="pw" placeholder="Contraseña">
<br>	<br>
 <input type="password" name="clave_registro" placeholder="Clave de registro" required><br>
 <input type="submit" value="Registrarse">
</form>
</div>
  </div>

  
</center>
</html>