<?php

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel de Horarios</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
  <style>
    body {
      background: radial-gradient(circle at center, #0f2027, #203a43, #2c5364);
      font-family: 'Orbitron', sans-serif;
      color: #00e5ff;
      padding: 20px;
    }

    .container {
      animation: fadeIn 1s ease-in;
    }

    .dashboard-title {
      text-shadow: 0 0 10px #00e5ff, 0 0 20px #00bcd4;
    }

    .card {
      background: rgba(255, 255, 255, 0.03);
      border: 1px solid rgba(0, 229, 255, 0.2);
      backdrop-filter: blur(8px);
      border-radius: 15px;
      box-shadow: 0 0 30px rgba(0, 229, 255, 0.2);
    }

    table {
      color: #fff;
    }

    th {
      background-color: #00e5ff;
      color: #000;
      text-align: center;
    }

    td {
      background-color: rgba(255, 255, 255, 0.05);
      text-align: center;
    }

    .btn-danger {
      background-color: #ff1744;
      border: none;
    }

    .btn-danger:hover {
      background-color: #d50000;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-15px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .glow-box {
      border: 1px solid #00e5ff;
      padding: 15px;
      border-radius: 10px;
      background-color: rgba(255, 255, 255, 0.02);
      box-shadow: 0 0 15px #00e5ff44;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="dashboard-title">Bienvenido, <?php echo $_SESSION['boleta']; ?></h1>
      <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
    </div>

    <div class="glow-box mb-4">
      <h4>Tu horario actual</h4>
      <table class="table table-bordered table-hover mt-3">
        <thead>
          <tr>
            <th>Hora</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>07:00 - 08:00</td>
            <td>Física</td>
            <td>Libre</td>
            <td>Matemáticas</td>
            <td>Libre</td>
            <td>Química</td>
          </tr>
          <tr>
            <td>08:00 - 09:00</td>
            <td>Matemáticas</td>
            <td>Computación</td>
            <td>Libre</td>
            <td>Computación</td>
            <td>Libre</td>
          </tr>
          <!-- Puedes generar más filas dinámicamente desde MySQL -->
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
