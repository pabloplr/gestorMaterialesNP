<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/botonera.css">
    <title>Document</title>
</head>

<body>

    <?php
    $dni = $_GET["dni"];
    echo $dni;
    $cumplido = quitarMoroso($dni);
    $error = 'Se ha quitado de moroso el usuario con el id: ' . $dni;
    if (!$cumplido) {
        $error = "Error al quitar de moroso el usuario seleccionado";
    }else{
        header("Location: morosos.php");
    }



    function quitarMoroso($dni)
    {
        include '../../datosBBDD.php';
        $retorno = false;
            $conexionBD = mysqli_connect($servername, $username, $password, $database);
            if (mysqli_connect_errno()) {
                printf("Falló la conexión: %s\n", mysqli_connect_error());
                exit();
            }else{
                $SQL = "UPDATE usuarios SET moroso = 0 WHERE dni = '$dni'";
                actualizarMateriales($dni);
                // if(mysqli_query($conexionBD, "DELETE FROM usuarios WHERE dni = '$dni'")){
                if(mysqli_query($conexionBD, $SQL)){
                    $retorno = true;
                }
            }
            echo $retorno;

        return $retorno;
    }

    function actualizarMateriales($dni_moroso){
        include '../../datosBBDD.php';
        include '../../utilidades/utilidadesMateriales.php';
        $conexionBD = mysqli_connect($servername, $username, $password, $database);
        $SQL6 = "SELECT * FROM prestamos WHERE fecha_devolucion = '0000-00-00' OR fecha_devolucion IS NULL AND dni ='".$dni_moroso."';";
        $consulta = mysqli_query($conexionBD, $SQL6);
        while($columna = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
            devolverMaterial($columna['dni'],$columna['num_serie']);
        }
    }

    ?>

    
    <h2><?php echo $error; ?></h2>
</body>

</html>