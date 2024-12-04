<?php
$query = "SELECT * FROM Articulo";
$conexion = mysqli_connect("localhost", "root", "", "regalatodo");

$result = mysqli_query($conexion, $query);

if ($result) {
  while ($row = mysqli_fetch_array($result)) {

    $idArticulo = $row['idArticulo'];
    $queryImagenes = "SELECT * FROM ImagenesArticulo WHERE id_Articulo = $idArticulo";
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

    //botones
    echo '<div class="px-3 py-3">
                <h5 class="mb-3">' . $row['nombre'] . '</h5>
                <p class="mb-3">' . $row['descripcion'] . '</p>
                <p><strong>Publicación:</strong> ' . $row['publicacion'] . '</p>
                <p><strong>Localidad:</strong> ' . $row['localidad'] . '</p>


                <a href="../controllers/eliminar.php?id=' . $row['idArticulo'] . '&tipo=admin" class="btn btn-danger">Eliminar</a>
              </div>';

    // Cerramos el div del artículo
    echo '</div>';
  }
} else {
  echo "Error al obtener los artículos: " . mysqli_error($conexion);
}
