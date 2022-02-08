<?php
include '../../../datosBBDD.php';

error_reporting(0);
$dniSession = $_POST['dni'];
echo $dniSession;
$nombre = $_POST['nombre_usuarios'];
echo $nombre;
$apellidos = $_POST['apellidos'];
echo $apellidos;
$curso = $_POST['curso'];
echo $curso;
$rol = $_POST['rol'];
echo $rol;
$ciclo = $_POST['ciclo'];
echo $ciclo;
$update = "UPDATE usuarios SET nombre_usuarios = '$nombre', apellidos = '$apellidos', curso = '$curso', rol = '$rol', ciclo = '$ciclo' WHERE dni = '$dniSession'";
$conexion = mysqli_connect($servername, $username, $password, $database);
if (mysqli_query($conexion, $update)) {
    header('Location: ./../../consultas/usuarios.php');} else {
    echo "<div class='alert alert-danger' role='alert' style='width: 70%;margin: auto;margin-top: 2rem;text-align: center;'>El usuario no se actualizó por un error inesperado.</div>";
}

 ?>
