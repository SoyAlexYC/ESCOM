<?php
include 'configBD.php';

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
    TIPO T ON S.IdTipo = T.IDTipo;"

//$result = $conexion->query($sql);

$sql1 = "SELECT 
    C.IDClase,
    C.TipoClase,
    M.NombMateria AS Materia,
    G.NombreGru AS Grupo,
    S.NomSalon AS Salon,
    H.HoraIni,
    H.HoraFin,
    D.NomDia AS Dia,
    P.NombrePro,
    P.PaternoPro,
    P.MaternoPro,
    P.Cubiculo
FROM 
    CLASE C
JOIN CURSO CU ON C.IdCurso = CU.IDCurso
JOIN MATERIA M ON CU.IdMateria = M.IDMateria
JOIN GRUPO G ON CU.IdGrupo = G.IDGrupo
JOIN SALON S ON C.IdSalon = S.IDSalon
JOIN HORA H ON C.IdHora = H.IDHora
JOIN ESPACIO E ON E.IdClase = C.IDClase
JOIN DIA D ON E.IdDia = D.IDDia
JOIN HORARIO HO ON E.IdHorario = HO.IDHorario
JOIN PROFESOR P ON HO.IdProfesor = P.IDProfesor where c.IDClase=1;
"
//$result = $conexion->query($sql1);
$result = mysqli_query($conexion, $sql1);

$respAX[];
$respAX["code"] = 1;
$respAX["log"] = date("Y-m-d H:i:s");
$infclases = [];

while($row = $result->fetch_assoc())
{
    $infclases[] = $row;
}

$respAX["data"] = $infclases;

echo json_encode($respAX);
?>