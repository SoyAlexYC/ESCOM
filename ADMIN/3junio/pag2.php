<?php
session_start();
if($_SESSION){
echo "Session variables are set. Your fav color is: " . $_SESSION["favanimal"]. '<a href="../atras/index.php">cierra tu sesion</a>';
}
else{
    echo "no jaja";
}session_destroy();
//unset($_SESSION["favanimal"])

?>