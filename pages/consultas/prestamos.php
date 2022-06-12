<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
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
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ml-2 active">
                        <a class="nav-link" href="../peticiones/peticiones.php">Peticiones</a>
                    </li>
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
        <h2 class="titulo">PRESTAMOS</h2>
    </div>

    <div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table100 ver1 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                                <tr class="row100 head">
                                    <th class="cell100 column1">Nº Serie</th>
                                    <th class="cell100 column2">DNI</th>
                                    <th class="cell100 column3">Fecha préstamo</th>
                                    <th class="cell100 column3">Fecha devolución</th>
                                    <th class="cell100 column3">Fecha máxima</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <div class="table100-body js-pscroll">
                        <table>
                            <tbody>
                                <?php
                                include '../../datosBBDD.php';
                                //         error_reporting(0);
                                //         $conexionBD = mysqli_connect($servername, $username, $password, $database);
                                //         $consulta = mysqli_query($conexionBD, "SELECT * FROM prestamos");
                                //         $num_total_rows = 0;
                                // while ($columna = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
                                //     echo "<tr>";
                                //     echo "<td class='cell100 column1'><a href='../gestion/actualizar/actualizar-materiales.php?varId2=".$columna["num_serie"]."'>" . $columna["num_serie"] . "</a></td>";
                                //     echo "<td class='cell100 column2'><a href='../gestion/actualizar/actualizar-usuarios.php?varId2=".$columna["dni"]."'>" . $columna["dni"] . "</a></td>"; 
                                //     echo "<td class='cell100 column3'>" . $columna["fecha_prestamo"] . "</td>";
                                //     echo "<td class='cell100 column3'>" . $columna["fecha_devolucion"] . "</td>";
                                //     echo "<td class='cell100 column3'>" . $columna["fecha_maxima"] . "</td>";
                                //     echo "</tr>";
                                //     $num_total_rows++;
                                // }
                                // $conexionDB = new mysqli(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE);
                                $conexionBD = new mysqli($servername, $username, $password, $database);
                                $result = $conexionBD->query('SELECT COUNT(*) as total_products FROM prestamos');
                                $row = $result->fetch_assoc();
                                $num_total_rows = $row['total_products'];
                                define('NUM_ITEMS_BY_PAGE', 15);

                                if ($num_total_rows > 0) {
                                    $page = false;

                                    //examino la pagina a mostrar y el inicio del registro a mostrar
                                    if (isset($_GET["page"])) {
                                        $page = $_GET["page"];
                                    }

                                    if (!$page) {
                                        $start = 0;
                                        $page = 1;
                                    } else {
                                        $start = ($page - 1) * NUM_ITEMS_BY_PAGE;
                                    }
                                    //calculo el total de paginas
                                    $total_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);



                                    $result = $conexionBD->query(
                                        'SELECT * FROM prestamos
                                            ORDER BY fecha_prestamo DESC LIMIT ' . $start . ', ' . NUM_ITEMS_BY_PAGE
                                    );
                                    if ($result->num_rows > 0) {

                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td class='cell100 column1'><a href='../gestion/actualizar/actualizar-materiales.php?varId2=" . $row["num_serie"] . "'>" . $row["num_serie"] . "</a></td>";
                                            echo "<td class='cell100 column2'><a href='../gestion/actualizar/actualizar-usuarios.php?varId2=" . $row["dni"] . "'>" . $row["dni"] . "</a></td>";
                                            echo "<td class='cell100 column3'>" . $row["fecha_prestamo"] . "</td>";
                                            echo "<td class='cell100 column3'>" . $row["fecha_devolucion"] . "</td>";
                                            echo "<td class='cell100 column3'>" . $row["fecha_maxima"] . "</td>";
                                            echo "</tr>";
                                        }
                                    }


                                    echo '</tbody>';
                                    echo '</table>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '<ul style="margin-left:45%; margin-top: 1%;" class="pagination align-content-center">';

                                    if ($total_pages > 1) {
                                        if ($page != 1) {
                                            echo '<li class="page-item"><a class="page-link" href="prestamos.php?page=' . ($page - 1) . '"><span aria-hidden="true">&laquo;</span></a></li>';
                                        }

                                        for ($i = 1; $i <= $total_pages; $i++) {
                                            if ($page == $i) {
                                                echo '<li class="page-item active"><a class="page-link" href="#">' . $page . '</a></li>';
                                            } else {
                                                echo '<li class="page-item"><a class="page-link" href="prestamos.php?page=' . $i . '">' . $i . '</a></li>';
                                            }
                                        }

                                        if ($page != $total_pages) {
                                            echo '<li class="page-item"><a class="page-link" href="prestamos.php?page=' . ($page + 1) . '"><span aria-hidden="true">&raquo;</span></a></li>';
                                        }
                                    }
                                    echo '</ul>';
                                }
                                ?>



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