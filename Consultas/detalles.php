<?php

$idArticulo = $_GET['id'];
$conexion = mysqli_connect("localhost", "root", "", "regalatodo");
$query = "SELECT * FROM articulo WHERE idArticulo = " . $idArticulo;
$result = mysqli_query($conexion, $query);

if ($result) {
  while ($row = mysqli_fetch_array($result)) {
    $queryImagenes = "SELECT * FROM imagenesarticulo WHERE id_Articulo = $idArticulo";
    $resultImagenes = mysqli_query($conexion, $queryImagenes);
    echo '<div class="mb-4 w-100">';
    echo '<div id="carouselArticulo' . $row['idArticulo'] . '" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">';
    $isActive = true;

    while ($rowImagenes = mysqli_fetch_array($resultImagenes)) {
      echo '<div class="carousel-item' . ($isActive ? ' active' : '') . '">
                    <img src="../imagenes/' . $rowImagenes['ruta'] . '" class="d-block mx-auto w-50" style="max-height: 300px; object-fit: cover;" alt="Imagen del artículo">
                  </div>';
      $isActive = false;
    }

    // Cerramos el carrusel
    echo '</div>';

    // Controles del carrusel
    echo '<button class="carousel-control-prev" type="button" data-bs-target="#carouselArticulo' . $row['idArticulo'] . '" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselArticulo' . $row['idArticulo'] . '" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>';  // Fin del carrusel
    //BOTONES
    echo '
      <div class="px-3 py-3">
        <h5 class="mb-3">' . $row['nombre'] . '</h5>
        <p class="mb-3">' . $row['descripcion'] . '</p>
        <p><strong>Publicación:</strong> ' . $row['publicacion'] . '</p>
        <p><strong>Localidad:</strong> ' . $row['localidad'] . '</p>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Solicitud">Solicitar</button>
      </div>
      <div class="modal fade" id="Solicitud" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true" data-bs-keyboard="false" >
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalLabel">Haz tu solicitud</h5>
            </div>
            <form action="../controllers/ProcesarSolicitud.php" method="post">
              <div class="modal-body row justify-content-center">
                <div class="col-auto col-lg-9">
                  <div class="form-group input-group mb-3 mt-3">
                    <span class="input-group-text">
                      <i class="bi bi-basket2-fill"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Ingrese direccion de entrega." name="entrega">
                    <input type="text" hidden value="'.$idArticulo.'" name="id_articulo">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Solicitar</button>
                <button class="btn btn-danger" data-bs-dismiss="modal" id="cerrar_modal" type="button">Cerrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    ';

    // Cerramos el div del artículo
    echo '</div>';
  }
} else {
  echo "Error al obtener los artículos: " . mysqli_error($conexion);
}
