<?php
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID no válido o no proporcionado.");
}

$idArticulo = intval($_GET['id']);
$conexion = mysqli_connect("localhost", "root", "", "regalatodo");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Consultar el artículo
$query = "SELECT * FROM Articulo WHERE idArticulo = $idArticulo";
$result = mysqli_query($conexion, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $nombre = $row['nombre'];
    $localidad = $row['localidad'];
    $descripcion = $row['descripcion'];
} else {
    die("Artículo no encontrado.");
}

$queryImagenes = "SELECT * FROM ImagenesArticulo WHERE id_Articulo = $idArticulo";
$resultImagenes = mysqli_query($conexion, $queryImagenes);

$imagenes = array();
while ($row = mysqli_fetch_assoc($resultImagenes)) {
    $imagenes[] = $row; 
}
?>
