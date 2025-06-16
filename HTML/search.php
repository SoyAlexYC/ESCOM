<?php
session_start();
if ($_SESSION) {
  echo $_SESSION["usuario"];
} else {
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body style="background-color: #e0e0d1;">
  <div class="container-fluid">
    <div class="row" style="background-color:#10312B;">
      <!--Banner de arriba verde con logo del gobierno-->
      <div class="col-6 col-lg-4 mt-1 mb-1 d-flex justify-content-center align-items-center p-0"><a
          href="https://www.gob.mx/"><img class="img-fluid float-end" src="gobmxlogo.png" alt="LOGO_GOBIERNO"></a></div>
      <div class="col-6 col-lg-2 d-flex justify-content-center align-items-center p-0"><a
          href="https://mivacuna.salud.gob.mx/" style="font-size: 12px; color: white; text-decoration: none;">REGISTRO
          PARA VACUNACIÓN</a></div>
      <div class="col-5 col-lg-2 d-flex justify-content-center align-items-center p-0"><a
          href="https://coronavirus.gob.mx/" style="font-size: 12px; color: white; text-decoration: none;">INFORMACIÓN
          SOBRE COVID-19</a></div>
      <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center p-0"><a
          href="https://www.gob.mx/tramites" style="font-size: 12px; color: white; text-decoration: none;">TRÁMITES</a>
      </div>
      <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center p-0"><a
          href="https://www.gob.mx/gobierno" style="font-size: 12px; color: white; text-decoration: none;">GOBIERNO</a>
      </div>
      <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center p-0"><a
          href="https://www.gob.mx/segob/en" style="font-size: 12px; color: white; text-decoration: none;">ENGLISH</a>
      </div>
      <div class="col-1 col-lg-1 d-flex justify-content-start align-items-center p-0"><a
          href="https://www.gob.mx/busqueda" style="font-size: 12px; color: white; text-decoration: none;"><i
            class="fa-solid fa-magnifying-glass"></i></a></div>

    </div>
  </div>
  <div class="container-fluid  ">
    <div class="row " style="background-color: #109DFA;">
      <p class="h2 text-center">Busca a tu profesor </p>
    </div>
  </div>
  <div class="text-black" style="height: 100vh; width: 100vw">
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
    </form>
    <div ><a href='cerrarses.php'><button class="btn btn-primary">
                    Cierra sesion
                  </button></a></div>
  </div>
  <script>
    var prev_def = function (event) {
      event.preventDefault();
    };
    var form = document.getElementById("busqueda");
    form.addEventListener("submit", prev_def, true);

    $.ajax({
          url: "getprof.php",
          method: "post",
          cache: false,
          success: (respAX) => {
            let objAX = JSON.parse(respAX);
            let element = document.getElementById("jaja");
            for (let i = 0; i < objAX.data.length; i++) {
              let para = document.createElement("div");
              para.setAttribute("name", "jaja2");
              para.setAttribute("id", objAX.data[i].IDProfesor);
              para.setAttribute("class", "fs-5 d-flex justify-content-between rounded-pill border border-black");
              let node = document.createTextNode(objAX.data[i].NombrePro + " " + objAX.data[i].PaternoPro + " " + objAX.data[i].MaternoPro);
              para.appendChild(node);
              element.appendChild(para);
              para.addEventListener("click", () => { window.location.href = "VistaResult.html?id=" + objAX.data[i].IDProfesor; }, false);
            }
          }
        });

    function busq(str) {
      if (str.length == 0) {
        //document.getElementById("jaja").innerHTML = "Ingresa tu profesor";
        $.ajax({
          url: "getprof.php",
          method: "post",
          cache: false,
          success: (respAX) => {
            let objAX = JSON.parse(respAX);
            let element = document.getElementById("jaja");
            const previos = document.getElementsByName("jaja2");
            if (previos.length > 0) {
              let lim = previos.length;
              for (let j = 0; j < lim; j++) {
                let todelete = previos[0]
                element.removeChild(todelete);
              }
            }
            for (let i = 0; i < objAX.data.length; i++) {
              let para = document.createElement("div");
              para.setAttribute("name", "jaja2");
              para.setAttribute("id", objAX.data[i].IDProfesor);
              para.setAttribute("class", "fs-5 d-flex justify-content-between rounded-pill border border-black");
              let node = document.createTextNode(objAX.data[i].NombrePro + " " + objAX.data[i].PaternoPro + " " + objAX.data[i].MaternoPro);
              para.appendChild(node);
              element.appendChild(para);
              para.addEventListener("click", () => { window.location.href = "VistaResult.html?id=" + objAX.data[i].IDProfesor; }, false);
            }
          }
        });
      } else {
        let hola = $("#busqueda").serialize();
        $.ajax({
          url: "search_priv.php",
          method: "post",
          data: $("#busqueda").serialize(),
          cache: false,
          success: (respAX) => {
            let objAX = JSON.parse(respAX);
            let element = document.getElementById("jaja");
            const previos = document.getElementsByName("jaja2");
            let lim = previos.length;
            for (let j = 0; j < lim; j++) {
              let todelete = previos[0]
              element.removeChild(todelete);
            }
            for (let i = 0; i < objAX.data.length; i++) {
              let para = document.createElement("div");
              para.setAttribute("name", "jaja2");
              para.setAttribute("id", objAX.data[i].IDProfesor);
              para.setAttribute("class", "fs-5 d-flex justify-content-between rounded-pill border border-black");
              let node = document.createTextNode(objAX.data[i].NombrePro + " " + objAX.data[i].PaternoPro + " " + objAX.data[i].MaternoPro);
              para.appendChild(node);
              element.appendChild(para);
              para.addEventListener("click", () => { window.location.href = "VistaResult.html?id=" + objAX.data[i].IDProfesor; }, false);
            }
          }
        });
      }
    }
  </script>
</body>

</html>