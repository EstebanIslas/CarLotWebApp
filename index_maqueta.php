<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <!--CSS styles-->
        <link rel="stylesheet" href="assets/css/style.css">
        <!--Ionic icons-->
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
        <!--Google Fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600&display=swap" rel="stylesheet">
        
        <link rel="icon" type="image/x-icon" href="assets/images/car_lot.png" />

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
                    <a href="" class="d-block ml-2 text-light p-2"><i class="icon ion-md-apps mr-2 lead"></i>Tablero</a>
                    <a href="" class="d-block ml-2 text-light p-2"><i class="icon ion-md-person mr-2 lead"></i>Usuario</a>
                    <a href="" class="d-block ml-2 text-light p-2"><i class="icon ion-md-car mr-2 lead"></i>Mi Estacionamiento</a>
                    <a href="" class="d-block ml-2 text-light p-2"><i class="icon ion-md-notifications mr-2 lead"></i>Reservaciones</a>
                    <a href="" class="d-block ml-2 text-light p-2"><i class="icon ion-md-settings mr-2 lead"></i>Configuración</a>
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
                                    Esteban Islas
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Mi Perfil</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Cerrar Sesión</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!--Fin Menu-->

            <div id="content">
                <section class="py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0">Bienvenido</h1>
                                <p class="lead text-muted">Revisa la última información</p>
                            </div>
                            <div class="col-lg-3 d-flex">
                                <button class="btn btn-primary w-100 align-self-center">Descargar Reporte</button>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="bg-mix py-3">
                    <div class="container">
                        <div class="card rounded-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 d-flex stat my-3">
                                        <div class="mx-auto">
                                            <h6 class="text-mutted">Ingresos Mensuales</h6>
                                            <h3 class="font-weight-bold">$1,500</h3>
                                            <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle mr-2 lead"></i>50%</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-flex stat my-3">
                                        <div class="mx-auto">
                                            <h6 class="text-mutted">Ingresos Mensuales</h6>
                                            <h3 class="font-weight-bold">$1,500</h3>
                                            <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle mr-2 lead"></i>50%</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-flex my-3">
                                        <div class="mx-auto">
                                            <h6 class="text-mutted">Ingresos Mensuales</h6>
                                            <h3 class="font-weight-bold">$1,500</h3>
                                            <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle mr-2 lead"></i>50%</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="bg-grey">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 my-3">
                                <div class="card rounded-0">
                                    <div class="card-header bg-light">
                                        <h6 class="font-weight-bold mb-0">Numero de usuarios</h6>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 my-3">
                                <div class="card rounded-0">
                                    <div class="card-header bg-light">
                                        <h6 class="font-weight-bold mb-0">Comentarios Recientes</h6>
                                        <div class="card-body">
                                            <div class="d-flex border-bottom py-2">
                                                <div class="d-flex mr-3">
                                                    <h2 class="align-self-center mb-0" style="color: #f47c04;"><i class="icon ion-md-contacts mr-2 lead"></i></h2></div>
                                                <div class="align-self-center">
                                                    <h6 class="d-inline-block font-weight-bold mb-0">Oscar</h6>
                                                    <small class="d-block text-muted">El estacionamiento es confiable</small>
                                                </div>
                                            </div>

                                            <div class="d-flex border-bottom py-2">
                                                <div class="d-flex mr-3">
                                                    <h2 class="align-self-center mb-0" style="color: #f47c04;"><i class="icon ion-md-contacts mr-2 lead"></i></h2></div>
                                                <div class="align-self-center">
                                                    <h6 class="d-inline-block font-weight-bold mb-0">Valentin</h6>
                                                    <small class="d-block text-muted">Atiende muy bien</small>
                                                </div>
                                            </div>

                                            <div class="d-flex border-bottom py-2">
                                                <div class="d-flex mr-3">
                                                    <h2 class="align-self-center mb-0" style="color: #f47c04;"><i class="icon ion-md-contacts mr-2 lead"></i></h2></div>
                                                <div class="align-self-center">
                                                    <h6 class="d-inline-block font-weight-bold mb-0">Ariel</h6>
                                                    <small class="d-block text-muted">Súper Seguro</small>
                                                </div>
                                            </div>

                                            <div class="d-flex border-bottom py-2">
                                                <div class="d-flex mr-3">
                                                    <h2 class="align-self-center mb-0" style="color: #f47c04;"><i class="icon ion-md-contacts mr-2 lead"></i></h2></div>
                                                <div class="align-self-center">
                                                    <h6 class="d-inline-block font-weight-bold mb-0">Natalia</h6>
                                                    <small class="d-block text-muted">Es muy seguro</small>
                                                </div>
                                            </div>

                                            <div class="d-flex border-bottom py-2">
                                                <div class="d-flex mr-3">
                                                    <h2 class="align-self-center mb-0" style="color: #f47c04;"><i class="icon ion-md-contacts mr-2 lead"></i></h2></div>
                                                <div class="align-self-center">
                                                    <h6 class="d-inline-block font-weight-bold mb-0">Daniela</h6>
                                                    <small class="d-block text-muted">Barato y cercano al centro</small>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary w-100 mt-2">Ver Todos</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            
            </div>
        </div> 

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        <!--Para insertar graficas CDN de JS-->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

        <!--Script que muestra la grafica-->
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'bar',

                // The data for our dataset
                data: {
                    labels: ['April', 'May', 'June', 'July'],
                    datasets: [{
                        label: 'Visitas',
                        backgroundColor: 'rgb(244, 124, 4)',
                        maxBarThickness: 30,
                        data: [50, 100, 150, 200]
                    }]
                },

                // Configuration options go here
                options: {}
            });
        </script>
    </body>

</html>