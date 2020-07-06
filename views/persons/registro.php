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
                            <a class="nav-link" href="<?=base_url?>" id="inicio">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ingresar
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?=base_url?>login/index">Iniciar Sesión</a>
                                <!--div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Registrarse</a-->
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--Fin Menu-->
    </header>

    <section class="login ">

        <div class="card rounded-0 mt-5" style="width: 34rem; margin: auto auto">
            <img src="<?=base_url?>assets/images/car_lot.png" class="card-img-top mt-3" style="width: 80px; margin: auto auto" alt="Car~Lot">
            <div class="card-body w-100" style="width: 26rem">
                <div class="">
                    <form class="form-signin" action="<?=base_url?>persons/save" method="POST">
                        <h4 class="form-signing-heading text-center">Regístrate</h4>
                        <h6 class="form-signing-heading text-center">Encuentra un estacionamiento</h6>

                        <small id="colortext" class="form-text text-muted ml-2 mb-1 mt-3">Nombre:</small>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="nombre" class="form-control mb-3" placeholder="Nombre de automovílista" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="apellido" class="form-control mb-3" placeholder="Apellidos" required>
                                </div>
                            </div>
                        </div>
                        <small id="colortext" class="form-text text-muted ml-2 mb-1">Teléfono:</small>
                        <input type="tel" name="telefono" class="form-control" placeholder="Teléfono" required>

                        <small id="colortext" class="form-text text-muted ml-2 mb-1 mt-2">Correo:</small>
                        <input type="email" name="correo" class="form-control" placeholder="Correo" required>
                        
                        <small id="colortext" class="form-text text-muted ml-2 mb-1 mt-2">Contraseña:</small>
                        <input type="password" name="password" class="form-control" placeholder="Contraseña" required>

                        <input type="submit" class="btn btn-light topmargin-sm btn-block" value="Ingresar">
                        
                    </form>
                    <div class="text-center">
                        <p><small>¿Ya tienes cuenta?</small></p>
                        <a href="<?=base_url?>login/index" style="color:#f47c04"><small><b>Inicia Sesión</b></small></a>
                    </div>
                    <div class="text-center">
                        <p><small>¿Listo para administrar tu estacionamiento?</small></p>
                        <a href="<?=base_url?>parks/registro" style="color:#f47c04"><small><b>Registra tu estacionamiento</b></small></a>
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