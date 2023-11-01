<?php
session_start();
$idcurso = $_SESSION['user_idcurso'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mainproa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida " . $conn->connect_error);
}

$userID = $_SESSION['user_id'];


?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Horarios de curso</title>
<link rel="stylesheet" type="text/css" href="tu-archivo-css.css">
</head>
<body>

<div class="header">
    <h1>Visualizador de horario</h1>
</div>

<div class="container">
    <?php
    $sql = "SELECT idcurso FROM alumno WHERE idalumno = $userID";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $pdfFileName = "/main/sites/files/cursos/_tmp/{$idcurso}.pdf";

        if (file_exists($pdfFileName)) {
            echo '<iframe src="' . $pdfFileName . '" width="100%" height="600px"></iframe>';
        } else {
            echo "El horario para este curso no está disponible.";
        }
    }
    $conn->close();
    ?>
</div>

</body>
</html>