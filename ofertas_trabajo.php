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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <title>Postular</title>
<style>
body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(171deg, rgba(10,57,110,1) 0%, rgba(214,222,232,1) 98%);
      padding: 0;
    }
 * {
box-sizing: border-box;
}

*:focus {
	outline: none;
}

/* Estilos para el formulario de inicio de sesión */
.login {
  margin: 20px auto;
  width: 90%; /* Reducir el ancho para dispositivos más pequeños */
  max-width: 400px; /* Establecer un ancho máximo para evitar que se haga muy grande en pantallas grandes */
}

.login-screen {
  background-color: #FFF;
  padding: 20px;
  border-radius: 5px;
}

.app-title {
  text-align: center;
  color: #777;
}

.login-form {
  text-align: center;
}

.control-group {
  margin-bottom: 10px;
}

input {
  text-align: center;
  background-color: #ECF0F1;
  border: 2px solid transparent;
  border-radius: 3px;
  font-size: 16px;
  font-weight: 200;
  padding: 10px 0;
  width: 100%; /* Ajustar el ancho para dispositivos más pequeños */
  transition: border .5s;
  box-sizing: border-box; /* Incluye los bordes en el tamaño total */
}

input:focus {
  border: 2px solid #3498DB;
  box-shadow: none;
}

.btn {
  border: 2px solid transparent;
  background: #3498DB;
  color: #ffffff;
  font-size: 16px;
  line-height: 25px;
  padding: 10px 0;
  text-decoration: none;
  text-shadow: none;
  border-radius: 3px;
  box-shadow: none;
  transition: 0.25s;
  display: block;
  width: 100%; /* Ajustar el ancho para dispositivos más pequeños */
  margin: 0 auto;
}

.btn:hover {
  background-color: #2980B9;
}

.login-link {
  font-size: 12px;
  color: #444;
  display: block;
  margin-top: 12px;
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
</style>
</head>
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
        <a class="navbar-brand" href="Ver las Postulaciones.php">Ver las Postulaciones<span class="sr-only"></span></a>
      </li>
  
    </ul>
  </div>
</nav>
<?php
require_once "config.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
  $nombre = htmlentities($_POST["nombre"]);
  $email = htmlentities($_POST["correo"]);
  $titulo = htmlentities($_POST["empleo"]);
      if (isset($_FILES["archivo"]) && !empty($_FILES["archivo"]["name"])) {
          $archivo = htmlentities($_FILES['archivo']['name']);
          $cv_temp = $_FILES['archivo']['tmp_name'];
          $cv_ruta = 'Documentos/' . $archivo;
          move_uploaded_file($cv_temp, $cv_ruta);
        
          $sql = "INSERT INTO  seleccion (nombre, correo, empleo, archivo) VALUES ('$nombre', '$email', '$titulo', '$cv_ruta')";
             if ($conn->query($sql) === TRUE) {
                 echo "<h1>Postulacion registrado correctamente</h1>";
                 echo "<br>";
                 echo "<h1>Tu postulacion se va enviado a la empresa que te van estar contactandote</h1>";
             } else {
                 echo "Error al registrar el candidato: " . $conn->error;
             }
         
  } else {
      // El campo 'foto' no está presente o es nulo
      // Puedes manejar esto de acuerdo a tus necesidades
      // O establecer un valor predeterminado, dependiendo de tus requerimientos
  }
      // Insertar el nuevo candidato en la base de datos
}
?>
<div class="login">
		<div class="login-screen">
			<div class="app-title">

				<h2>Postulate</h2>
			</div>
<form method="post" action="ofertas_trabajo.php" enctype="multipart/form-data">
<div class="login-form">
				<div class="control-group">
        <input type="text" id="nombre"  class="login-field" value="" name="nombre" placeholder="Nombre Completo" require>
        <label class="login-field-icon fui-user" for="login-name"></label>
</div>
<div class="control-group">
        <input type="text" id="login"class="login-field" value="" name="correo" placeholder="Correo-Electronico" require>
        <label class="login-field-icon fui-user" for="login-name"></label>
</div>
<div class="control-group">
        <input type="text" id="empleo" class="login-field" value="" name="empleo" placeholder="Empleo" require>
        <label class="login-field-icon fui-user" for="login-name"></label>
</div>
<div class="control-group">
        <input type="file" id="archivo" name="archivo" class="login-field" value="" require>CV
        <label class="login-field-icon fui-user" for="login-name"></label>
</div>
        <input type="submit"class="btn btn-primary btn-large btn-block" value="Postular">
    </form>
    </div>
		</div>
	</div>
  <div class="card-container">
  <?php
require_once "config.php";
// Obtener las ofertas de trabajo desde la base de datos
$sql = "SELECT * FROM ofertas_trabajo";
$result = $conn->query($sql);

 if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<h5 class='card-header'>Empleos</h5>";
        echo " <div class='card-body'>";
        echo "<h5 class='card-title'>Empleo: " . $row["titulo"] . "</h5>";
        echo "<h5  class='card-text'>Descripcion: " . $row["descripcion"] . "</h5>";
        echo "<h5 class='card-text'>Fecha Publicada: " . $row["fecha_publicacion"] . "</h5>";
        echo "</div>";
        echo "</div>";
        echo "<hr>";
    }
} else {
    echo "<h1>No hay ofertas de trabajo disponibles.</h1>";
}
$conn->close();
?> 
</body>
</html>