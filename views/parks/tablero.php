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
                                            <h6 class="text-mutted">Ingresos por reservas</h6>
                                            <h3 class="font-weight-bold">$350</h3>
                                            <h6 class="text-success"><i class="icon ion-md-cash mr-2 lead"></i>Abril</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-flex stat my-3">
                                        <div class="mx-auto">
                                            <h6 class="text-mutted">Ingresos por reservas</h6>
                                            <h3 class="font-weight-bold">$400</h3>
                                            <h6 class="text-success"><i class="icon ion-md-cash mr-2 lead"></i>Mayo</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-flex my-3">
                                        <div class="mx-auto">
                                            <h6 class="text-mutted">Ingresos por reservas</h6>
                                            <h3 class="font-weight-bold">$325</h3>
                                            <h6 class="text-success"><i class="icon ion-md-cash mr-2 lead"></i>Junio</h6>
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

                                            <button type="button" class="btn btn-primary w-100 mt-2" data-toggle="modal" data-target="#exampleModalCenter">Ver Todos</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Comentarios Recientes</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php while($all = $get_all_puntuaciones->fetch_object()):?>
                                <div class="d-flex border-bottom py-2">
                                    <div class="d-flex mr-3">
                                        <h2 class="align-self-center mb-0" style="color: #f47c04;"><i class="icon ion-md-contacts mr-2 lead"></i></h2></div>
                                    <div class="align-self-center">
                                        <h6 class="d-inline-block font-weight-bold mb-0"><?=$all->nombre;?> <?=$all->apellido?></h6>
                                        <small class="d-block text-muted"><b>Calificación: </b><?=$all->calificacion?> de 5</small>
                                        <small class="d-block text-muted"><?=$all->comment?></small>
                                    </div>
                                </div>
                            <?php endwhile;?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <!--button type="button" class="btn btn-primary">Save changes</button-->
                        </div>
                        </div>
                    </div>
                    </div>
                </section>