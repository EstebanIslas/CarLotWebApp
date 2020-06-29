<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <!--CSS styles-->
        <link rel="stylesheet" href="<?=base_url?>assets/css/style_dash.css">
        <!--Ionic icons-->
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
        <!--Google Fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600&display=swap" rel="stylesheet">
        
        <link rel="icon" type="image/x-icon" href="<?=base_url?>assets/images/car_lot.png" />

        <title>Car~Lot</title>
    </head>

    <body>
        <div class="d-flex" id="content-wrapper">
            <div id="sidebar-container" class="bg-primary h-100">
                <div class="logo">
                    <h4 class="text-light p-2"><b>Car~Lot</b></h4>
                </div>
                <div id="menu">
                    <br><br>
                    <?php if(isset($_SESSION['usuario']) && isset($_SESSION['estacionamiento'])):?>
                        <a href="<?=base_url?>parks/index" class="d-block ml-2 text-light p-2"><i class="icon ion-md-apps mr-2 lead"></i>Tablero</a>
                        <!--a href="" class="d-block ml-2 text-light p-2"><i class="icon ion-md-person mr-2 lead"></i>Usuario</a-->
                        <a href="<?=base_url?>parks/info" class="d-block ml-2 text-light p-2"><i class="icon ion-md-car mr-2 lead"></i>Mi Estacionamiento</a>
                        <a href="<?=base_url?>reservas/index" class="d-block ml-2 text-light p-2"><i class="icon ion-md-notifications mr-2 lead"></i>Reservaciones</a>
                        <a href="" class="d-block ml-2 text-light p-2"><i class="icon ion-md-settings mr-2 lead"></i>Configuración</a>
                    
                    <?php elseif(isset($_SESSION['usuario']) && isset($_SESSION['automovilista'])): ?>
                        <a href="" class="d-block ml-2 text-light p-2"><i class="icon ion-md-apps mr-2 lead"></i>Tablero</a>
                        <!--a href="" class="d-block ml-2 text-light p-2"><i class="icon ion-md-person mr-2 lead"></i>Usuario</a-->
                        <a href="" class="d-block ml-2 text-light p-2"><i class="icon ion-md-car mr-2 lead"></i>Mis Automoviles</a>
                        <a href="" class="d-block ml-2 text-light p-2"><i class="icon ion-md-car mr-2 lead"></i>Ver Estacionamientos</a>
                        <a href="" class="d-block ml-2 text-light p-2"><i class="icon ion-md-notifications mr-2 lead"></i>Reservaciones</a>
                        <a href="" class="d-block ml-2 text-light p-2"><i class="icon ion-md-settings mr-2 lead"></i>Configuración</a>
                    
                    <?php endif;?>
                </div>
            </div>

            <div class="w-100">
            <!--Menu-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <form class="form-inline position-relative my-2 d-inline-block">
                        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
                        <button class="btn btn-search position-absolute" type="submit"><i class="icon ion-md-search"></i></button>
                    </form>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php if(isset($_SESSION['usuario']) && isset($_SESSION['estacionamiento'])):?>
                                        <?=$_SESSION['estacionamiento']->nombre_park?>
                                    <?php elseif(isset($_SESSION['usuario']) && isset($_SESSION['automovilista'])): ?>
                                        <?=$_SESSION['automovilista']->nombre?>
                                        <?=$_SESSION['automovilista']->apellido?>
                                    <?php endif;?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Mi Perfil</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?=base_url?>login/logout">Cerrar Sesión</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!--Fin Menu-->

            <div id="content">