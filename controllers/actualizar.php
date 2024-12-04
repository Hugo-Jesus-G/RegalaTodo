<?php


if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID no válido o no proporcionado.");
}

$idArticulo = $_GET['id'];
$conexion = mysqli_connect("localhost", "root", "", "regalatodo");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $localidad = $_POST['localidad'];
    $descripcion = $_POST['descripcion'];

    // Actualizar el artículo en la base de datos
    $queryUpdateArticulo = "UPDATE articulo SET nombre = '$nombre', localidad = '$localidad', descripcion = '$descripcion',publicacion=NOW() WHERE idArticulo = $idArticulo";
    if (!mysqli_query($conexion, $queryUpdateArticulo)) {
        echo "<div class='alert alert-danger' role='alert'>Error al actualizar el artículo.</div>";
    }

    // Eliminar las imágenes seleccionadas
    if (isset($_POST['eliminar_imagenes'])) {
        $imagenesAEliminar = $_POST['eliminar_imagenes'];
        foreach ($imagenesAEliminar as $idImagen) {
            $queryEliminarImagen = "DELETE FROM imagenesarticulo WHERE idImagenesArticulo = $idImagen";
            if (!mysqli_query($conexion, $queryEliminarImagen)) {
                echo "<div class='alert alert-danger' role='alert'>Error al eliminar la imagen.</div>";
            }
        }
    }

    // Subir nuevas imágenes
    if (isset($_FILES['imagenes']) && !empty($_FILES['imagenes']['name'][0])) {
        $destino = "../imagenes/";
        $total_images = count($_FILES['imagenes']['name']);
        for ($i = 0; $i < $total_images; $i++) {
            $nombre_imagen = $_FILES['imagenes']['name'][$i];
            $tmp_nombre = $_FILES['imagenes']['tmp_name'][$i];
            $image_path = $destino . $nombre_imagen; 

            if (copy($tmp_nombre, $image_path)) {
                $queryimagen = "INSERT INTO imagenesarticulo (id_Articulo, ruta) VALUES ('$idArticulo', '$image_path')";
                if (!mysqli_query($conexion, $queryimagen)) {
                    echo "<div class='alert alert-danger' role='alert'>Error al registrar la imagen.</div>";
                }
            }
        }
    }

    header("Location: ../Cliente/misPublicaciones.php");
    exit();
}
