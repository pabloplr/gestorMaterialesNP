<?php
include '../../datosBBDD.php';
error_reporting(0);
session_start();

$dni = $_SESSION['dni'];

$num_serie = $_GET['varId'];

$fecha_devolucion = date('Y/m/d');

$conexion = mysqli_connect($servername, $username, $password, $database);

$actualizarEstado = "UPDATE materiales SET estado = 'stock' WHERE num_serie = '$num_serie'";

if ($consulta = mysqli_query($conexion, $actualizarEstado)) {
    $actualizarFecha = "UPDATE prestamos SET fecha_devolucion = '$fecha_devolucion' WHERE num_serie = '$num_serie' AND dni = '$dni' AND fecha_devolucion = '0000-00-00';";
    mysqli_query($conexion, $actualizarFecha);    
    $actualizar_usuario = "UPDATE usuarios SET num_objetos = num_objetos-1 WHERE dni = '$dni'";
    mysqli_query($conexion, $actualizar_usuario);    
    echo "material actualizado";

} else {
    echo "<div class='alert alert-danger' role='alert' style='width: 70%;margin: auto;margin-top: 2rem;text-align: center;'>El material no se actualizó por un error inesperado.</div>";
}

header('Location: ./devolucion.php?estado=devuelto');



?>