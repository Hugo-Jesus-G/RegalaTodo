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
  if (!isset($_SESSION['username']) or $_SESSION['tipo'] != 1) {
    header('Location: ../index.php');
    exit();
  }
  ?>

  <!-- contenido -->
  <main class="container">
    <div class="principal">
      <nav class="navbar navbar-expand-lg sticky-top border border-danger rounded-pill shadow-sm" style="background-color: #ffffff;">
        <div class="container-fluid">
          <a class="navbar-brand" href="../Admin/indexAdmin.php">
            <img src="../img/LogoRegalaTodo.png" alt="Logo" width="65" height="65" class="d-inline-block align-text-center">
            Regala Todo
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active " href="../Admin/indexAdmin.php">Productos</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active fw-bold text-danger" href="../Admin/reportes.php">Reportes</a>
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
      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <?php
            include '../controllers/obtenerInfoReporte.php' ?>
            <h1 class="mb-4">Detalles del Reporte</h1>
            <div class="mb-4">
              <p><strong>Fecha de Entrega del Producto:</strong> <?php echo htmlspecialchars($dataReporte['fecha_entrega']); ?></p>
              <p><strong>Punto de Entrega:</strong> <?php echo htmlspecialchars($dataSolicitud['entrega']); ?></p>
            </div>
            <div class="mb-4">
              <h3>Información del Producto</h3>
              <p><strong>Quien regala:</strong> <?php echo htmlspecialchars($dataCliente['nombre']); ?></p>
              <p><strong>Nombre del Producto:</strong> <?php echo htmlspecialchars($dataArticulo['nombre']); ?></p>
              <p><strong>Descripción:</strong> <?php echo htmlspecialchars($dataArticulo['descripcion']); ?></p>
              <p><strong>Publicación:</strong> <?php echo htmlspecialchars($dataArticulo['publicacion']); ?></p>
              <p><strong>Imagenes:</strong></p>
              <!-- Mostrar imágenes -->
              <?php
              if ($dataImagenes) {
                echo "<img src='../imagenes/" . htmlspecialchars($dataImagenes['ruta']) . "' width='100' height='100'>";
              }
              ?>
              <h4>Información del Solicitante</h4>
              <p><strong>Nombre del Solicitante:</strong> <?php echo htmlspecialchars($dataSolicitante['nombre']); ?></p>
              <p><strong>Usuario:</strong> <?php echo htmlspecialchars($dataSolicitante['username']); ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>