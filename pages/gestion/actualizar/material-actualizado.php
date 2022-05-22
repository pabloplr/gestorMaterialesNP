<?php
include '../../../datosBBDD.php';

    error_reporting(0);
    $nserie = $_POST['nserie'];
    echo $nserie;
    $nombre_material = strtolower($_POST['nombre_material']);
    echo $nombre_material;
    $marca = $_POST['marca'];
    echo $marca;
    $modelo = $_POST['modelo'];
    echo $modelo;
    $estado = strtolower($_POST['estado']);
    echo $estado;
    $observaciones = $_POST['observaciones'];
    echo $observaciones;

    $update = "UPDATE materiales SET nombre_materiales = '$nombre_material', marca = '$marca',
     modelo = '$modelo', estado = '$estado', observaciones = '$observaciones' WHERE num_serie = '$nserie'";
    $conexion = mysqli_connect($servername, $username, $password, $database);

    if (mysqli_query($conexion, $update)) {
        echo "<script>alert('El material ha sido actualizado.')</script>";
        header('Location: ./../../consultas/materiales.php?estado=actualizado');
    } else {
        echo "<div class='alert alert-danger' role='alert' style='width: 70%;margin: auto;margin-top: 2rem;text-align: center;'>El material no se actualizó por un error inesperado.</div>";
    }
 ?>
