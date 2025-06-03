



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <script src="validationform.js"> </script>
    <title>Resultados</title>
</head>
<body style="background-color: #e0e0d1;">
<div class="container-fluid">
        <div class="row" style="background-color:#10312B;">
            <!--Banner de arriba verde con logo del gobierno-->
            <div class="col-6 col-lg-4 mt-1 mb-1 d-flex justify-content-center align-items-center p-0"><a href="https://www.gob.mx/"><img class="img-fluid float-end" src="gobmxlogo.png" alt="LOGO_GOBIERNO"></a></div>
            <div class="col-6 col-lg-2 d-flex justify-content-center align-items-center p-0"><a href="https://mivacuna.salud.gob.mx/" style="font-size: 12px; color: white; text-decoration: none;">REGISTRO PARA VACUNACIÓN</a></div>
            <div class="col-5 col-lg-2 d-flex justify-content-center align-items-center p-0"><a href="https://coronavirus.gob.mx/" style="font-size: 12px; color: white; text-decoration: none;">INFORMACIÓN SOBRE COVID-19</a></div>
            <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center p-0"><a href="https://www.gob.mx/tramites" style="font-size: 12px; color: white; text-decoration: none;">TRÁMITES</a></div>
            <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center p-0"><a href="https://www.gob.mx/gobierno" style="font-size: 12px; color: white; text-decoration: none;">GOBIERNO</a></div>
            <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center p-0"><a href="https://www.gob.mx/segob/en" style="font-size: 12px; color: white; text-decoration: none;">ENGLISH</a></div>
            <div class="col-1 col-lg-1 d-flex justify-content-start align-items-center p-0"><a href="https://www.gob.mx/busqueda" style="font-size: 12px; color: white; text-decoration: none;"><i class="fa-solid fa-magnifying-glass"></i></a></div>

        </div>
    </div>
  
    
<div id="jaja" class="col-12 ">Data no encontrada
      </div>
    <div class="container-fluid  ">
        <div class="row " style="background-color: #109DFA;">
            <p class="h2 text-center" >Resultados de busqueda para: </p>

    
        </div>
    </div>
         <div class="container p-3 my-3">
             <footer class="blockquote-footer">Mostrando los resultados de </footer>
         </div>
                <div class="container p-2 my-2 ">
                  <p class="h1 text-center">Clases</p>
                  <?php
    //manera 1 de conectar 
    $mysqli = new mysqli("localhost", "admin","123456", "escom");
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
                echo '<div id="' . $fila['IDProfesor'] . '" name="prof" class="fs-5 d-flex justify-content-between rounded-pill border border-primary">' . '<div>'  . $fila['NombrePro'] . '</div>' . '<div>' . " Apellido P = " . $fila['PaternoPro'] . '</div>' . '<div>' . " Apell. M. = " . $fila['MaternoPro'] . '</div>' . '</div>' . '<br>';
            }
        }
    }
    ?>

            </div>
            <div class="container p-2 my-2 ">
                  <p class="h1 text-center">Horas libres</p>

            </div>

<?php 

?>


</body>
</html>









