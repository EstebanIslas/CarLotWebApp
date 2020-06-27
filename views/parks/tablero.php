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
                                            <?php while($res = $get_puntuaciones->fetch_object()):?>
                                                <div class="d-flex border-bottom py-2">
                                                    <div class="d-flex mr-3">
                                                        <h2 class="align-self-center mb-0" style="color: #f47c04;"><i class="icon ion-md-contacts mr-2 lead"></i></h2></div>
                                                    <div class="align-self-center">
                                                        <h6 class="d-inline-block font-weight-bold mb-0"><?=$res->nombre;?> <?=$res->apellido?></h6>
                                                        <small class="d-block text-muted"><b>Calificación: </b><?=$res->calificacion?> de 5</small>
                                                        <small class="d-block text-muted"><?=$res->comment?></small>
                                                    </div>
                                                </div>
                                            <?php endwhile;?>

                                            <button class="btn btn-primary w-100 mt-2">Ver Todos</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>