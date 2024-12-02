<?php
session_start();
require_once('./conexion/conexion.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usu = $_REQUEST['user'];
$pas = $_REQUEST['password'];


$result = mysqli_query($conexion, "SELECT password,nombre,tipo,idCliente FROM Cliente
WHERE username='$usu'");


if ($row = mysqli_fetch_array($result)) {
    if ($row["password"] == $pas) {
        $_SESSION["username"] = $row['username'];
        $_SESSION["id_cliente"] = $row['idCliente'];
        echo 'Has sido logueado correctamente ' . $_SESSION['username'] . ' <p>';
        if ($row["tipo"] == 0)
            header("Location: ../Cliente/indexCliente.php");
        else header("Location: ../Admin/indexAdmin.php");
    } else {
        echo "<div class='alert alert-danger' role='alert'>Contraseña Incorrecta!</div>";

    }
} else {
    echo "<div class='alert alert-warning' role='alert'>El usuario no existe!</div>";

}
}