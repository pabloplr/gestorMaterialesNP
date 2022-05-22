<?php
include '../../datosBBDD.php';

error_reporting(0);

$dni = $_GET['dni'];

$num_serie = $_GET['varId'];
// Primero tengo que comprobar que no tenga 3 peticiones ya.
$conexion = mysqli_connect($servername, $username, $password, $database);
$consultaObj = "DELETE FROM peticiones WHERE dni = '$dni' AND num_serie = '$num_serie';";
$consulta = mysqli_query($conexion, $consultaObj);

    echo "material prestado";
    header('Location: ./peticiones.php?estado=rechazado');




?>