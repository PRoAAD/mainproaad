<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
    // Cerrar la sesión y redirigir a index.php
    session_destroy();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bienvenido estudiante PRoA</title>
<meta name="description" content="Pagina de inicio para el estudiante PRoA.">
</head>
<style>
<body> {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
  }
  header {
    background-color: #154360;
    color: #fff;
    text-align: center;
    padding: 1em 0;
  }
  main {
    max-width: 800px;
    margin: 0 auto;
    padding: 2em;
  }
  .boton {
    display: inline-block;
    background-color: #333;
    color: #fff;
    padding: 0.5em 1em;
    text-decoration: none;
    border-radius: 4px;
  }
  .boton:hover {
    background-color: #555;
  }
  footer {
    background-color: #2874A6;
    color: #fff;
    text-align: center;
    padding: 1em 0;
  }
</style>
</head>
<body>
<header>
  <h1>Administracion PRoA</h1>
</header>
<main>
<p>¿Como funciona Administracion PRoA?</p>
  <p>Bienvenido al área de alumnos, aquí podrás 
   ver los horarios correspondientes según su año 
   en curso y a su vez podrá ver o avisar al profesor 
   sobre el lugar donde se llevara a cabo la clase. 
   La forma de uso es la siguiente; 
   Al hacer clic en el botón (horarios), allí lo 
   llevara a su horario del año, si una materia esta en 
   color rojo estará suspendida y si esta en color 
   amarillo es porque el profesor de esa materia a 
   agregado un comentario.</p>
  <a href="sites/alumno/alumhor.php" class="boton">Visualizar horario</a>
</main>
    <footer>
        <?php
        if (isset($_GET['nombre']) && isset($_GET['apellido'])) {
            $nombreUsuario = $_GET['nombre'];
            $apellidoUsuario = $_GET['apellido'];
            echo "Accediste como: $nombreUsuario $apellidoUsuario";
        }
        ?>
    </footer>
</body>
</html>
