<?php
$conexion = mysqli_connect("localhost", "root", "", "regalatodo");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if (!isset($_GET['idReporte']) || !is_numeric($_GET['idReporte'])) {
    die("ID de reporte no válido.");
}

$idReporte = $_GET['idReporte'];

$query = "
    SELECT 
        r.*, 
        s.*, 
        a.*, 
        c.*, 
        c2.*, 
        i.*
    FROM Reporte r
    JOIN SolicitudEntrega s ON s.idSolicitudEntrega = r.id_Solicitud
    JOIN Articulo a ON a.idArticulo = s.id_Artculo
    JOIN Cliente c ON c.idCliente = a.id_Cliente
    JOIN Cliente c2 ON c2.idCliente = s.id_Solicitante
    LEFT JOIN ImagenesArticulo i ON i.id_Articulo = a.idArticulo
    WHERE r.idReporte = $idReporte
";

$resultado=mysqli_query($conexion, $query);

if ($resultado) {
    $data = mysqli_fetch_assoc($resultado);
    $dataReporte = $data;
    $dataSolicitud = $data;
    $dataArticulo = $data;
    $dataCliente = $data;
    $dataSolicitante = $data;
    $dataImagenes = $data; 
} else {
    die("Error al ejecutar la consulta: " . mysqli_error($conexion));
}

mysqli_close($conexion);
?>
