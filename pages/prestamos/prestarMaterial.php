<?php
include '../../datosBBDD.php';

echo "inicio 1";
error_reporting(0);

echo "inicio 2";
$dni = $_GET['dni'];
echo "inicio 3";
$num_serie = $_GET['varId'];
echo "inicio 4";
$fecha_prestamo = date('y/m/d');
echo "inicio 5: ", $fecha_prestamo;
$fecha_devolucion = null;
echo "inicio ".'<br>';

$oldDate   =  date("Y/m/d");
$date1 = date("Y/m/d", strtotime($oldDate.'+ 1 days'));
$date2 = date("Y/m/d", strtotime($oldDate.'+ 2 days'));
echo '<br>';
echo $date1; //output: 2020-02-28
echo "inicio ".'<br>';
echo $date2; //output: 2020-02-29

// $conexion = mysqli_connect($servername, $username, $password, $database);
// $actualizar = "UPDATE materiales SET estado = 'prestamo' WHERE num_serie = '$num_serie'";
// echo "material actualizado";

// if ($consulta = mysqli_query($conexion, $actualizar)) {
//     $inserta_prestamos = "INSERT INTO prestamos VALUES ('$dni','$num_serie','$fecha_prestamo','$fecha_devolucion','$fecha_maxima')";
//     mysqli_query($conexion, $inserta_prestamos);
// } else {
//     echo "<div class='alert alert-danger' role='alert' style='width: 70%;margin: auto;margin-top: 2rem;text-align: center;'>El material no se actualizó por un error inesperado.</div>";
// }
// echo "material prestado";
// header('Location: ./entrega.php?dni=' . $dni);
