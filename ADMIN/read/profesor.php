<html>

<body>
    <?php
    //manera 1 de conectar 
    $mysqli = new mysqli("localhost", "ale", "ola", "escom");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else {
        $nombre = $mysqli->query("SELECT * FROM profesor "); //muestras todos y ps ya ves si seleccionas uno xdd.
        if ($nombre->num_rows == 0) {
            echo 'No se encontraron resultados';
        } else {
            for ($num_fila = $nombre->num_rows - 1; $num_fila >= 0; $num_fila--) {
                $nombre->data_seek($num_fila);
                $fila = $nombre->fetch_assoc();
                echo '<div id="' . $fila['IDProfesor'] . '" name="prof" class="fs-5 d-flex justify-content-between rounded-pill border border-primary">' . '<div>' . " nombre = " . $fila['NombrePro'] . '</div>' . '<div>' . " Apellido P = " . $fila['PaternoPro'] . '</div>' . '<div>' . " Apell. M. = " . $fila['MaternoPro'] . '</div>' . '</div>' . '<br>';
            }
        }
    }
    ?>
</body>

</html>