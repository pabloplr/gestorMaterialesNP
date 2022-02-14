<?php
include '../../datosBBDD.php';

error_reporting(0);

$dni = $_GET['dni'];

$num_serie = $_GET['varId'];
$fecha_prestamo = date('Y/m/d');
$fecha_devolucion = null;
$fecha_maxima = date("Y/m/d", strtotime($fecha_prestamo.'+ 3 days'));
echo("FEcha_maxima: " . $fecha_maxima);

$conexion = mysqli_connect($servername, $username, $password, $database);
$actualizar = "UPDATE materiales SET estado = 'prestamo' WHERE num_serie = '$num_serie'";
echo "material actualizado";

if ($consulta = mysqli_query($conexion, $actualizar)) {
    $inserta_prestamos = "INSERT INTO prestamos VALUES ('$dni','$num_serie','$fecha_prestamo','$fecha_devolucion','$fecha_maxima')";
    mysqli_query($conexion, $inserta_prestamos);
} else {
    echo "<div class='alert alert-danger' role='alert' style='width: 70%;margin: auto;margin-top: 2rem;text-align: center;'>El material no se actualizó por un error inesperado.</div>";
}
echo "material prestado";
header('Location: ./entrega.php?dni=' . $dni);
?>
