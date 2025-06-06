  <?php

  date_default_timezone_set("America/Mexico_City");

  $search = $_REQUEST["search"];

  //manera 1 de conectar 

  $fr = explode(" ", $search);

  $n = count($fr);



  if ($n >= 5) {

    echo 'No se encontraron resultados';

  } else {

    $mysqli = new mysqli("localhost", "ale", "ola", "escom");

    if ($mysqli->connect_errno) {

      echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;

    } else {

      if ($n >= 1) {

        $fr1 = $fr[0];

        $nombre = $mysqli->query("SELECT * FROM profesor WHERE nombrepro LIKE '$fr1%' or paternopro LIKE '$fr1%' or maternopro LIKE '$fr1%'");

      }

      if ($n >= 2) {

        $fr2 = $fr[1];

        $nombre = $mysqli->query("SELECT * FROM profesor WHERE (((nombrepro LIKE '$fr1%') or (paternopro LIKE '$fr1%') or (maternopro LIKE '$fr1%')) and ((nombrepro LIKE '$fr2%') or (paternopro LIKE '$fr2%') or (maternopro LIKE '$fr2%')))");

      }

      if ($n >= 3) {

        $fr3 = $fr[2];

        $nombre = $mysqli->query("SELECT * FROM profesor WHERE (((nombrepro LIKE '$fr1%') or (paternopro LIKE '$fr1%') or (maternopro LIKE '$fr1%')) and ((nombrepro LIKE '$fr2%') or (paternopro LIKE '$fr2%') or (maternopro LIKE '$fr2%')) and ((nombrepro LIKE '$fr3%') or (paternopro LIKE '$fr3%') or (maternopro LIKE '$fr3%')))");

      }

      if ($n >= 4) {

        $fr4 = $fr[3];

        $nombre = $mysqli->query("SELECT * FROM profesor WHERE (((nombrepro LIKE '$fr1%') or (paternopro LIKE '$fr1%') or (maternopro LIKE '$fr1%')) and ((nombrepro LIKE '$fr2%') or (paternopro LIKE '$fr2%') or (maternopro LIKE '$fr2%')) and ((nombrepro LIKE '$fr3%') or (paternopro LIKE '$fr3%') or (maternopro LIKE '$fr3%')) and ((nombrepro LIKE '$fr4%') or (paternopro LIKE '$fr4%') or (maternopro LIKE '$fr4%')))");

      }



      if ($nombre->num_rows == 0) {

        echo 'No se encontraron resultados';

      } else {

        $respAX = [];

        $respAX["code"] = 1;

        $respAX["log"] = date("Y-m-d H:i:s");

        $infProf = [];

        while ($fila = mysqli_fetch_assoc($nombre)) {

          $infProf[] = $fila;

        }

        $respAX["data"] = $infProf;



        echo json_encode($respAX);



        /*for ($num_fila = $nombre->num_rows - 1; $num_fila >= 0; $num_fila--) {

          $nombre->data_seek($num_fila);

          $fila = $nombre->fetch_assoc();

          echo '<div id="' . $fila['IDProfesor'] .'" name="prof" class="fs-5 d-flex justify-content-between rounded-pill border border-primary">' . '<div>' ." nombre = " . $fila['NombrePro'] . '</div>' . '<div>'. " Apellido P = " . $fila['PaternoPro'] . '</div>' . '<div>'. " Apell. M. = " . $fila['MaternoPro'] . '</div>' . '</div>'. '<br>';

        }*/

      }

    }











  }







  ?>
