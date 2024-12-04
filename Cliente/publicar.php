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
  if (!isset($_SESSION['username']) or $_SESSION['tipo'] != 0) {
    header('Location: ../index.php');
    exit();
  }
  ?>

  <!-- contenido -->
  <main class="container">
    <div class="principal">
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
                <a class="nav-link active" href="../Cliente/indexCliente.php">Productos</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active fw-bold text-danger" href="../Cliente/publicar.php">Publicar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="../Cliente/solicitudes.php">Solicitudes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="../Cliente/misPublicaciones.php">Mis Publicaciones</a>
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
            <h1 class="mx-5"> !Publica lo que ya no Necesitas¡</h1>
            <?php require_once '../controllers/controladorPublicacion.php'   ?>

            <form method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Producto</label>
                <input type="text" class="form-control border border-primary" id="nombre" name="nombre" required>
              </div>
              <div class="mb-3">
                <label for="localidad" class="form-label">Localidad</label>
                <input type="text" class="form-control border border-primary" id="localidad" name="localidad" required>
              </div>
              <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control border border-primary" id="descripcion" name="descripcion" rows="2" required></textarea>
              </div>
              <!-- Campo para seleccionar imágenes -->
              <div class="mb-3">
                <label for="imagenes" class="form-label">Imágenes del Producto</label>
                <input type="file" class="form-control border border-primary" id="imagenes" name="imagenes[]" multiple required>
                <small class="form-text text-muted">Puedes seleccionar varias imágenes.</small>
              </div>
              <button type="submit" class="btn btn-primary">Registrar Producto</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>