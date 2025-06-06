<?php
    session_start();
    //$n_ses = $_REQUEST["sesion"];
    //unset($n_ses);
    session_destroy();
    header("Location: /ESCOM/HTML/LOGIN.php");
?>