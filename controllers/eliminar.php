<?php
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID no válido o no proporcionado.");
}

$idArticulo = intval($_GET['id']);
$conexion = mysqli_connect("localhost", "root", "", "regalatodo");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$query = "DELETE FROM Articulo WHERE idArticulo = {$idArticulo}";
$result = mysqli_query($conexion, $query);

if ($result) {
    echo "Artículo eliminado correctamente";
    header('Location: ../Cliente/misPublicaciones.php');
    exit();
} else {
    echo "Error al eliminar el artículo: " . mysqli_error($conexion);
}
?>
