<?php
  session_start();
  if($_SESSION){
    echo $_SESSION["usuario"];
  }else{
    header("Location: /ESCOM/HTML/LOGIN.php");
  }
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>MAIN MENU</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <script src="validationform.js"> </script>
</head>

<body>
  <div class="text-light bg-dark " style="height: 100vh; width: 100vw">
    <form id="busqueda" method="GET" class="needs-validation">
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Ingresa tu profesor...</label>
        <input type="text" name="search" class="form-control" id="validationCustom01" onkeyup="busq(this.value)"
          required>
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>
      <div id="jaja" class="col-12 ">Ingresa tu profesor
      </div>
      <div><a href='cerrarses.php'>cierra sesion</a></div>
    </form>
  </div>
  <script>
    var prev_def = function (event) {
      event.preventDefault();
    };
    var form = document.getElementById("busqueda");
    form.addEventListener("submit", prev_def, true);


    function busq(str) {
      if (str.length == 0) {
        document.getElementById("jaja").innerHTML = "Ingresa tu profesor";
        return;
      } else {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function () {
          document.getElementById("jaja").innerHTML = this.responseText; const myCollection = document.getElementsByName("prof");
          const b = myCollection.length;
          for (let i = 0; i < b; i++) {
            myCollection[i].addEventListener("click", function () { window.location.href = "/web4/profesor/profesor.php?id=" + myCollection[i].id; });
          }
        }
        xmlhttp.open("GET", "search_priv.php?search=" + str);
        xmlhttp.send();
      }
    }
  </script>
</body>

</html>