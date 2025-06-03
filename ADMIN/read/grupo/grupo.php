<html>

<body>
    <?php
    
  $search = $_GET["grupo"];
    //manera 1 de conectar 
    $mysqli = new mysqli("localhost", "admin","123456", "escom");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else {
        $nombre = $mysqli->query("SELECT * FROM ((((((profesor p inner join horario h on p.IdProfesor = h.IdProfesor) inner join espacio e on h.IDHorario = e.IdHorario) inner join clase c on e.IdClase = c.IDClase) inner join curso u on c.IdCurso = u.IDCurso) inner join grupo g on u.IdGrupo = g.IDGrupo) inner join materia m on u.IdMateria = m.IDMateria)WHERE g.IdGrupo = '$search' GROUP BY NombMateria"); //muestras todos y ps ya ves si seleccionas uno xdd.
        if ($nombre->num_rows == 0) {
            echo 'No se encontraron resultados';
        } else {
            for ($num_fila = $nombre->num_rows - 1; $num_fila >= 0; $num_fila--) {
                $nombre->data_seek($num_fila);
                $fila = $nombre->fetch_assoc();
                echo '<div id="' . $fila['IDProfesor'] . '" name="prof" class="fs-5 d-flex justify-content-between rounded-pill border border-primary">' . '<div>' . " nombre = " . $fila['NombrePro'] . '</div>' . '<div>' . " Apellido P = " . $fila['PaternoPro'] . '</div>' . '<div>' . " Apell. M. = " . $fila['MaternoPro'] . '</div>' . '<div>' . " Materia = " . $fila['NombMateria'] . '</div>'. '</div>' . '<br>';
            }
        }
    }
    ?>
</body>

</html>