<?php

session_start();
if (!isset($_SESSION['username']) or $_SESSION['tipo'] != 0) {
  header('Location: ../index.php');
  exit();
}

$id_solicitud = $_POST["id_soli"];

$conexion = mysqli_connect("localhost", "root", "", "regalatodo");
$query = "CALL AceptarEntrega($id_solicitud)";
$result = mysqli_query($conexion, $query);

mysqli_close($conexion);
$conexion = mysqli_connect("localhost", "root", "", "regalatodo");
$query = "CALL CrearReporte($id_solicitud)";
$result = mysqli_query($conexion, $query);

if ($result) {

  header('Location: ../Cliente/solicitudes.php');
  mysqli_close($conexion);
} else {
  header('Location: ../Cliente/solicitudes.php?error=true');
  mysqli_close($conexion);
}
