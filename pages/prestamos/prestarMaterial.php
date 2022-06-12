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
$actualizar_usuario = "UPDATE usuarios SET num_objetos = num_objetos+1 WHERE dni = '$dni'";
echo "material actualizado2";

if ($consulta = mysqli_query($conexion, $actualizar)) {
    $inserta_prestamos = "INSERT INTO prestamos VALUES ('$dni','$num_serie','$fecha_prestamo','$fecha_devolucion','$fecha_maxima')";
    mysqli_query($conexion, $inserta_prestamos);
    mysqli_query($conexion, $actualizar_usuario);

    // Compruebo si en peticiones hay una peticion de este usuario de este mismo material y la borro si es el caso.
    $actualizarPeticiones = "SELECT * FROM peticiones WHERE dni = '$dni' AND num_serie = '$num_serie';";
    $peticiones = mysqli_query($conexion, $actualizarPeticiones);
    $numFilas = mysqli_num_rows($peticiones);
    if($numFilas > 0){
        mysqli_query($conexion, "DELETE FROM peticiones WHERE dni = '$dni' AND num_serie = '$num_serie';");
    }

    
    

} else {
    echo "<div class='alert alert-danger' role='alert' style='width: 70%;margin: auto;margin-top: 2rem;text-align: center;'>El material no se actualizó por un error inesperado.</div>";
}
echo "material prestado";
header('Location: ./entrega.php?dni=' . $dni . '&estado=entregado');
?>
