
    <?php
    //manera 1 de conectar 
    $mysqli = new mysqli("localhost", "ale", "ola", "escom");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else {
        $nombre = $mysqli->query("SELECT * FROM curso c INNER JOIN grupo g ON c.IdGrupo = g.IDGrupo INNER JOIN materia m ON c.IdMateria = m.IDMateria"); //muestras todos y ps ya ves si seleccionas uno xdd.
        if ($nombre->num_rows == 0) {
            echo 'No se encontraron resultados';
        } else {
            $respAX = [];
            $respAX["code"] = 1;
            $respAX["log"] = date("Y-m-d H:i:s");
            $infCurso = [];
            while ($fila = mysqli_fetch_assoc($nombre)) {
                $infCurso[] = $fila;
            }
            $respAX["data"] = $infCurso;
            echo json_encode($respAX);
        }
    }
    ?>