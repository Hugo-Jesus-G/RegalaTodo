<?php
session_start();
if (!isset($_SESSION['username']) or $_SESSION['tipo'] != 0) {
  header('Location: ../index.php');
  exit();
}

$entrega = $_POST['entrega'];
$id_solicitante = $_SESSION['id_cliente'];
$id_articulo = $_POST['id_articulo'];

echo $id_articulo;
echo $entrega;
echo $id_solicitante;

$conexion = mysqli_connect("localhost", "root", "", "regalatodo");
$query = "CALL CrearSolicitud('$entrega', $id_articulo, $id_solicitante)";
$result = mysqli_query($conexion, $query);

if($result){
  header('Location: ../Cliente/solicitudes.php?error=false');
}
else{
  header('Location: ../Cliente/solicitudes.php?error=true');
}

mysqli_close($conexion);




