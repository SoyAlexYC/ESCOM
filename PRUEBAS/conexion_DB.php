<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "prodb";

$conn = new mysqli($host, $usuario, $contrasena, $base_datos);
if ($conn->connect_error) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>