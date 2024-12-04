<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $localidad = $_POST['localidad'];
    $descripcion = $_POST['descripcion'];

    $idCliente = $_SESSION["id_cliente"];
    $destino = "../imagenes/";
    $todocorrecto = true;
    $conexion=mysqli_connect("localhost","root","","regalatodo");

    $query = "INSERT INTO articulo (idArticulo, nombre, descripcion, localidad, publicacion, id_cliente) 
              VALUES (NULL, '$nombre', '$descripcion', '$localidad', NOW(), '$idCliente')";

    if (mysqli_query($conexion, $query)) {
        $producto_id = mysqli_insert_id($conexion); 

        $total_images = count($_FILES['imagenes']['name']);

        for ($i = 0; $i < $total_images; $i++) {
            $nombre_imagen = $_FILES['imagenes']['name'][$i];
            $tmp_nombre = $_FILES['imagenes']['tmp_name'][$i];
            $image_path = $destino . $nombre_imagen; 

            if (copy($tmp_nombre, $image_path)) {
                $queryimagen = "INSERT INTO imagenesarticulo (id_Articulo, ruta) VALUES ('$producto_id', '$image_path')";
                if (!mysqli_query($conexion, $queryimagen)) {
                    echo "<div class='alert alert-danger' role='alert'>Error al registrar la imagen.</div>";
                }
            }
        }
    }else{
        echo "<div class='alert alert-danger' role='alert'>Error al registrar el producto.</div>";
    }


    header("Location: ../Cliente/indexCliente.php");
}
