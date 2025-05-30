<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIHOPO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/ESCOM/CSS/stylogin.css">
</head>
<style>
    .login-card {
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      padding: 2.5rem;
      border-radius: 1rem;
      box-shadow: 0 0 40px rgba(0, 0, 0, 0.5);
      color: #fff;
      width: 100%;
      max-width: 420px;
      animation: slideIn 1.5s ease-out;
    }

    @keyframes slideIn {
      from {
        opacity: 0;
        transform: translateY(-30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
<body>

    <div class="container-fluid">
        <div class="row" style="background-color: #10312B;">
            <!--Banner de arriba verde con logo del gobierno-->
            <div class="col-6 col-lg-4 mt-1 mb-1 d-flex justify-content-center align-items-center p-0"><a href="https://www.gob.mx/"><img class="img-fluid float-end" src="/ESCOM/IMG/gobmxlogo.png" alt="LOGO_GOBIERNO"></a></div>
            <div class="col-6 col-lg-2 d-flex justify-content-center align-items-center p-0"><a href="https://mivacuna.salud.gob.mx/" style="font-size: 12px; color: white; text-decoration: none;">REGISTRO PARA VACUNACIÓN</a></div>
            <div class="col-5 col-lg-2 d-flex justify-content-center align-items-center p-0"><a href="https://coronavirus.gob.mx/" style="font-size: 12px; color: white; text-decoration: none;">INFORMACIÓN SOBRE COVID-19</a></div>
            <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center p-0"><a href="https://www.gob.mx/tramites" style="font-size: 12px; color: white; text-decoration: none;">TRÁMITES</a></div>
            <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center p-0"><a href="https://www.gob.mx/gobierno" style="font-size: 12px; color: white; text-decoration: none;">GOBIERNO</a></div>
            <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center p-0"><a href="https://www.gob.mx/segob/en" style="font-size: 12px; color: white; text-decoration: none;">ENGLISH</a></div>
            <div class="col-1 col-lg-1 d-flex justify-content-start align-items-center p-0"><a href="https://www.gob.mx/busqueda" style="font-size: 12px; color: white; text-decoration: none;"><i class="fa-solid fa-magnifying-glass"></i></a></div>

        </div>
    </div>

    <div class="container mt-3">

        <div class="row">

            <div class="col-4 d-flex justify-content-start align-items-center">
                <!--Imagen de ESCOM-->
                <img class="img-fluid float-start" src="/ESCOM/IMG/logoESCOM2x.png" alt="ESCOM" height="250" width="150">
            </div>
            <div class="col-4 d-flex justify-content-center align-items-center">
                <!--SIHOPO LETRAS-->
                <img class="img-fluid" src="/ESCOM/IMG/SIHOPO-removebg-preview.png" alt="BANNER" height="600" width="600">
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <!--Imagen del IPN-->
                <img class="img-fluid" src="/ESCOM/IMG/Logo_IPN.png" alt="IPN" height="250" width="150">
            </div>
    
        </div>

    </div>

    <div class="container">

        <div class="row mx-auto login-card" style="width: 50%;">
            <form action="direccion.php" method="post" class="was-validated">
                <div class="mb-3 mt-3">
                  <label for="uname" class="form-label" style="color: white;">Boleta:</label>
                  <input type="text" class="form-control" id="uname" placeholder="2025000001" name="uname" required>
                  <!--<div class="valid-feedback">Valid.</div>-->
                  <div class="invalid-feedback">Ingrese una boleta valida.</div>
                </div>
                <div class="mb-3">
                  <label for="pwd" class="form-label" style="color: white;">Contraseña:</label>
                  <input type="password" class="form-control" id="pwd" placeholder="12345" name="pswd" required>
                  <!--<div class="valid-feedback">Valid.</div>-->
                  <div class="invalid-feedback">Ingrese su Contraseña.</div>
                </div>
                <button type="submit" class="mt-4 btn btn-success">Iniciar Sesion</button>
              </form>
              <a href="/ESCOM/HTML/HOME.html" class="mt-4  btn btn-primary "><-Atras </a>
        </div>

    </div>


</body>
</html>