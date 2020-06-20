<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="<?=base_url?>assets/css/style_index.css">

    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600&display=swap" rel="stylesheet">

    <!--Logos Ionic-->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="<?=base_url?>assets/images/car_lot.png" />

    <title>Car~Lot</title>
</head>

<body>

    <header>
        <!--Menu-->
        <nav class="navbar navbar-expand-lg fixed-top"> 
            <div class="container">
                <a class="navbar-brand" href="#"><img src="<?=base_url?>assets/images/car_lot.png" class="logo-brand" alt="Car~Lot Logo">Car~Lot</a> <!--Link-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <ion-icon name="menu-outline"></ion-icon><!-- Responsive -->
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="inicio">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#servicios" id="servicios">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#descarga" id="descargas">Descarga</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contacto" id="contacto">Contacto</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ingresar
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?=base_url?>parks/index">Iniciar Sesión</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Registrarse</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--Fin Menu-->
    </header>

    <!-- Sección de Inicio -->
    <section id="hero">
        <div class="container">
            <div class="content-center topmargin-lg">
                <h1>Bienvenido a la página oficial de CarLot</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec cursus nibh ut dapibus ultrices. Donec quis faucibus nulla. Pellentesque habitant morbi tristique 
                    senectus et netus et malesuada fames ac turpis egestas.</p>
                <a href="" class="btn btn-light topmargin-sm">Descubre</a>
            </div>
        </div>
    </section>

    <!-- Sección  -->
    <section id="servicios">
        <div class="container">
            <div class="content-center">
                <h2>Trabajamos para brindarte <b style="color:#f47c04">un excelente servicio.</b></h2>
                <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui ea consequuntur, odit veniam mollitia aliquam reiciendis dignissimos, vitae sapiente neque, cum dolorum. Suscipit expedita obcaecati nesciunt error ut quidem autem.
                </p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="servicios-container">
                        <div class="servicios-details">
                            <a href="#">
                                <h2>Ventajas</h2>
                            </a>
                            <a href="">
                                <p>App/Digital Product</p>
                            </a>
                        </div>
                        <img src="<?=base_url?>assets/images/administration_computer.jpg" class="img-fluid" alt="Administración">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="servicios-container">
                        <div class="servicios-details">
                            <a href="#">
                                <h2>Ventajas</h2>
                            </a>
                            <a href="">
                                <p>App/Digital Product</p>
                            </a>
                        </div>
                        <img src="<?=base_url?>assets/images/staywithus.jpg" class="img-fluid" alt="Administración">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="servicios-container">
                        <div class="servicios-details">
                            <a href="#">
                                <h2>Ventajas</h2>
                            </a>
                            <a href="">
                                <p>App/Digital Product</p>
                            </a>
                        </div>
                        <img src="<?=base_url?>assets/images/find_park.jpg" class="img-fluid" alt="Administración">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="servicios-container">
                        <div class="servicios-details">
                            <a href="#">
                                <h2>Ventajas</h2>
                            </a>
                            <a href="">
                                <p>App/Digital Product</p>
                            </a>
                        </div>
                        <img src="<?=base_url?>assets/images/find_park.jpg" class="img-fluid" alt="Administración">
                    </div>
                </div>

                
            </div>

            <div class="text-center topmargin-sm">
                <p>Listo para contactarte con nosotros?</p>
                <a href="" class="text-dark"><b>Siente la libertad de expresarte</b></a>
            </div>
        </div>
    </section>

    <section id="descarga">
        <div class="container">
            <div class="content-center">
                <h2>Encuentra los estacionamientos en cualquier parte, <b>Descarga la App</b></h2>
                <a href="" class="btn btn-light topmargin-sm">Download</a>
            </div>
        </div>
    </section>

    <section id="contacto">
        <div class="container">
            <div class="row">
                <div class="col-md-6 topmargin-sm">
                    <h3>Listo para contactarte con nosotros?<b style="color:#f47c04"> Dejanos conocer tu experiencia</b>.</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui ea consequuntur, odit veniam mollitia aliquam reiciendis dignissimos, vitae sapiente neque, cum dolorum. contact@smartagency.com</p>
                </div>
                <div class="col-md-6 topmargin-sm">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-group">
                                <input type="text" class="form-control" name="nombre" id="" placeholder="Nombre(s)" required><br>
                                <input type="text" class="form-control" name="apellidos" id="" placeholder="Apellidos" required><br>
                                <input type="email" class="form-control" name="email" id="" placeholder="Correo electrónico" required><br>
                                <input type="text" class="form-control" name="compania" id="" placeholder="Rol de Usuario (Automovilista/Estacionamiento)" required><br>
                                <input type="tel" class="form-control" name="telefono" id="" placeholder="Número Telefónico (Opcional)"><br>
                                
                                <input type="submit" value="Contactar" class="btn btn-dark">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <footer>
        <section id="footer" class="bg-footer">
            <div class="container">
                <p><img src="<?=base_url?>assets/images/car_lot.png" class="logo-footer" alt="Car~Lot Logo">Car~Lot</p>
                <p>Desarrollado por <a href="https://www.facebook.com/esteban.islassantos">Esteban Islas</a> &copy; <?=date('Y');?></p>
            </div>
        </section>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>