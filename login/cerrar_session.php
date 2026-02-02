<?php
session_start();
session_unset();
session_destroy();
$_SESSION["login"] = "";
header("Location: index.php"); // o ../login/index.php si cierras sesión desde /sitio/
exit();
?>