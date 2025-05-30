<?php 
$conexion = mysqli_connect("localhost", "admin","123456", "escom");
$uname = $_POST["uname"];
$pwd = $_POST["pswd"];
$sql1 = "SELECT * from alumno where boleta = $uname";
$sql2 = "SELECT * from alumno where contraseña = '$pwd'";
$resultado1 = mysqli_query($conexion, $sql1);
$resultado2 = mysqli_query($conexion, $sql2);
if($uname == $sql2 && $pwd == $sql2 ){
    echo("Estas dentro JI JI JI JA");
    //header("Location: /ESCOM/HTML/SEARCH.html");
}
else
{
    echo("Botate a la verga");
    //header("Location: /ESCOM/HTML/paginaError.html");
    //exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Animación de Patada</title>
<style>
  body {
    margin: 0;
    background: linear-gradient(to top, #87ceeb 0%, #fff 100%);
    overflow-x: hidden;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: flex-end;
  }

  .ground {
    width: 100%;
    height: 100px;
    background: #654321;
    position: absolute;
    bottom: 0;
  }

  .character {
    position: relative;
    width: 80px;
    height: 140px;
    background: #5c3a21; /* tono moreno */
    border-radius: 40% 40% 45% 45% / 60% 60% 40% 40%;
    animation-fill-mode: forwards;
  }

  /* Cabeza */
  .head {
    position: absolute;
    top: -50px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 60px;
    background: #4a2f1a;
    border-radius: 50%;
  }

  /* Patada */
  .kick {
    animation: flyAway 3s cubic-bezier(0.5, 0, 0.5, 1) forwards;
  }

  @keyframes flyAway {
    0% {
      transform: translate(0, 0) rotate(0deg);
      opacity: 1;
    }
    30% {
      transform: translate(100px, -100px) rotate(20deg);
      opacity: 1;
    }
    60% {
      transform: translate(400px, -400px) rotate(720deg);
      opacity: 1;
    }
    100% {
      transform: translate(800px, -800px) rotate(1080deg);
      opacity: 0;
    }
  }

  button {
    position: fixed;
    top: 20px;
    left: 20px;
    padding: 10px 20px;
    font-weight: bold;
    border: none;
    background-color: #f44336;
    color: white;
    border-radius: 8px;
    cursor: pointer;
    user-select: none;
    box-shadow: 0 4px 8px rgba(244, 67, 54, 0.6);
  }

  button:hover {
    background-color: #d32f2f;
  }
</style>
</head>
<body>

<div class="ground"></div>

<div id="character" class="character">
  <div class="head"></div>
</div>

<button id="kickBtn">¡Patear!</button>

<script>
  const character = document.getElementById('character');
  const button = document.getElementById('kickBtn');

  button.addEventListener('click', () => {
    character.classList.add('kick');

    // Quitar la clase para permitir repetir la animación
    setTimeout(() => {
      character.classList.remove('kick');
      character.style.transform = 'translate(0,0) rotate(0deg)';
      character.style.opacity = '1';
    }, 3000);
  });
</script>

</body>
</html>
