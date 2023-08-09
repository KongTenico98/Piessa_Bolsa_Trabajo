<?php 
session_start();
require_once "config.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
$nombre = htmlentities($_POST["nombre"]);
    $email = htmlentities($_POST["correo"]);
    if (isset($_FILES["foto"]) && !empty($_FILES["foto"]["name"])) { 
        $foto = htmlentities($_FILES['foto']['name']);
        $foto_temp = $_FILES['foto']['tmp_name'];
        $foto_ruta = 'Imágenes/' . $foto;
        move_uploaded_file($foto_temp, $foto_ruta);
        $sql = "INSERT INTO empresarios (nombre, correo, foto) VALUES ('$nombre', '$email', '$foto_ruta')";
           if ($conn->query($sql) === TRUE) {
               echo "Empresario registrado correctamente.";
           } else {
               echo "Error al registrar el candidato: " . $conn->error;
           }
       
} else {
    // El campo 'foto' no está presente o es nulo
    // Puedes manejar esto de acuerdo a tus necesidades
    $foto = ""; // O establecer un valor predeterminado, dependiendo de tus requerimientos
}
    // Insertar el nuevo candidato en la base de datos
   

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Registro de Empresario</title>
</head>
<style>
@import url('https://fonts.googleapis.com/css?family=Poppins');

/* BASIC */

html {
  margin: 0;
  padding: 0;
  background-color: #56baed;
}

body {
  font-family: "Poppins", sans-serif;
  height: 100vh;
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
a {
  color: #92badd;
  display:inline-block;
  text-decoration: none;
  font-weight: 400;
}

h2 {
  text-align: center;
  font-size: 16px;
  font-weight: 600;
  text-transform: uppercase;
  display:inline-block;
  margin: 40px 8px 10px 8px; 
  color: #cccccc;
}



/* STRUCTURE */

.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column; 
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
}

#formContent {
  -webkit-border-radius: 10px 10px 10px 10px;
  border-radius: 10px 10px 10px 10px;
  background: #fff;
  padding: 30px;
  width: 90%;
  max-width: 450px;
  position: relative;
  padding: 0px;
  -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  text-align: center;
}

#formFooter {
  background-color: #f6f6f6;
  border-top: 1px solid #dce8f1;
  padding: 25px;
  text-align: center;
  -webkit-border-radius: 0 0 10px 10px;
  border-radius: 0 0 10px 10px;
}



/* TABS */

h2.inactive {
  color: #cccccc;
}

h2.active {
  color: #0d0d0d;
  border-bottom: 2px solid #5fbae9;
}



/* FORM TYPOGRAPHY*/

input[type=button], input[type=submit], input[type=reset]  {
  background-color: #56baed;
  border: none;
  color: white;
  padding: 15px 80px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  text-transform: uppercase;
  font-size: 13px;
  -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
  margin: 5px 20px 40px 20px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
  background-color: #39ace7;
}

input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
  -moz-transform: scale(0.95);
  -webkit-transform: scale(0.95);
  -o-transform: scale(0.95);
  -ms-transform: scale(0.95);
  transform: scale(0.95);
}

input[type=text] {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

input[type=text]:focus {
  background-color: #fff;
  border-bottom: 2px solid #5fbae9;
}

input[type=text]:placeholder {
  color: #cccccc;
}



/* ANIMATIONS */

/* Simple CSS3 Fade-in-down Animation */
.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

/* Simple CSS3 Fade-in Animation */
@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

.fadeIn {
  opacity:0;
  -webkit-animation:fadeIn ease-in 1;
  -moz-animation:fadeIn ease-in 1;
  animation:fadeIn ease-in 1;

  -webkit-animation-fill-mode:forwards;
  -moz-animation-fill-mode:forwards;
  animation-fill-mode:forwards;

  -webkit-animation-duration:1s;
  -moz-animation-duration:1s;
  animation-duration:1s;
}

.fadeIn.first {
  -webkit-animation-delay: 0.4s;
  -moz-animation-delay: 0.4s;
  animation-delay: 0.4s;
}

.fadeIn.second {
  -webkit-animation-delay: 0.6s;
  -moz-animation-delay: 0.6s;
  animation-delay: 0.6s;
}

.fadeIn.third {
  -webkit-animation-delay: 0.8s;
  -moz-animation-delay: 0.8s;
  animation-delay: 0.8s;
}

.fadeIn.fourth {
  -webkit-animation-delay: 1s;
  -moz-animation-delay: 1s;
  animation-delay: 1s;
}

/* Simple CSS3 Fade-in Animation */
.underlineHover:after {
  display: block;
  left: 0;
  bottom: -10px;
  width: 0;
  height: 2px;
  background-color: #56baed;
  content: "";
  transition: width 0.2s;
}

.underlineHover:hover {
  color: #0d0d0d;
}

.underlineHover:hover:after{
  width: 100%;
}



/* OTHERS */

*:focus {
    outline: none;
} 

#icon {
  width:60%;
}

* {
  box-sizing: border-box;
}
</style>
<body>
<h1>Registro de Empresario</h1>
    <div class="wrapper fadeInDown">
        <div id="formContent">
          <!-- Tabs Titles -->
          <!-- Icon -->
          <h2 class="active"> Registrar </h2>
          <h2 class="inactive underlineHover">Empresario</h2>


          <div class="fadeIn first">
           <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJHVLf9CA9-Aga5SAXLHh0evd-Zrsn3l0Wlg" id="icon" alt="User Icon" />
    <form method="post" action="registro_empresario.php" enctype="multipart/form-data">
        <input type="text" id="nombre" class="fadeIn second" name="nombre" placeholder="Nombre Completo" require>
        <input type="text" id="login" class="fadeIn second" name="correo" placeholder="Correo-Electronico"><br>
        <div class="form-group">
    <label for="Foto">Foto:</label>
    <input type="file" class="form-control-file" id="foto"  name="foto">
  </div> 
        <input type="submit" class="fadeIn fourth" value="Registrar">
        <a href="login_empresario.php">Iniciar sesion</a>
    </form>
</body>
</html>