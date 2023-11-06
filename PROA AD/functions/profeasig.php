<!DOCTYPE html>
<html lang="es">
<body>
    <div style="display: flex; flex-direction: row;">
        <!-- Cuadro de Materias -->
        <div style="flex: 1;">
            <h2>Materias</h2>
            <select id="materias">
                <?php
                // Conexión a la base de datos
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
                $materiasQuery = "SELECT id, materia FROM materias";
                $result = $conn->query($materiasQuery);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["id"] . "'>" . $row["materia"] . "</option>";
                    }
                }
                
                $conn->close();
                ?>
            </select>
        </div>
        
        <!-- Cuadro de Cursos -->
        <div style="flex: 1;">
            <h2>Curso</h2>
            <select id="cursos">
                <?php
                $cursosQuery = "SELECT idcurso, curso FROM cursos ORDER BY idcurso";
                $result = $conn->query($cursosQuery);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["idcurso"] . "'>" . $row["curso"] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>

    <button id="agregarAsignacion">Agregar Asignación</button>
    <div id="asignaciones">
    </div>
</body>
</html><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignación de Materias y Cursos</title>
</head>
<body>
    <h1>Asignación de Materias y Cursos</h1>
    <div style="display: flex; flex-direction: row;">
        <div style="flex: 1;">
            <h2>Materias</h2>
            <select id="materias">
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
                $materiasQuery = "SELECT id, materia FROM materias";
                $result = $conn->query($materiasQuery);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["id"] . "'>" . $row["materia"] . "</option>";
                    }
                }
                
                $conn->close();
                ?>
            </select>
        </div>
        
        <!-- Cuadro de Cursos -->
        <div style="flex: 1;">
            <h2>Curso</h2>
            <select id="cursos">
                <?php
                // Conexión a la base de datos (puedes reutilizar la conexión anterior)
                
                // Consulta para obtener los cursos desde la base de datos
                $cursosQuery = "SELECT idcurso, curso FROM cursos ORDER BY idcurso";
                $result = $conn->query($cursosQuery);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["idcurso"] . "'>" . $row["curso"] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>

    <button id="agregarAsignacion">Agregar Asignación</button>

    <div id="asignaciones">
    </div>
</body>
</html>