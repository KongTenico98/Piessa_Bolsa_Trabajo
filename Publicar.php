<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id'])) {
    // Redireccionar al formulario de inicio de sesión si no ha iniciado sesión
    header("Location: login_empresario.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
 <!-- Código del SDK de Facebook para desarrolladores -->
    <!-- Carga de la librería de CKEditor 5 -->
    <script src="ckeditor/ckeditor.js"></script>
    <title>Publicar</title>
    <style>
* {
  box-sizing: border-box;
  font-family: sans-serif;
}
.login {
  width: 90%; /* Reducir el ancho para dispositivos más pequeños */
  max-width: 800px; /* Establecer un ancho máximo para evitar que se haga muy grande en pantallas grandes */
  border: 8px solid #CCC;
  background-color: royalblue;
  background-size: cover;
  margin: 30px auto;
  border-radius: 20px;
  box-sizing: border-box; /* Incluye los bordes en el tamaño total */
  padding: 30px; /* Aumentar el espaciado */
}

/* Ajustar el margen superior e inferior para dispositivos más pequeños */
@media screen and (max-width: 768px) {
  .login {
    margin: 15px auto;
  }
}

/* Estilos para los elementos del formulario */
.login .form {
  width: 100%;
  height: 100%;
  padding: 15px 25px;
}

.login .form h2 {
  color: #FFF;
  text-align: center;
  font-weight: normal;
  font-size: 18px;
  margin-top: 30px; /* Reducir el margen superior */
  margin-bottom: 40px; /* Reducir el margen inferior */
}

/* Ajustar el tamaño del input para dispositivos más pequeños */
.login .form input {
  width: 100%;
  height: 35px; /* Reducir la altura del input */
  margin-top: 15px; /* Reducir el espaciado entre los inputs */
  font-size: 13px; /* Reducir el tamaño de la fuente */
}

/* Estilos para el botón de submit */
.login .form input.submit {
  background: rgba(255, 255, 255, 0.9);
  color: #444;
  font-size: 14px; /* Reducir el tamaño de la fuente */
  margin-top: 30px; /* Reducir el espaciado en dispositivos más pequeños */
  font-weight: bold;
  height: 30px; /* Reducir la altura del botón */
}

/* Ajustar el margen superior para dispositivos más pequeños */
@media screen and (max-width: 480px) {
  .login .form h2 {
    margin-top: 15px;
  }
}
   
        body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(171deg, rgba(10,57,110,1) 0%, rgba(214,222,232,1) 98%);
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
    .btn-primary {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
        }

        /* Estilos para el icono */
        .btn-primary .fa-facebook {
            margin-right: 8px;
        }

        /* Cambiar el color del texto del botón al pasar el ratón */
        .btn-primary:hover {
            background-color: #0056b3;
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
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<a class="navbar-brand" href="#">
<img src="<?php echo $foto; ?>" width="50" height="30" class="d-inline-block align-top" alt="">
<strong>Bienvenido, <?php echo $nombre; ?>!</strong>
  </a>
  <a class="navbar-brand" href="cerrar_sesion2.php">Cerrar sesión</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
    </ul>
  </div>
</nav>
<div class="login">
<div class="form">
    <h2>Publicar Oferta de Empleo</h2>
    <form action="Publicar.php" method="post">
    <div class="form-group">
    <label for="titulo" style="color: white;">Título:</label>
    <input type="text" class="form-control" id="titulo" aria-describedby="emailHelp" placeholder="Empleo">
</div>
        <label for="descripcion" style="color: white;">Descripción:</label>
        <textarea name="descripcion" id="descripcion" required></textarea>
        <script>
            CKEDITOR.replace('descripcion');
        </script>
        <br>
        <input type="submit" style="color: black;" style="font-family: Arial Black;" value="Publicar">
</div>
</div>
<center><a href="https://www.facebook.com/sharer/sharer.php?u=Trabajos.php" target="_blank" class="btn-primary">
        <i class="fab fa-facebook"></i>
        Compartir las Ofertas de Empleo
    </a>
    </form> 
    <?php
    require_once "config.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       // Recuperar datos del formulario
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO ofertas_trabajo (titulo, descripcion) VALUES ('$titulo', '$descripcion')";

if ($conn->query($sql) === TRUE) {
    echo "Oferta publicada con éxito.";
} else {
    echo "Error al publicar la oferta: " . $conn->error;
}

      }
    ?>
    <br> 
    <h1>Postulaciones</h1>
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
     echo "<h1>No hay ofertas de trabajo disponibles.</h1>";
 }
 
$conn->close();
?>
</div>
</div> 
</body>
</html>