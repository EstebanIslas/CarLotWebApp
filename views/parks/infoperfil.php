<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0">Mi Estacionamiento</h1>
                <p class="lead text-muted">Administra la información de tu perfil</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-grey py-3">
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="member-container">
                    <br><br><img src="<?=base_url?>assets/images/park_lot.jpg" class="img-fluid" alt="member 1">
                </div>
            </div>

            <div class="col-md-1"></div>

            <div class="col-md-6">
                <h3 id="colortext">Estacionamiento <b style="color:#1a1a1a">Hidalgo</b>.</h3>
                <p>Dirección: Calle #Número Col Colonia</p>
                <p>Total de cajones</p>
                <p>Horarios: Dia_Inicio - Dia_Fin De Hora_apertura a hora_cierre</p>
                <p>Descripcion</p>
                <p>Tarifa general</p>
                <a class="btn btn-primary w-100 mt-2" href="<?=base_url?>parks/actualizar">Actualizar Información</a>
            </div>
        </div>
    </div>
</section>

<section class="bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 my-3">
                <div class="card rounded-0">
                    <div class="card-header bg-light">
                        <h6 class="font-weight-bold mb-0">Visitas semanales</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 my-3">
                <div class="card rounded-0 mt-3">
                    <div class="card-header bg-light">
                        <h6 class="font-weight-bold mb-0">Ingresos</h6>
                    </div>
                    <div class="card-body ">
                        <h3 class="font-weight-bold">$1,500</h3>
                        <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle mr-2 lead"></i>Semana 1</h6>

                        <h3 class="font-weight-bold">$2,320</h3>
                        <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle mr-2 lead"></i>Semana 2</h6>

                        <h3 class="font-weight-bold">$1,500</h3>
                        <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle mr-2 lead"></i>Semana 3</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-3">
    <div class="container">
        <p class="lead text-muted font-weight-bold" id="colortext">Servicios de mi Estacionamiento</p>
        <div class="card rounded-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 d-flex stat my-3">
                        <div class="mx-auto">
                            <h3 class="font-weight-bold">Servicio 1</h3>
                            <h6 class="text-mutted">Costo del Servicio</h6>
                            <h6 class="text-mutted">Breve Descripcion</h6>
                            <a class="btn btn-primary w-100 mt-2" href="">Editar</a>
                        </div>
                    </div>
                    <div class="col-lg-3 d-flex stat my-3">
                        <div class="mx-auto">
                            <h3 class="font-weight-bold">Servicio 1</h3>
                            <h6 class="text-mutted">Costo del Servicio</h6>
                            <h6 class="text-mutted">Breve Descripcion</h6>
                            <a class="btn btn-primary w-100 mt-2" href="">Editar</a>
                        </div>
                    </div>
                    <div class="col-lg-3 d-flex stat my-3">
                        <div class="mx-auto">
                            <h3 class="font-weight-bold">Servicio 1</h3>
                            <h6 class="text-mutted">Costo del Servicio</h6>
                            <h6 class="text-mutted">Breve Descripcion</h6>
                            <a class="btn btn-primary w-100 mt-2" href="">Editar</a>
                        </div>
                    </div>
                    <div class="col-lg-3 d-flex stat my-3">
                        <div class="mx-auto">
                            <h3 class="font-weight-bold">Servicio 1</h3>
                            <h6 class="text-mutted">Costo del Servicio</h6>
                            <h6 class="text-mutted">Breve Descripcion</h6>
                            <a class="btn btn-primary w-100 mt-2" href="">Editar</a>
                        </div>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-grey py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <p class="lead text-muted font-weight-bold" id="colortext">Tarifas</p>
            </div>
            <div class="col-lg-3 d-flex">
                <a class="btn btn-primary w-100 mt-2 " href="<?=base_url?>tarifas/registro">Crear Nueva Tarifa</a>
            </div>
        </div>
        <div class="card rounded-0 mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 d-flex stat my-3">
                        <div class="mx-auto">
                            <h6 class="text-mutted">Tarifa <b id="colortext">Nombre</b></h6>
                            <h3 class="font-weight-bold">$45.00</h3>
                            <a class="btn btn-primary w-100 mt-2" href="<?=base_url?>tarifas/registro">Editar</a>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex stat my-3">
                        <div class="mx-auto">
                            <h6 class="text-mutted">Tarifa <b id="colortext">Nombre</b></h6>
                            <h3 class="font-weight-bold">$45.00</h3>
                            <a class="btn btn-primary w-100 mt-2" href="<?=base_url?>tarifas/registro">Editar</a>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex stat my-3">
                        <div class="mx-auto">
                            <h6 class="text-mutted">Tarifa <b id="colortext">Nombre</b></h6>
                            <h3 class="font-weight-bold">$45.00</h3>
                            <a class="btn btn-primary w-100 mt-2" href="<?=base_url?>tarifas/registro">Editar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

