
    <?php
    //manera 1 de conectar 
    $mysqli = new mysqli("localhost", "ale", "ola", "escom");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else {
        $nombre = $mysqli->query("SELECT * FROM materia "); //muestras todos y ps ya ves si seleccionas uno xdd.
        if ($nombre->num_rows == 0) {
            echo 'No se encontraron resultados';
        } else {
            $respAX = [];
            $respAX["code"] = 1;
            $respAX["log"] = date("Y-m-d H:i:s");
            $infMat = [];
            while ($fila = mysqli_fetch_assoc($nombre)) {
                $infMat[] = $fila;
            }
            $respAX["data"] = $infMat;
            echo json_encode($respAX);
            //echo '<select required id="materia" name="materia" class="form-select" aria-label="Default select example">';
            /*for ($num_fila = $nombre->num_rows - 1; $num_fila >= 0; $num_fila--) {
                $nombre->data_seek($num_fila);
                $fila = $nombre->fetch_assoc();
                echo '<option id="' . $fila['IDMateria'] . '">' . $fila['NombMateria'] . '</option>';
            }
            echo '</select>';*/
        }
    }
    ?>