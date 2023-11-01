<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mainproa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los cursos desde la base de datos
$sql = "SELECT * FROM cursos";
$result = $conn->query($sql);

// Iniciar el ComboBox
echo '<select name="curso">';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row["idcurso"] . '">' . $row["curso"] . '</option>';
    }
} else {
    echo '<option value="">No hay cursos disponibles</option>';
}


// Cerrar el ComboBox
echo '</select>';

$conn->close();
?>