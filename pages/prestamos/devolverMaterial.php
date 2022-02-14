<?php
include '../../datosBBDD.php';
echo "1";
error_reporting(0);
session_start();
echo "2";

$dni = $_SESSION['dni'];
echo "3";

$num_serie = $_GET['varId'];
echo "4";

$fecha_devolucion = date('Y/m/d');
echo "5";

$conexion = mysqli_connect($servername, $username, $password, $database);
echo "6";

$actualizarEstado = "UPDATE materiales SET estado = 'stock' WHERE num_serie = '$num_serie'";
echo "7";

if ($consulta = mysqli_query($conexion, $actualizarEstado)) {
    echo "8 <br>";
    echo $fecha_devolucion ."<br>";
    $actualizarFecha = "UPDATE prestamos SET fecha_devolucion = '$fecha_devolucion' WHERE num_serie = '$num_serie' AND dni = '$dni' AND fecha_devolucion = '0000-00-00';";
    $hola = mysqli_query($conexion, $actualizarFecha);    
    

} else {
    echo "<div class='alert alert-danger' role='alert' style='width: 70%;margin: auto;margin-top: 2rem;text-align: center;'>El material no se actualizó por un error inesperado.</div>";
}
echo "11";

header('Location: ./devolucion.php');



?>