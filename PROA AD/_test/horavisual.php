<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario de Clases</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
            position: relative;
        }
        .materia, .hora {
            position: absolute;
            width: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
        }
    </style>
</head>
<body>
    <?php
    class Horario {
        private $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];
        private $clases = [];

        public function agregarClase($dia, $materia, $hora) {
            $this->clases[$dia][$materia] = $hora;
        }

        public function mostrarHorario() {
            echo "<table id='horario'>";
            echo "<tr>";
            foreach ($this->dias as $dia) {
                echo "<th>$dia</th>";
            }
            echo "</tr>";
            foreach ($this->dias as $dia) {
                echo "<tr>";
                foreach ($this->dias as $dia2) {
                    if (isset($this->clases[$dia][$dia2])) {
                        $materia = $dia2;
                        $hora = $this->clases[$dia][$dia2];
                        echo "<td contenteditable='true' data-dia='$dia' data-materia='$materia' data-hora='$hora'>";
                        echo "<div class='materia'>$materia</div>";
                        echo "<div class='hora'>$hora</div>";
                        echo "</td>";
                    } else {
                        echo "<td contenteditable='true' data-dia='$dia' data-materia='' data-hora=''>";
                        echo "<div class='materia'></div>";
                        echo "<div class='hora'></div>";
                        echo "</td>";
                    }
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }

    $horario = new Horario();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dia = $_POST['dia'];
        $materia = $_POST['materia'];
        $hora = $_POST['hora'];
        $horario->agregarClase($dia, $materia, $hora);
    }
    ?>

    <h1>Horario de Clases</h1>

    <h2>Horario Actual</h2>
    <?php $horario->mostrarHorario(); ?>

    <h2>Agregar Fila</h2>
    <button onclick="agregarFila()">Agregar Fila</button>

    <script>
        function agregarFila() {
            var table = document.getElementById('horario');
            var newRow = table.insertRow(table.rows.length);

            for (var i = 0; i < 5; i++) {
                var newCell = newRow.insertCell(i);
                newCell.contentEditable = true;
                newCell.dataset.dia = '';
                newCell.dataset.materia = '';
                newCell.dataset.hora = '';
                newCell.innerHTML = '<div class="materia"></div><div class="hora"></div>';
            }
        }
    </script>
</body>
</html>
