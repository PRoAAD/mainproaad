<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prototipo de Asignación de Materias y Cursos - BORRAR ENCABEZADO AL FINALIZAR</title>
</head>
<body>
    <h1>Asignación de Materias y Cursos</h1>
    <div style="display: flex; flex-direction: row;">
        <div style="flex: 1;">
            <h2>Materias</h2>
            <select id="materias">
                <label for="curso">:</label>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "mainproa";
                
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                // Comprobar la conexión
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }
                
                // Consulta para obtener las materias desde la base de datos
                $materiasQuery = "SELECT idmateria, materia FROM materias";
                $result = $conn->query($materiasQuery);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["idmateria"] . "'>" . $row["materia"] . "</option>";
                    }
                }
                
                $conn->close();
                ?>
            </select>
        </div>
        
        <div style="flex: 1;">
            <label for="curso">Cursos:</label>
            <?php include('functions/cursoscombo.php'); ?>
            <br>
        </div>
    </div>

    <button id="agregarAsignacion">Agregar Asignación</button>

    <div id="asignaciones">
    </div>
</body>
</html>
