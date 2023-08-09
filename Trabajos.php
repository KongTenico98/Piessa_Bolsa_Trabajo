<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <title>Empleos</title>
</head>
<body>
<style>
    body {
		margin: 0;
  padding: 0;
            /* Establece la imagen de fondo y ajusta su tamaño y posición */
			background: linear-gradient(171deg, rgba(10,57,110,1) 0%, rgba(214,222,232,1) 98%);
           
        }
		header {
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 10px;
}

main {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

/* Estilos específicos para dispositivos móviles */
@media screen and (max-width: 768px) {
  /* Agrega aquí los estilos específicos para dispositivos móviles */
}

/* Estilos específicos para tablets */
@media screen and (min-width: 769px) and (max-width: 1024px) {
  /* Agrega aquí los estilos específicos para tablets */
}

/* Estilos específicos para iPads */
@media screen and (min-width: 768px) and (max-width: 1024px) and (orientation: portrait) {
  /* Agrega aquí los estilos específicos para iPads en modo retrato */
}

@media screen and (min-width: 1025px) and (max-width: 1366px) and (orientation: landscape) {
  /* Agrega aquí los estilos específicos para iPads en modo paisaje */
}

/* Estilos específicos para pantallas grandes */
@media screen and (min-width: 1367px) {
  /* Agrega aquí los estilos específicos para pantallas grandes */
}
nav {
	margin: 27px auto 0;

	position: relative;
	width: 210px;
	height: 50px;
	background-color: #34495e;
	border-radius: 8px;
	font-size: 0;
}
nav a {
	line-height: 50px;
	height: 100%;
	font-size: 15px;
	display: inline-block;
	position: relative;
	z-index: 1;
	text-decoration: none;
	text-transform: uppercase;
	text-align: center;
	color: white;
	cursor: pointer;
}
nav .animation {
	position: absolute;
	height: 100%;
	top: 0;
	z-index: 0;
	transition: all .5s ease 0s;
	border-radius: 8px;
}
a:nth-child(1) {
	width: 100px;
}
a:nth-child(2) {
	width: 110px;
}
a:nth-child(3) {
	width: 100px;
}
a:nth-child(4) {
	width: 160px;
}
a:nth-child(5) {
	width: 120px;
}
nav .start-home, a:nth-child(1):hover~.animation {
	width: 100px;
	left: 0;
	background-color: #1abc9c;
}
nav .start-about, a:nth-child(2):hover~.animation {
	width: 110px;
	left: 100px;
	background-color: #e74c3c;
}
nav .start-blog, a:nth-child(3):hover~.animation {
	width: 100px;
	left: 210px;
	background-color: #3498db;
}
nav .start-portefolio, a:nth-child(4):hover~.animation {
	width: 160px;
	left: 310px;
	background-color: #9b59b6;
}
nav .start-contact, a:nth-child(5):hover~.animation {
	width: 120px;
	left: 470px;
	background-color: #e67e22;
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



span {
    color: #2BD6B4;
}
.columna-izquierda {
            width: 40%;
            float: left;
        }

        .columna-derecha {
            width: 60%;
            float: right;
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
<h1>Las Ofertas de Empleo</h1> 
<nav>
	<a href="index.php">Inicio</a>
    <a href="Trabajos.php">Trabajos</a>
	<div class="animation start-home"></div>
</nav> 
<br>
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
        echo "<h5  class='card-text'> Descripcion" . $row["descripcion"] . "</h5>";
        echo "<h5 class='card-text'> Fecha Publicada: " . $row["fecha_publicacion"] . "</h5>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<h1>No hay ofertas de trabajo disponibles</h1>";
}
$conn->close();
?> 
</body>
</div>
</html>