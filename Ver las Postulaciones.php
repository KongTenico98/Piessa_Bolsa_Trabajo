<main>
<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id'])) {
  // Redireccionar al formulario de inicio de sesión si no ha iniciado sesión
  header("Location: login_candidato.php");
  exit;
}

// Obtener los datos del usuario de las variables de sesión
$nombre = $_SESSION['nombre'];
$correo = $_SESSION['correo'];
$foto = $_SESSION['foto'];
?>
</main>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Publicar Oferta de Empleo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
 <!-- Código del SDK de Facebook para desarrolladores -->
    <!-- Carga de la librería de CKEditor 5 -->
    <script src="ckeditor/ckeditor.js"></script>

</head>
<style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(171deg, rgba(10,57,110,1) 0%, rgba(214,222,232,1) 98%);
      padding: 0;
    }
    .main-content {
  padding: 20px;
}

/* Estilos para el enlace de la imagen del menú */
.menu-icon {
  height: 40px; /* Altura de la imagen del menú */
}

/* Ajustar el tamaño del contenedor del menú para que ocupe todo el espacio */
.container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 20px;
  max-width: 100%; /* Ocupar todo el ancho disponible */
}

/* Estilos de los enlaces en el menú */
.navbar-nav {
  margin: 0;
  padding: 0;
}

.navbar-nav .nav-item {
  list-style: none;
  display: inline-block;
}

.navbar-nav .nav-link {
  color: black; /* Color del texto de los enlaces */
  text-decoration: none;
  padding: 14px 16px; /* Espaciado de los enlaces */
  display: block;
}

.navbar-nav .nav-link:hover {
  background-color: #ddd; /* Color de fondo al pasar el ratón sobre el enlace */
  border-radius: 4px;
}
.card-container {
  display: flex;
  flex-wrap: wrap; /* Asegura que las tarjetas se envuelvan en varias filas si no caben en una sola línea */
  justify-content: space-between;
  margin: 20px; /* Ajusta este valor para controlar el espacio entre las tarjetas */
  box-sizing: border-box; /* Incluye los bordes en el tamaño total */
}

/* Estilos para las tarjetas */
.card {
  border: 1px solid #ccc;
  padding: 20px;
  width: calc(33.33% - 20px); /* Ajusta este valor para controlar el ancho de las tarjetas */
  margin-bottom: 20px; /* Espacio entre las tarjetas */
  box-sizing: border-box; /* Incluye los bordes en el tamaño total */

  /* Ajustar el ancho de las tarjetas para dispositivos más pequeños */
  @media screen and (max-width: 768px) {
    width: calc(50% - 20px); /* Ahora las tarjetas ocuparán el 50% del ancho en pantallas más pequeñas */
  }

  /* Ajustar el ancho de las tarjetas para dispositivos móviles */
  @media screen and (max-width: 480px) {
    width: calc(100% - 20px); /* Las tarjetas ocuparán todo el ancho disponible en dispositivos móviles */
  }
}
h1 {
	text-align: center;
	margin: 40px 0 40px;
	text-align: center;
	font-size: 30px;
	color: #ecf0f1;
	text-shadow: 2px 2px 4px #000000;
	font-family: 'Cherry Swash', cursive;
}
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<a class="navbar-brand" href="#">
<img src="<?php echo $foto; ?>" width="30" height="30" class="d-inline-block align-top" alt="">
<strong>Bienvenido, <?php echo $nombre; ?>!</strong>
  </a>
  <a class="navbar-brand" href="cerrar_sesion.php">Cerrar sesión</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="navbar-brand" href="ofertas_trabajo.php">Regresar<span class="sr-only"></span></a>
      </li>
  
    </ul>
  </div>
</nav>
<div class="card-container">
<?php
 require_once "config.php";
 $sql = "SELECT *FROM seleccion";
 $result = $conn->query($sql);
 
 if ($result->num_rows > 0) {
     while ($row = $result->fetch_assoc()) {
       echo "<div class='card'>";
       echo "<div class='card-header'>";
       echo "<strong>Postulaciones</strong>";
       echo "</div>";
       echo "<div class='card-body'>";
       echo "<h5 class='card-title'>Nombre: " . $row["nombre"] . "</h5>";
       echo "<p class='card-text'>Email: " . $row["correo"] . "</p>";
       echo "<p class='card-text'>Empleo: " . $row["empleo"] . "</p>";
       echo '<p class="card-text">Descargar CV: <a href="' . $row["archivo"] . '">Descargar CV</a>';
       echo "<p class='card-text'>Fecha de Postulacion: " . $row["fecha_postulacion"] . "</p>";
       echo "</div>";
       echo "</div>";
       echo "<hr>";
     }
 } else {
     echo "<h1>No hay ofertas de trabajo disponibles</h1>";
 }
 
$conn->close();
?> 
</body>
</html>