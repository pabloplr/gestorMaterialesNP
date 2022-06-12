
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
        <link rel="stylesheet" href="../../../css/gestion/css.css">
        <link rel="stylesheet" href="../../../css/gestion/estilo.css">
        <link rel="shortcut icon" href="../../../img/favicon.ico" type="image/x-icon">
        <title>Nuevas Profesiones</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="../../principal.php"><img src="../../../img/np.png"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto ">
                    <li class="nav-item ml-2 active">
                        <a class="nav-link" href="../../peticiones/peticiones.php">Peticiones</a>
                    </li>
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">Gestión</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="../gestion-materiales.php">Materiales</a>
                                <a class="dropdown-item" href="../gestion-usuarios.php">Usuarios</a>
                            </div>
                        </li>

                        <li class="nav-item ml-2 active dropdown">
                            <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">Préstamos</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="../../prestamos/usuario-entrega.php">Entrega</a>
                                <a class="dropdown-item" href="../../prestamos/usuario-devolucion.php">Devolución</a>
                            </div>
                        </li>

                        <li class="nav-item ml-2 active dropdown">
                            <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">Consultas</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="../../consultas/prestamos.php">Prestamos</a>
                                <a class="dropdown-item" href="../../consultas/materiales.php">Materiales</a>
                                <a class="dropdown-item" href="../../consultas/usuarios.php">Usuarios</a>
                                <a class="dropdown-item" href="../../consultas/morosos.php">Morosos</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    
        <div class="container titulhr">
            <h2 class="titulo">Gestión | Insertar Materiales</h2>     
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                    <form class="jumbotron needs-validation" method="POST" action="insertar-materiales.php" enctype="multipart/form-data" novalidate>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Número de Serie:</label>
                            <div class="col-sm-10">
                                <input type="text" id="num_serie" name="num_serie" class="form-control" placeholder="nº de serie" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    Se necesita un nº de serie.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Marca:</label>
                            <div class="col-sm-10">
                                <input type="text" id="marca" name="marca" class="form-control" placeholder="nombre marca" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    Se necesia una marca.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Material:</label>
                            <div class="col-sm-10">
                                <select class="custom-select form-control" id="inputGroupSelect04" name="nombre_material" required>
                                    <option value="">Elige un tipo de material</option>
                                    <option value="camara">Cámara</option>
                                    <option value="auricular">Auriculares</option>
                                    <option value="cable">Cables</option>
                                    <option value="microfono">Micrófono</option>
                                    <option value="tripode">Trípode</option>
                                </select>
                                <div class="invalid-feedback">
                                    Se necesia un material.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Modelo:</label>
                            <div class="col-sm-10">
                                <input type="text" id="modelo" name="modelo" class="form-control" placeholder="nombre modelo" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    Se necesia un modelo.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Estado:</label>
                            <div class="col-sm-10">
                                <select class="custom-select" id="inputGroupSelect04" class="form-control" name="estado" required>
                                    <option value="stock" selected>Stock</option>
                                    <option value="prestamo">Prestamo</option>
                                    <option value="reparacion">Reparación</option>
                                </select>
                                <div class="invalid-feedback">
                                    Selecciona un estado.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Observaciones:</label>
                            <div class="col-sm-10">
                                <input type="text" id="observaciones" name="observaciones" class="form-control" autocomplete="off">
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Imagen:</label>
                            <div class="col-sm-10">
                                <input type="file" name="img">
                            </div>
                        </div>
                        
                        <div class="alert alert-secondary" role="alert" style='width: 55%;margin: auto;margin-top: 2rem;text-align: center;'>El nombre de las imagenes debe ser el mismo que el número de serie.</div>
    
                        <div class="form-group row">
                            <div class="col-sm-12 text-center mt-5">
                                <button type="submit" name="submit" class="btn btn-primary">Insertar</button>
                            </div>
                        </div>
                    </form>
                    <script>
                        (function() {
                        'use strict';
                        window.addEventListener('load', function() {
                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                            var forms = document.getElementsByClassName('needs-validation');
                            // Loop over them and prevent submission
                            var validation = Array.prototype.filter.call(forms, function(form) {
                            form.addEventListener('submit', function(event) {
                                if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            }, false);
                            });
                        }, false);
                        })();
                    </script>
                    <?php
                                    include '../../../datosBBDD.php';

                        error_reporting(0);
                        if (isset($_POST["submit"])) {
                           //Conexión con la Base de Datos.
                            
                            //Crear conexión
                                $conn = new mysqli($servername, $username, $password, $database);

                            //Cogemos los datos de los inputs mediante el método POST
                                $num_serie = $_POST['num_serie'];

                                if ($resultado = mysqli_query($conn, "SELECT num_serie FROM materiales WHERE num_serie = '$num_serie'")) {
                                    $numcolumnas = mysqli_num_rows($resultado);
                                }
                                
                                if ($numcolumnas != 0) {
                                    echo "<div class='alert alert-danger' role='alert' style='width: 70%;margin: auto;margin-top: 2rem;text-align: center;'>Ya existe un material con ese número de serie.</div>";
                                } else {
                                    $nombre_material = strtolower($_POST['nombre_material']);
                                    $marca = $_POST['marca'];
                                    $modelo = $_POST['modelo'];
                                    $estado = strtolower($_POST['estado']);
                                    $observaciones = $_POST['observaciones'];
                                    $imagen = $_FILES['img']['name'];
                                    $destino = "../../../img/materiales/" . $imagen;
                                    $archivo = $_FILES['img']['tmp_name'];
                                    move_uploaded_file($archivo, $destino);

                                    $conexion = mysqli_connect("localhost", "root", "", "bd_prestamos");
                                    $SQL = "INSERT INTO materiales (num_serie, nombre_materiales, marca, modelo, estado, observaciones, ruta) VALUES ('$num_serie','$nombre_material','$marca','$modelo','$estado','$observaciones','img/materiales/$imagen')";

                                    if (mysqli_query($conexion, $SQL)) {
                                        echo "<div class='alert alert-success' role='alert' style='width: 70%;margin: auto;margin-top: 2rem;text-align: center;'>¡Material insertado con éxito!</div>";
                                    } else {
                                        echo "<div class='alert alert-danger' role='alert' style='width: 70%;margin: auto;margin-top: 2rem;text-align: center;'>El material no fue insertado por un error inesperado.</div>";
                                    }

                                    mysqli_close($conexion);
                                }

                                mysqli_close($conn);
}
                    ?>
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

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    </body>
</html>