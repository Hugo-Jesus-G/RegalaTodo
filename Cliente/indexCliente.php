<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
  <title>Regala Todo</title>
</head>

<body>
<?php


session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}

?>

  <nav class="navbar navbar-expand-lg sticky-top border border-danger rounded-pill shadow-sm" style="background-color: #ffffff;">
    <div class="container-fluid">
      <a class="navbar-brand" href="../Cliente/indexCliente.php">
        <img src="../img/LogoRegalaTodo.png" alt="Logo" width="65" height="65" class="d-inline-block align-text-center">
        Regala Todo
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active fw-bold text-primary" href="../Cliente/indexCliente.php">Productos</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="../Cliente/publicar.php">Publicar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="../Cliente/solicitudes.php">Solicitudes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="../controllers/cerrarsesion.php">Cerrar Sesión</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active">
              <?php 
              if (isset($_SESSION["username"]) && !empty($_SESSION["username"])) {
                  echo $_SESSION["username"];
              } else {
                  echo "Usuario no registrado";
              }
              ?>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- contenido -->
  <main class="container mt-5">
    <div class="principal">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <?php
                    require_once '../Consultas/obtenerPublicaciones.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
