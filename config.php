<?php
// Configuración de la base de datos
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'empleos';

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die('Error de conexión a la base de datos: ' . $conn->connect_error);
}
?>