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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



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

        let hola = $("#busqueda").serialize();

        console.log(hola);

        $.ajax({

          url: "search2.php",

          method: "post",

          data: $("#busqueda").serialize(),

          cache: false,

          success: (respAX) => {

            console.log(respAX);

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

              para.setAttribute("name","jaja2");

              para.setAttribute("class","fs-5 d-flex justify-content-between rounded-pill border border-primary");

              let node = document.createTextNode(objAX.data[i].NombrePro + " " + objAX.data[i].PaternoPro + " " + objAX.data[i].MaternoPro);

              para.appendChild(node);

              element.appendChild(para);

            }

          }

        });

      }

    }

  </script>

</body>



</html>
