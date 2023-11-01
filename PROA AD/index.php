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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $password = md5($_POST["password"]);

    $sql = "SELECT * FROM persona WHERE dni = '$dni' AND nombre = '$nombre' AND mypassword = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row["es_profesor"] == 0) {
            header("Location: inicio_alumno.php?nombre={$row['nombre']}&apellido={$row['apellido']}");
            exit;
        } elseif ($row["es_profesor"] == 1) {
            header("Location: inicio_profesor.php?nombre={$row['nombre']}&apellido={$row['apellido']}");
            exit;
        }
    } else {
        echo "Credenciales inválidas.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<html lang="es">
<head>
    <title>Pagina de inicio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
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
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenido</h1>
        <a href="alumno_registro.php" class="boton">Registrarse como un alumno</a>
        <a href="profesor_registro.php" class="boton">Registrarse como un profesor</a>
    </header>
    <main>
        <form action="index.php" method="POST">
            DNI: <input type="text" name="dni"><br>
            Nombre: <input type="text" name="nombre"><br>
            Contraseña: <input type="password" name="password"><br>
            <input type="submit" value="Iniciar sesión">
        </form>
    </main>
    <footer>
        
    </footer>
</body>
</html>