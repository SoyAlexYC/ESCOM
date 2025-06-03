<html>

<body>
    <?php
    //manera 1 de conectar 
    $mysqli = new mysqli("localhost", "admin","123456", "escom");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else {
        $nombre = $mysqli->query("SELECT * FROM grupo "); //muestras todos y ps ya ves si seleccionas uno xdd.
        if ($nombre->num_rows == 0) {
            echo 'No se encontraron resultados';
        } else {
            echo '<select class="form-select" aria-label="Default select example">';
            for ($num_fila = $nombre->num_rows - 1; $num_fila >= 0; $num_fila--) {
                $nombre->data_seek($num_fila);
                $fila = $nombre->fetch_assoc();
                echo '<option id="' . $fila['IDGrupo'] . '">' . $fila['NombreGru'] . '</option>';
            }
            echo '</select>';
        }
    }
    ?>
</body>

</html>