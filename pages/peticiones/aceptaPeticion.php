<?php
include '../../datosBBDD.php';

error_reporting(0);

$dni = $_GET['dni'];

$num_serie = $_GET['varId'];
// Primero tengo que comprobar que no tenga 3 peticiones ya.
$conexion = mysqli_connect($servername, $username, $password, $database);
$consultaObj = "SELECT num_objetos FROM usuarios WHERE dni = '$dni';";
$consulta = mysqli_query($conexion, $consultaObj);
$resultado = mysqli_fetch_assoc($consulta);
echo $resultado['num_objetos'];
if($resultado['num_objetos'] >= 3){
    header('Location: ./peticiones.php?estado=fallo');
}else{
    $fecha_prestamo = date('Y/m/d');
    $fecha_devolucion = null;
    $fecha_maxima = date("Y/m/d", strtotime($fecha_prestamo.'+ 3 days'));
    echo("FEcha_maxima: " . $fecha_maxima);

    $actualizar = "UPDATE materiales SET estado = 'prestamo' WHERE num_serie = '$num_serie'";
    echo "material actualizado";
    $actualizar_usuario = "UPDATE usuarios SET num_objetos = num_objetos+1 WHERE dni = '$dni'";
    echo "material actualizado";
    if ($consulta = mysqli_query($conexion, $actualizar)) {
        $inserta_prestamos = "INSERT INTO prestamos VALUES ('$dni','$num_serie','$fecha_prestamo','$fecha_devolucion','$fecha_maxima')";
        mysqli_query($conexion, $inserta_prestamos);
        mysqli_query($conexion, $actualizar_usuario);
    }

    // Probar esto:
    $consultaObj = "DELETE FROM peticiones WHERE dni = '$dni' AND num_serie = '$num_serie'";
    $consulta = mysqli_query($conexion, $consultaObj);


    echo "material prestado";
    header('Location: ./peticiones.php?estado=entregado');
}



?>