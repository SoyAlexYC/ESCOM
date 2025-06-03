
  <?php
  $search = $_GET["create"]; //viene como json i guess xdd
  //manera 1 de conectar 
    $mysqli = new mysqli("localhost", "admin","123456", "escom");
    if ($mysqli->connect_errno) {
      echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else {
      if ($search == 'profesor') {
        $nombre = $mysqli->query("SELECT * FROM profesor "); //muestras todos y ps ya ves si seleccionas uno xdd.
        if ($nombre->num_rows == 0) {
            echo 'No se encontraron resultados';
          } else {
            for ($num_fila = $nombre->num_rows - 1; $num_fila >= 0; $num_fila--) {
              $nombre->data_seek($num_fila);
              $fila = $nombre->fetch_assoc();
              echo '<div id="' . $fila['IDProfesor'] .'" name="prof" class="fs-5 d-flex justify-content-between rounded-pill border border-primary">' . '<div>' ." nombre = " . $fila['NombrePro'] . '</div>' . '<div>'. " Apellido P = " . $fila['PaternoPro'] . '</div>' . '<div>'. " Apell. M. = " . $fila['MaternoPro'] . '</div>' . '</div>'. '<br>';
          }
        }
      }
      elseif ($search == 'materia') {
        $nombre = $mysqli->query("SELECT * FROM materia"); //despues de selecc materia, profes q la dan  ya al click de profe es el de arriba
        if ($nombre->num_rows == 0) {
            echo 'No se encontraron resultados';
          } else {
            for ($num_fila = $nombre->num_rows - 1; $num_fila >= 0; $num_fila--) {
              $nombre->data_seek($num_fila);
              $fila = $nombre->fetch_assoc();
              echo '<div id="' . $fila['IDProfesor'] .'" name="prof" class="fs-5 d-flex justify-content-between rounded-pill border border-primary">' . '<div>' ." nombre = " . $fila['NombrePro'] . '</div>' . '<div>'. " Apellido P = " . $fila['PaternoPro'] . '</div>' . '<div>'. " Apell. M. = " . $fila['MaternoPro'] . '</div>' . '</div>'. '<br>';
          }
        }
      }
      elseif ($search == 'grupo') {
        $nombre = $mysqli->query("SELECT * FROM grupo"); //despues de seleccionar un grupo, aparecerà el horario de ese grupo, como nos
        //aparece a los alumno, con cada profesor y asi, link para el profe y asi
        if ($nombre->num_rows == 0) {
            echo 'No se encontraron resultados';
          } else {
            for ($num_fila = $nombre->num_rows - 1; $num_fila >= 0; $num_fila--) {
              $nombre->data_seek($num_fila);
              $fila = $nombre->fetch_assoc();
              echo '<div id="' . $fila['IDProfesor'] .'" name="prof" class="fs-5 d-flex justify-content-between rounded-pill border border-primary">' . '<div>' ." nombre = " . $fila['NombrePro'] . '</div>' . '<div>'. " Apellido P = " . $fila['PaternoPro'] . '</div>' . '<div>'. " Apell. M. = " . $fila['MaternoPro'] . '</div>' . '</div>'. '<br>';
          }
        }
      }
      else {
            echo 'No se encontraron resultados';
      }
  }
  ?>
</body>

</html>