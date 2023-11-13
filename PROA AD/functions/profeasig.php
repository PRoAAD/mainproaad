<!DOCTYPE html>
<html lang="es">
<head>
    <style>
        .buttom {
            display: inline-block;
            background-color: #333;
            color: #fff;
            padding: 0.5em 1em;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
        <!-- Botón para agregar y remover asignaciónes -->
        <button id="agregarAsignacion">Agregar Asignaciónes</button>
        <button id="removerAsignacion">Remover Asignaciónes</button>
        
    <div style="display: flex; flex-direction: row;">
        <!-- Cuadro de Materias -->
        <div style="flex: 1;">
            <h2>Materia</h2>
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
        
        <!-- Cuadro de Cursos -->
        <div style="flex: 1;">
            <h2>Curso</h2>
            <select id="cursos">
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



    <div id="asignaciones">
    </div>

    <!-- Funcion para añadir y eliminas los cuadros de asignaciones -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toggleAsignacionesButton = document.getElementById("toggleAsignaciones");
            const asignacionesContainer = document.getElementById("asignaciones");
            const agregarAsignacionButton = document.getElementById("agregarAsignacion");
            const removerAsignacionButton = document.getElementById("removerAsignacion");

            agregarAsignacionButton.addEventListener("click", function () {
                const nuevaAsignacion = document.createElement("div");
                nuevaAsignacion.innerHTML = `
                    <div style="display: flex; flex-direction: row;">
                        <select class="materias">
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
                        <select class="cursos">
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
                `;
                asignacionesContainer.appendChild(nuevaAsignacion);
            });
        });

        removerAsignacionButton.addEventListener("click", function () {
            // Obtener todas las filas de asignaciones
            const filasAsignaciones = asignacionesContainer.querySelectorAll("div");

            // Verificar que haya más de una fila antes de intentar eliminar
            if (filasAsignaciones.length > 1) {
                // Eliminar la última fila
                asignacionesContainer.removeChild(filasAsignaciones[filasAsignaciones.length - 1]);
            } else {
                alert("No se pueden eliminar más asignaciones.");
            }
        });
    </script>
</body>
</html>
