<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mainproa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sala de profesor PRoA</title>
<meta name="description" content="Descripción de la página. Aquí puedes agregar una breve descripción de lo que trata tu página.">
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
  <p>Bienvenido al área de profesor, aquí podrás 
   ver los horarios correspondientes según los años
    y a su vez podrá ver o avisar a los alumnos 
   sobre el lugar donde se llevara a cabo la clase o algun 
   mensaje importante. 
   La forma de uso es la siguiente; 
   Al hacer clic en el botón (cursos), allí lo 
   llevara a los cursos con sus respectivos horarios,
   si usted no puede dar su respectiva clase a algun curso 
   debera ir al curso y marcar su materia con rojo para 
   indicar que su materia estara suspendida por el momento.</p>
  <a href="horarios.html" class="boton">Cursos</a>
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