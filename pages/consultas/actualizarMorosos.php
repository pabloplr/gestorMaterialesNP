<?php
function actualizarMorosos(){
    include '../../datosBBDD.php';
    error_reporting(0);
    $conexionBD = mysqli_connect($servername, $username, $password, $database);
    $SQL6 = "SELECT * FROM prestamos WHERE fecha_devolucion = '0000-00-00' OR fecha_devolucion IS NULL";
    $consulta = mysqli_query($conexionBD, $SQL6);
    // $SQL =  "SELECT * FROM usuarios WHERE moroso = 1";
    while($columna = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
        
        $date1 = new DateTime($columna["fecha_maxima"]);
        $date2 = new DateTime("NOW");
        $diff = $date1->diff($date2);
        if ($diff > 0) {
            $dni = $columna["dni"];
            $SQL = "UPDATE usuarios SET moroso = 1 WHERE dni = '$dni'";
            mysqli_query($conexionBD, $SQL);
        }
        $consulta_actualizar = mysqli_query($conexionBD,$SQL);
    }
}
// header('Location: pages/consultas/morosos.php');
?>