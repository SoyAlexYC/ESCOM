
    <?php
    //manera 1 de conectar 
    $mysqli = new mysqli("localhost", "ale", "ola", "escom");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else {
        $nombre = $mysqli->query("SELECT * FROM salon "); //muestras todos y ps ya ves si seleccionas uno xdd.
        if ($nombre->num_rows == 0) {
            echo 'No se encontraron resultados';
        } else {
            $respAX = [];
            $respAX["code"] = 1;
            $respAX["log"] = date("Y-m-d H:i:s");
            $infSalon = [];
            while ($fila = mysqli_fetch_assoc($nombre)) {
                $infSalon[] = $fila;
            }
            $respAX["data"] = $infSalon;
            echo json_encode($respAX);
        }
    }
    ?>