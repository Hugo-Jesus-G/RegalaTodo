<?php
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  die("ID no válido o no proporcionado.");
}

$idArticulo = intval($_GET['id']);
$tipo = $_GET['tipo'];
$conexion = mysqli_connect("localhost", "root", "", "regalatodo");

if (!$conexion) {
  die("Error de conexión: " . mysqli_connect_error());
}

// ELIMINAR ARCHIVOS DEL SERVIOR
$query = "SELECT ruta FROM imagenesarticulo WHERE id_Articulo = {$idArticulo}";
$r = mysqli_query($conexion, $query);
while ($res = mysqli_fetch_array($r)) {
  $ruta = $res['ruta'];
  if (file_exists($ruta)) {
    if (unlink($ruta)) {
      echo "Se elimino archivo.";
    }
  }
}

$query = "DELETE FROM articulo WHERE idArticulo = {$idArticulo}";
$result = mysqli_query($conexion, $query);
mysqli_close($conexion);

if ($tipo == "admin") {
  header('Location: ../Admin/indexAdmin.php');
} else {
  header('Location: ../Cliente/misPublicaciones.php');
}