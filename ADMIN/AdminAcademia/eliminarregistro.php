<?php
include 'configBD.php';

date_default_timezone_set("America/Mexico_City");

$IDAcademia = $_POST["IDAcademia"];

$sql = "UPDATE academia SET Estatus = 0 WHERE IDAcademia = '$IDAcademia'";

$respAX = [];

$result = mysqli_query($conexion, $sql);

if(mysqli_affected_rows($conexion) == 1){
      $respAX["code"] = 1;
      $respAX["msj"] = "Academia eliminada exitosamente";
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