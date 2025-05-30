<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>eliminar un rgistro</h1>
<form action="archivo php esta hasta abajo" method="post">
    
<label for="boelta-ejemplo">numero de boelta</label><br>
<input type="text" id="boleta para css o javascript" name="boleta-php">
<button type="submit"></button>
</form><br>

<script src="ruta de jquery"><script>
<script src="ruta de ajax"><script>



</body>
</html>

<?php 
//conexion 
$conexion = mysqli_connect("localhost", "root"," ", "nombre base");

$sql = "INSERT into tabla values ('dato 1', 'dato2')";
//parametros----->conexion, ejecutar el sql
$resultado = mysqli_query($conexion, $sql);
echo $resultado;   //si el resultado mostrado es 1, todo salio bien 



/*
if($resultado==1){
    echo "todo bien ";
}else{
    echo "error";
}
*/

$filasAfectadas = mysqli_affected_rows(); //filas afectadas para delete 

?>


jquery 
////////////
en un php diferente 
$boleta =$POST("boleta");
$coenxion = lskfamld
$sql= 
////////////////////



xmlhttprequest