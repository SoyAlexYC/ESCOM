<?php
date_default_timezone_set("America/Mexico_City");
$search = $_REQUEST["search"];
$fr = explode(" ", $search);
$n = count($fr);
if ($n >= 5) {
  $respAX["code"] = 0;
  $respAX["log"] = date("Y-m-d H:i:s");
  $infGru = [];
  $infGru[] = "No se encontraron resultados";
  $respAX["data"] = $infGru;
  echo json_encode($respAX);
} else {
  include 'configBD.php';
  if (!$conexion) {
    $respAX["code"] = 0;
    $respAX["log"] = date("Y-m-d H:i:s");
    $infGru = [];
    $infGru[] = "No hay conexion";
    $respAX["data"] = $infGru;
    echo json_encode($respAX);
    exit;
  }
  if ($n >= 1) {
    $fr1 = $fr[0];
    $sql = "SELECT * FROM profesor WHERE nombrepro LIKE '$fr1%' or paternopro LIKE '$fr1%' or maternopro LIKE '$fr1%'";
    $nombre = mysqli_query($conexion, $sql);
  }
  if ($n >= 2) {
    $fr2 = $fr[1];
    $sql = "SELECT * FROM profesor WHERE (((nombrepro LIKE '$fr1%') or (paternopro LIKE '$fr1%') or (maternopro LIKE '$fr1%')) and ((nombrepro LIKE '$fr2%') or (paternopro LIKE '$fr2%') or (maternopro LIKE '$fr2%')))";
    $nombre = mysqli_query($conexion, $sql);
  }
  if ($n >= 3) {
    $fr3 = $fr[2];
    $sql = "SELECT * FROM profesor WHERE (((nombrepro LIKE '$fr1%') or (paternopro LIKE '$fr1%') or (maternopro LIKE '$fr1%')) and ((nombrepro LIKE '$fr2%') or (paternopro LIKE '$fr2%') or (maternopro LIKE '$fr2%')) and ((nombrepro LIKE '$fr3%') or (paternopro LIKE '$fr3%') or (maternopro LIKE '$fr3%')))";
    $nombre = mysqli_query($conexion, $sql);
  }
  if ($n >= 4) {
    $fr4 = $fr[3];
    $sql = "SELECT * FROM profesor WHERE (((nombrepro LIKE '$fr1%') or (paternopro LIKE '$fr1%') or (maternopro LIKE '$fr1%')) and ((nombrepro LIKE '$fr2%') or (paternopro LIKE '$fr2%') or (maternopro LIKE '$fr2%')) and ((nombrepro LIKE '$fr3%') or (paternopro LIKE '$fr3%') or (maternopro LIKE '$fr3%')) and ((nombrepro LIKE '$fr4%') or (paternopro LIKE '$fr4%') or (maternopro LIKE '$fr4%')))";
    $nombre = mysqli_query($conexion, $sql);
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
  }
}
?>