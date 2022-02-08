<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/gestion/css.css">
    <link rel="stylesheet" href="../../css/gestion/estilo.css">
    <link rel="stylesheet" href="../../css/gestion/st.css">
    <link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
    <title>Nuevas Profesiones</title>
</head>

<body>
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
                            <a class="dropdown-item" href="../gestion/gestion-usuarios.php">Usuarios</a>
                        </div>
                    </li>

                    <li class="nav-item ml-2 active dropdown">
                        <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">Préstamos</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../prestamos/usuario-entrega.php">Entrega</a>
                            <a class="dropdown-item" href="../prestamos/usuario-devolucion.php">Devolución</a>
                        </div>
                    </li>

                    <li class="nav-item ml-2 active dropdown">
                        <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">Consultas</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="prestamos.php">Prestamos</a>
                            <a class="dropdown-item" href="materiales.php">Materiales</a>
                            <a class="dropdown-item" href="usuarios.php">Usuarios</a>
                            <a class="dropdown-item" href="morosos.php">Morosos</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container titulhr">
        <h2 class="titulo">MATERIALES</h2>
    </div>
    <div class="container p-4">
        <div class="d-flex flex-row justify-content-between">
            <div>
                <form class="form-inline my-2 my-lg-0 align-middle">
                    <input class="form-control mr-sm-2 border" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn  my-2 my-sm-0 btn-outline-primary btn-primary-np-blue" type="submit">Buscar</button>
                </form>
            </div>
            <div>
                <form class="form-inline my-2 my-lg-0 align-middle">
                    <select class="form-control mr-sm-2" id="exampleFormControlSelect1">
                        <option value="marca">marca</option>
                        <option value="modelo">modelo</option>
                        <option value="estado">estado</option>
                        <option value="nombre_materiales">tipo</option>
                    </select>
                    <button class="btn  my-2 my-sm-0 btn-outline-primary btn-primary-np-blue" type="submit">Filtrar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table100 ver1 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                                <tr class="row100 head">
                                    <th class="cell100 column1">NUMº SERIE</th>
                                    <th class="cell100 column2">MARCA</th>
                                    <th class="cell100 column3">MODELO</th>
                                    <th class="cell100 column4">IMAGEN</th>
                                    <th class="cell100 column5">ESTADO</th>
                                    <th class="cell100 column6">TIPO</th>
                                    <th class="cell100 column7">EDITAR</th>
                                    <th class="cell100 column7">BORRAR</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="table100-body js-pscroll">
                        <table>
                            <tbody>
                                <tr>
                                    <td colspan="8">
                                        <div class="d-flex justify-content-center">
                                            <form action="./../gestion/insertar/insertar-materiales.php" method="post">
                                                <input class="btn  my-2 my-sm-0 btn-outline-success align-self-center border border-success" type="submit" value="Añadir material">
                                            </form>
                                            <!-- <button class="btn  my-2 my-sm-0 btn-outline-success align-self-center ">Añadir material  <i class="far fa-plus-square"></i></button> -->
                                        </div>
                                    </td>
                                    <!-- <img src="../../img/img_defecto.png" alt=""> -->
                                </tr>
                                <?php
                                include '../../datosBBDD.php';
                                error_reporting(0);
                                // $conexionBD = mysqli_connect($servername, $username, $password, $database);
                                // $consulta = mysqli_query($conexionBD, "SELECT * FROM materiales");
                                $columna = obtenerTodos();
                                for ($i = 0; $i < count($columna); $i++) {
                                    echo "<tr>";
                                    echo "<td class='cell100 column1'>" . $columna[$i]["num_serie"] . "</td>";
                                    echo "<td class='cell100 column2'>" . $columna[$i]["marca"] . "</td>";
                                    echo "<td class='cell100 column3'>" . $columna[$i]["modelo"] . "</td>";
                                    if ($columna[$i]["ruta"] == "" || $columna[$i]["ruta"] == "img/materiales/") {
                                        echo "<td class='cell100 column4'><img src='../../img/img_defecto.png" . "'></td>";
                                    } else {
                                        echo "<td class='cell100 column4'><img src='../../" . $columna[$i]["ruta"] . "'></td>";
                                    }
                                    echo "<td class='cell100 column5'>" . $columna[$i]["estado"] . "</td>";
                                    echo "<td class='cell100 column6'>" . $columna[$i]["nombre_materiales"] . "</td>";
                                    echo "<td class='cell100 column7'><a href='../gestion/actualizar/actualizar-materiales.php?varId2=" . $columna[$i]["num_serie"] . "'><img src='../../img/editar.png'></a></td>";
                                    echo "<td class='cell100 column7'><a href='deleteMaterial.php?varId=" . $columna[$i]["num_serie"] . "'><img src='../../img/delete.png'></a></td>";
                                    echo "</tr>";
                                }
                                // while ($columna = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
                                //     echo "<tr>";
                                //     echo "<td class='cell100 column1'>" . $columna["num_serie"] . "</td>";
                                //     echo "<td class='cell100 column2'>" . $columna["marca"] . "</td>";
                                //     echo "<td class='cell100 column3'>" . $columna["modelo"] . "</td>";
                                //     echo "<td class='cell100 column4'><img src='../../" . $columna["ruta"] . "'></td>";
                                //     echo "<td class='cell100 column5'>" . $columna["estado"] . "</td>";
                                //     echo "<td class='cell100 column6'>" . $columna["nombre_materiales"] . "</td>";
                                //     echo "<td class='cell100 column7'><a href=''><img src='../../img/editar.png'></a></td>";
                                //     echo "<td class='cell100 column7'><a href='delete.php?varId=".$datos[$i]["id"]."'><img src='../../img/delete.png'></a></td>";
                                //     echo "</tr>";
                                // }

                                function obtenerTodos()
                                {
                                    include '../../datosBBDD.php';
                                    $datos =  [];
                                    $conexionBD = mysqli_connect($servername, $username, $password, $database);
                                    $consulta = mysqli_query($conexionBD, "SELECT * FROM materiales");
                                    while ($dato = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
                                        $datos[] = $dato;
                                    }
                                    return $datos;
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="site-footer">
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