<?php

session_start();
if (!isset($_SESSION['username']) or $_SESSION['tipo'] != 0) {
  header('Location: ../index.php');
  exit();
}

$id_solicitud = $_POST["id_soli"];

$conexion = mysqli_connect("localhost", "root", "", "regalatodo");
$query = "CALL AceptarSolicitud($id_solicitud)";
$result = mysqli_query($conexion, $query);
mysqli_close($conexion);

$conexion = mysqli_connect("localhost", "root", "", "regalatodo");
$query = "SELECT * FROM solicitudentrega WHERE idSolicitudEntrega = " . $id_solicitud . "";
$result = mysqli_query($conexion, $query);
$r = mysqli_fetch_array($result);
$query = "UPDATE articulo SET disponibilidad = 1 WHERE idArticulo =" . $r['id_Artculo'] . "";
mysqli_query($conexion, $query);


if ($result) {
  header('Location: ../Cliente/solicitudes.php');
} else {
  header('Location: ../Cliente/solicitudes.php?error=true');
}

mysqli_close($conexion);
