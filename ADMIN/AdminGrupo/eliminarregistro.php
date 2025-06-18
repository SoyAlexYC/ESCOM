<?php
include 'configBD.php';

date_default_timezone_set("America/Mexico_City");

$IDGrupo = $_POST["IDGrupo"];

$sql = "UPDATE grupo SET Estatus = 0 WHERE IDGrupo = '$IDGrupo'";

$respAX = [];

$result = mysqli_query($conexion, $sql);

if(mysqli_affected_rows($conexion) == 1){
      $respAX["code"] = 1;
      $respAX["msj"] = "Grupo eliminado exitosamente";
      $respAX["icono"] = "success";
      $respAX["data"] = "";
      $respAX["log"] = date("Y-m-d H:i:s");
    }
else{
      $respAX["code"] = 0;
      $respAX["msj"] = "Error de BD. Favor de intentarlo nuevamente";
      $respAX["icono"] = "error";
      $respAX["data"] = "";
      $respAX["log"] = date("Y-m-d H:i:s");
    }

echo json_encode($respAX);
?>