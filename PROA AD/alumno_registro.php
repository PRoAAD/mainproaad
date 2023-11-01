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
    $apellido = $_POST["apellido"];
    $gmail = $_POST["gmail"];
    $idcurso = $_POST["curso"];
    $password = md5($_POST["password"]);

    
    $sql_persona = "INSERT INTO persona (dni, nombre, apellido, gmail, es_profesor, mypassword) VALUES ('$dni', '$nombre', '$apellido', '$gmail', false, '$password')";
    if ($conn->query($sql_persona) === TRUE) {
        
        $persona_id = $conn->insert_id;

        // Insertar datos registrados a la tabla alumno
        $sql_alumno = "INSERT INTO alumno (nombre, dni, idcurso) VALUES ('$nombre', '$dni', '$idcurso')";
        if ($conn->query($sql_alumno) === TRUE) {
            echo "Registro de alumno exitoso.";
        } else {
            echo "Error al registrar alumno: " . $conn->error;
        }
    } else {
        echo "Error al registrar persona: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Alumno</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            position: relative;
        }
        
        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        h1 {
            margin-top: 0;
        }

        .login-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #333;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        .login-button:hover {
            background-color: #555;
        }

        form {
            margin-top: 30px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
        
        .popup-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
        }

        .popup-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Registro de Alumno</h1>
        <a href="index.php" class="login-button">Volver al inicio</a>
    </header>
    <!-- Turip ip ip ip -->
    <div class="container">
        <form action="alumno_registro.php" method="POST">
            DNI: <input type="text" name="dni"><br>
            Nombre: <input type="text" name="nombre"><br>
            Apellido: <input type="text" name="apellido"><br>
            Gmail: <input type="email" name="gmail"><br>
            <label for="curso">Año en curso:</label>
            <?php include('functions/cursoscombo.php'); ?>
            <br>
            Contraseña: <input type="password" name="password"><br>
            <input type="submit" value="Registrar Alumno">
        </form>
    </div>
    <div class="popup-container" id="popup-container"> 
        <div class="popup-box">
            <span class="close-button" id="close-button">&times;</span>
            <h2>¡El alumno se ha registrado correctamente!</h2>
            <a href="index.php" class="return-button">Iniciar Sesion</a>
        </div>
    </div>
    <!-- Coso para la ventana de que se inicio sesion, es mejor no tocarlo, porfavo  'marto 2023 -->
</body>
</html>