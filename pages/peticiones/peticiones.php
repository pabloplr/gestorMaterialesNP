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
    <nav class="navbar navbar-expand-sm navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="../principal.php"><img src="../../img/np.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item ml-2 active">
                        <a class="nav-link" href="./peticiones.php">Peticiones</a>
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
        <h2 class="titulo">Peticiones Materiales</h2>
    </div>
    <div class="contieneAlerta text-center" style="width: 75%; margin: 0 auto;">
        <?php
        if (isset($_GET['estado'])) {
            if ($_GET['estado'] == 'entregado') {
                echo '<div class="alert alert-primary text-center" role="alert">
                    ¡Material entregado con éxito!
                  </div>';
            }elseif($_GET['estado'] == 'fallo'){
                echo '<div class="alert alert-danger text-center" role="alert">
                Nº máximo de préstamos realizado, devuelve algún material para continuar.
              </div>';
            }elseif($_GET['estado'] == 'rechazado'){
                echo '<div class="alert alert-danger text-center" role="alert">
                Petición rechazada. Se eliminó de la base de datos.
              </div>';
            }
            echo "<script>
                setTimeout( () => { document.querySelector('.contieneAlerta').removeChild(document.querySelector('.alert')) }, 5000)    
            </script>";
        }
        ?>
    </div>
    <div class="container">
        <!-- Aqui va el codigo de las coza -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-dm-12 col-12 text-center">
                <!-- <select class="form-select form-select-sm w-50 caract" aria-label="form-select-sm example" name="material"> -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">DNI</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Nº serie</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Aceptar</th>
                            <th scope="col">Rechazar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include '../../datosBBDD.php';
                            error_reporting(0);
                            $conn = new mysqli($servername, $username, $password, $database);
                            $sql = "SELECT * FROM peticiones";
                            $consulta = mysqli_query($conn, $sql);
                                    while ($dato = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
                                        echo "<tr>";
                                        echo "<td>". $dato['dni'] ."</td>";
                                        echo "<td>". $dato['nombre'] ."</td>";
                                        echo "<td>". $dato['num_serie'] ."</td>";
                                        echo "<td>". $dato['marca'] ."</td>";
                                        echo "<td>". $dato['modelo'] ."</td>";
                                        // Hay que comprobar si el material esta en stock // Comprobar cuantos materiales tiene el usuario con ese dni
                                        echo "<td><a class='btn btn-outline-primary m-auto' href='./aceptaPeticion.php?varId=" . $dato['num_serie'] . "&dni=" . $dato['dni'] . "'>Aceptar</a></td>";
                                        echo "<td><a class='btn btn-outline-danger m-auto' href='./rechazaPeticion.php?varId=" . $dato['num_serie'] . "&dni=" . $dato['dni'] . "'>Rechazar</a></td>";
                                        echo "</tr>";
                                        
                                    }


                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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