<?php
// Iniciar sesión en PHP
session_start();

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();
header('Location: login_candidato.php');
exit();
?>