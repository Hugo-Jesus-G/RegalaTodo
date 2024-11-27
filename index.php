<!DOCTYPE html>
<html lang="en">

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
      <?php include_once('./templates/menu.php') ?>
      <h1 class="m-3">BIENVENIDO A REGALA TODO</h1>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 col-auto">
            <?php include_once('./templates/carousel.php')?>
          </div>
        </div>
      </div>

      <?php include_once('./templates/footer.php')?>
    </div>
  </main>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>