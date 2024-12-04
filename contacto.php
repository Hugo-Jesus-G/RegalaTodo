<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <title>Regala Todo - Contacto</title>
</head>

<body>
  <main class="container">
    <div class="principal">
      <!-- Incluimos el menú -->
      <?php include_once('./templates/menu.php'); ?>
      <!-- Información de contacto -->
      <div class="container mt-5">
        <h2 class="text-center">¡Contáctanos!</h2>
        <p class="mb-5 text-center">Aquí te dejamos la información de contacto de los creadores de la aplicación.</p>
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card mb-2">
              <div class="card-header ">
                <h4>Elaborado por:</h4>
              </div>
              <div class="card-body">
                <p><strong>Hugo Jesus Guevara Cocolotl </strong></p>
                <p><strong>Jesús Eduardo Hernández Bravo</strong></p>
              </div>
            </div>

            <div class="card mb-1">
              <div class="card-header">
                <h4>Información de Contacto</h4>
              </div>
              <div class="card-body">
                <p><strong>Correo electrónico de Hugo:</strong> <a href="mailto:hugo.guevara@alumno.buap.mx">hugo.guevara@alumno.buap.mx</a></p>
                <p><strong>Correo electrónico de Jesús:</strong> <a href="mailto:jesus.hernandezb@alumno.buap.mx">jesus.hernandezb@alumno.buap.mx</a></p>
              </div>
            </div>
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