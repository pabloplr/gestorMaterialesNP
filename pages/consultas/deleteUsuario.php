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
    $id = $_GET["varId"];
    echo $id;
    $cumplido = eliminarUsuario($id);
    $error = 'Se ha borrado el usuario con el id: ' . $id;
    if (!$cumplido) {
        $error = "Error al borrar el usuario seleccionado";
    }else{
        header("Location: usuarios.php?estado=borrado");
    }



    function eliminarUsuario($id)
    {
        include '../../datosBBDD.php';
        $retorno = false;
            $conexionBD = mysqli_connect($servername, $username, $password, $database);
            if (mysqli_connect_errno()) {
                printf("Falló la conexión: %s\n", mysqli_connect_error());
                exit();
            }else{
                
                if(mysqli_query($conexionBD, "DELETE FROM usuarios WHERE dni = '$id'")){
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