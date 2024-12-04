<?php

$conexion = mysqli_connect("localhost", "root", "", "regalatodo");
?>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="Recbidas" role="tabpanel" aria-labelledby="Recibidas" tabindex="0">
    <?php
    $query = "CALL SolicitudesRecibidas(" . $_SESSION['id_cliente'] . ")";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
        echo '
          <div class="row justify-content-center m-5">
            <div class="col">
              <h5>Recibiste una solicitud de ' . $row["nombre"] . ' por el producto de ' . $row["nombre_c"] . '</h5>
            </div>
            <form action="../controllers/aceptarSolicitud.php" method="post" class="col">
              <input type="text" hidden value="' . $row['idSolicitudEntrega'] . '" name="id_soli">
              <button class="btn btn-success">Confirmar</button>
            </form>
          </div>
        ';
      }
    } else {
    ?>
      <div class="alert alert-danger m-5" role="alert">
        No has recibido ninguna solicitud.
      </div>
    <?php
    }
    mysqli_free_result($result);
    mysqli_close($conexion);
    ?>
  </div>

  <div class="tab-pane fade" id="Aceptadas" role="tabpanel" aria-labelledby="Aceptadas" tabindex="0">
    <?php
    $conexion = mysqli_connect("localhost", "root", "", "regalatodo");
    $query = "CALL SolicitudesAceptadas(" . $_SESSION['id_cliente'] . ")";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
        echo '
          <div class="row justify-content-center m-5">
            <div class="col">
              <h5>' . $row["nombre"] . ' acepto la entrega de ' . $row["nombre_c"] . '. Confirma cuando ya te lo haya entregado.</h5>
            </div>
            <form action="../controllers/aceptarEntrega.php" method="post" class="col">
              <input type="text" hidden value="' . $row['idSolicitudEntrega'] . '" name="id_soli">
              <button class="btn btn-success">Confirmar</button>
            </form>
          </div>
        ';
      }
    } else {
    ?>
      <div class="alert alert-danger m-5" role="alert">
        No han aceptado ninguna solicitud.
      </div>
    <?php
    }
    mysqli_free_result($result);
    mysqli_close($conexion);
    ?>

  </div>
  <div class="tab-pane fade" id="Entregas" role="tabpanel" aria-labelledby="Entregas" tabindex="0">
    <?php
    $conexion = mysqli_connect("localhost", "root", "", "regalatodo");
    $query = "CALL SolicitudesEntregadas(" . $_SESSION['id_cliente'] . ")";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
        echo '
          <div class="row justify-content-center m-5">
            <div class="col">
              <h5>Se entrego el producto ' . $row["nombre_c"] . ' a ' . $row["nombre"] . '</h5>
            </div>
          </div>
        ';
      }
    } else {
    ?>
      <div class="alert alert-danger m-5" role="alert">
        No has entregado ninguna solicitud.
      </div>
    <?php
    }
    mysqli_free_result($result);
    mysqli_close($conexion);
    ?>
  </div>
</div>