<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$user = $_REQUEST['user'];
$pass = $_REQUEST['password'];
$nombre = $_REQUEST['nombre'];

$conexion=mysqli_connect("localhost","root","","regalatodo");

$query = "INSERT INTO cliente (nombre, username, password,tipo) VALUES ('$nombre', '$user', '$pass', 0)";

$result = mysqli_query($conexion, $query);

if ($result) {
//mensaje con bootstrap
echo "<div class='alert alert-success' role='alert'>Registro exitoso!</div>";

} else {
    echo "<div class='alert alert-warning' role='alert'>Registro Fallido</div>";
}
}