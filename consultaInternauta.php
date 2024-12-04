<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <title>Regala Todo</title>
</head>

<body>
  <main class="container">
    <div class="principal">
      <!-- Incluimos el menú -->
      <?php include_once('./templates/menu.php'); ?>
      <div class="container mt-5">
        <h2 class="text-center">BIENVENIDO A REGALA TODO</h2>
        <h3 class="mb-5 text-center">Productos</h3>
        <div class="row justify-content-center">
          <div class="col-md-8">
            <?php require_once "./vistaProductos.php"; ?>
          </div>
        </div>
      </div>

      <!-- Incluimos el pie de página -->
      <?php include_once('./templates/footer.php'); ?>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>