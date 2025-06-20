<?php
include("configBD.php");

date_default_timezone_set("America/Mexico_City");

$sql = "SELECT 
    C.IDClase,
    C.Estatus,
    G.NombreGru AS Grupo,
    M.NombMateria AS Materia,
    S.NomSalon AS Salon,
    T.NomTipo AS TipoSalon
FROM 
    CLASE C
JOIN 
    CURSO CU ON C.IdCurso = CU.IDCurso
JOIN 
    MATERIA M ON CU.IdMateria = M.IDMateria
JOIN 
    GRUPO G ON CU.IdGrupo = G.IDGrupo
JOIN 
    SALON S ON C.IdSalon = S.IDSalon
JOIN 
    TIPO T ON S.IdTipo = T.IDTipo;";

$result = mysqli_query($conexion, $sql);

$respAX = [];
$respAX["code"] = 1;
$respAX["log"] = date("Y-m-d H:i:s");
$infclases = [];

while($fila = mysqli_fetch_assoc($result))
{
    $infclases[] = $fila;
}

$respAX["data"] = $infclases;

echo json_encode($respAX);
?>