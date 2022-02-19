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
                // if(mysqli_query($conexionBD, "DELETE FROM usuarios WHERE dni = '$dni'")){
                if(mysqli_query($conexionBD, $SQL)){
                    $retorno = true;
                }
            }
            echo $retorno;

        return $retorno;
    }


    ?>

    
    <h2><?php echo $error; ?></h2>
</body>

</html>