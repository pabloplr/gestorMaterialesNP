<?php
include '../../datosBBDD.php';

error_reporting(0);
$num_serie = $_GET['varId'];
$actualizar = "UPDATE materiales SET estado = 'prestamo' WHERE num_serie = '$num_serie'";
$conexion = mysqli_connect($servername, $username, $password, $database);

if (mysqli_query($conexion, $actualizar)) {
    $actualizar = "SELECT nombre_materiales FROM materiales WHERE num_serie = '$num_serie'";
    $consulta = mysqli_query($conexion, $actualizar);
    $columna = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
    header('Location: ./entrega.php?varId=' . $columna['nombre_materiales']);
} else {
    echo "<div class='alert alert-danger' role='alert' style='width: 70%;margin: auto;margin-top: 2rem;text-align: center;'>El material no se actualizó por un error inesperado.</div>";
}
