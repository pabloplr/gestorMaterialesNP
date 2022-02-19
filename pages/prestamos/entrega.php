<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/gestion/css.css">
    <link rel="stylesheet" href="../../css/gestion/estilo.css">
    <link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
    <title>Nuevas Profesiones</title>
</head>

<body>
    <?php session_start(); ?>
    <nav class="navbar navbar-expand-sm navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="../principal.php"><img src="../../img/np.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item ml-2 active dropdown">
                        <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">Gestión</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../gestion/gestion-materiales.php">Materiales</a>
                            <a class="dropdown-item" href="./gestion/gestion-usuarios.php">Usuarios</a>
                        </div>
                    </li>

                    <li class="nav-item ml-2 active dropdown">
                        <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">Préstamos</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="usuario-entrega.php">Entrega</a>
                            <a class="dropdown-item" href="usuario-devolucion.php">Devolución</a>
                        </div>
                    </li>

                    <li class="nav-item ml-2 active dropdown">
                        <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">Consultas</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../consultas/prestamos.php">Prestamos</a>
                            <a class="dropdown-item" href="../consultas/materiales.php">Materiales</a>
                            <a class="dropdown-item" href="../consultas/usuarios.php">Usuarios</a>
                            <a class="dropdown-item" href="../consultas/morosos.php">Morosos</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container titulhr">
        <h2 class="titulo">Préstamos | Prestar Materiales</h2>
    </div>

    <form action="entrega.php" method="POST">
        <div class="container">
            <div class="row">
                <form action="./entrega.php" method="POST" class="form-inline">
                    <div class="form-group mx-sm-3 mb-2">
                        <input type="text" class="form-control" id="num_serie" name="num_serie" placeholder="nº serie">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                </form>
                <form action="./entrega.php" method="POST" style="margin-left: 80px;">
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label class=" sr-only" for="inlineFormCustomSelect">Preference</label>
                            <select class="custom-select mr-sm-2" id="tipo_filtro" name="tipo_filtro">
                                <option value="todo">Todo</option>
                                <option value="auricular">Auricular</option>
                                <option value="camara">Cámara</option>
                                <option value="cable">Cable</option>
                                <option value="microfono">Micrófono</option>
                                <option value="tripode">Trípode</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Filtrar</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-dm-12 col-12 my-5 text-center">
                        <!-- <select class="form-select form-select-sm w-50 caract" aria-label="form-select-sm example" name="material"> -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">nº serie</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Modelo</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Prestar</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                include '../../datosBBDD.php';

                                // if (isset($_GET['varId'])) { //venimos de
                                //     $material = $_GET['varId'];
                                // } else {
                                //     if (isset($_POST["tipoObjeto"])) {
                                //         $material = $_POST["tipoObjeto"];
                                //     }
                                // }

                                error_reporting(0);
                                $conexionBD = mysqli_connect($servername, $username, $password, $database);
                                $dni = $_GET['dni'];
                                $query_num_obj = "SELECT num_objetos FROM usuarios WHERE dni = '$dni';";
                                $consulta_num_obj = mysqli_query($conexionBD, $query_num_obj);
                                $resultado_tus_muelas = mysqli_fetch_array($consulta_num_obj, MYSQLI_ASSOC);
                                echo "pary hard: " . $resultado_tus_muelas['num_objetos'];
                                if($resultado_tus_muelas['num_objetos'] >= 3){
                                    echo '<script>alert("Este usuario supera el límite de materiales prestados")</script>';
                                    echo '<script>window.location.href="../principal.php"</script>';
                                    // header('Location: ../principal.php');
                                }

                                if (isset($_POST['num_serie'])) {
                                    $num_serie = $_POST['num_serie'];
                                    if($_POST['num_serie'] == ''){
                                        $SQL = "SELECT num_serie, marca, modelo, nombre_materiales FROM materiales WHERE estado = 'stock'";
                                    }else{
                                        $SQL = "SELECT num_serie, marca, modelo, nombre_materiales FROM materiales WHERE estado = 'stock' AND num_serie = '$num_serie'";
                                    }
                                } else  if(isset($_POST['tipo_filtro'])){
                                    $tipo_filtro = $_POST['tipo_filtro'];
                                    if($_POST['tipo_filtro'] == 'todo'){
                                        $SQL = "SELECT num_serie, marca, modelo, nombre_materiales FROM materiales WHERE estado = 'stock'";
                                    }else{
                                        $SQL = "SELECT num_serie, marca, modelo, nombre_materiales FROM materiales WHERE estado = 'stock' AND nombre_materiales = '$tipo_filtro'";
                                    }
                                } else  {
                                    $SQL = "SELECT num_serie, marca, modelo, nombre_materiales FROM materiales WHERE estado = 'stock'";
                                }
                                $consulta = mysqli_query($conexionBD, $SQL);

                                while ($columna = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
                                    $numSerie = $columna["num_serie"];
                                    $modelo = $columna["modelo"];
                                    $tipo = $columna["nombre_materiales"];
                                    $marca = $columna["marca"];

                                    $value = $numSerie . "-" . date("Y/m/d") . "-" . date("Y/m/d", strtotime(date("Y/m/d") . "+ 15 day"));

                                    echo "<tr>
                                                    <td>$numSerie</td>
                                                    <td>$tipo</td>
                                                    <td>$modelo</td>
                                                    <td>$marca</td>
                                                    <td><a class='btn btn-outline-primary m-auto' href='prestarMaterial.php?varId=" . $numSerie ."&dni=". $_GET['dni']. "'>Prestar</a></td>
                                                </tr>";
                                }
                                ?>
                                <!-- </select> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>



    <footer class="site-footer ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h6>Dirección</h6>
                    <p class="text-justify">Calle Isabela, 1, 41013 Sevilla</p>
                </div>

                <div class="col-lg-4">
                    <h6>Teléfono</h6>
                    <p class="text-justify">954 23 03 73</p>
                </div>

                <div class="col-lg-4">
                    <h6>Correo</h6>
                    <p class="text-justify">info@fpnuevasprofesiones.es</p>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2021
                        <a href="https://fpnuevasprofesiones.es/">Nuevas Profesiones.com</a>.
                    </p>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                        <li><a class="facebook" href="#"><i class="fab fa-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a class="dribbble" href="#"><i class="fab fa-dribbble"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>