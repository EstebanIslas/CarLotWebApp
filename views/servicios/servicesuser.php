<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0">Servicios Realizados</h1>
                <p class="lead text-muted">Consulta la información de los servicios que solicitaste</p>
            </div>
        </div>
    </div>
</section>

<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
    <div class="container alert alert-success" role="alert">Servicio solicitado con éxito!
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <div class="container alert alert-danger" role="alert">Error al registrar, verifica tu información!
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
<?php endif;?>
<?php Utils::deleteSession('register') #Borrar sesión de save?>

<?php if (isset($_SESSION['res_status']) && $_SESSION['res_status'] == 'complete'): ?>
    <div class="container alert alert-success" role="alert">Servicio actualizado con éxito!
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
<?php elseif (isset($_SESSION['res_status']) && $_SESSION['res_status'] == 'failed'): ?>
    <div class="container alert alert-danger" role="alert">Error al registrar, verifica tu información!
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
<?php endif;?>
<?php Utils::deleteSession('res_status') #Borrar sesión de save?>

<section class="bg-mix py-4">
    <div class="container">

        <div class="card mb-3 rounded-0 text-center" style="width: 50rem; margin:auto auto;">
            <div class="card-header text-center">Servicio actual</div>
            <div class="card-body text-dark">
                <?php if (isset($_SESSION['services_curr']) && $_SESSION['services_curr'] == 'existe'): ?>
                    <?php while($serv = $services->fetch_object()):?>
                        <h4 class="card-title font-weight-bold mb-1">Servicio: <b id="colortext"><?=$serv->nombre;?></b></h4>
                        <h6 class="card-title font-weight-bold text-dark mt-0" id="colortext"><?=$serv->nombre_park;?></h6>
                        <p class="card-text mt-3 mb-2">Solicitud: <b><?=$serv->estado;?></b></p>
                        
                        <?php if($serv->estado == "En curso"):?>
                            <small id="" class="form-text text-muted mb-1 mt-0">Puedes cancelar tu solicitud mientras esté "En Curso"</small>
                            <a href="<?=base_url?>servicios/update_on&id=<?=$serv->id?>&estado=Rechazada" class="btn btn-danger mb-2">Cancelar servicio</a>
                        <?php endif;?>
                        <p class="card-text mt-1 mb-4">Hora de arrivo a estacionamiento: <?=$serv->hora_arrivo;?></b></p>
                    <?php endwhile;?>
                <?php elseif (isset($_SESSION['services_curr']) && $_SESSION['services_curr'] == 'no_existe'): ?>
                    <h5 class="card-title font-weight-bold" id="colortext">No Existen Servicios Solicitados recientes</h5>

                    <small id="" class="form-text text-muted">Solicita ahora</small>
                    <a href="<?=base_url?>persons/verparks" class="btn btn-primary">Ver Estacionamientos</a>

                    <small id="" class="form-text text-muted mt-4 mb-0">Si requeriste un servicio y al recargar la página no aparece, es por que el estacionamiento rechazo tu solicitud</small>
                <?php endif;?>

            </div>
        </div>
    </div>
</section>

<section class="bg-grey py-3 mb-5">
    <div class="container mb-5">
        <p class="lead text-muted font-weight-bold" style="color: #1a1a1a">Servicios Solicitados</p>

        <?php if (isset($_SESSION['services_rows']) && $_SESSION['services_rows'] == 'existe'): ?>
            <table class="table">
                <thead class="bg-primary" style="color: #FFFFFF">
                    <tr>
                    <th scope="col">Nombre de estacionamiento</th>
                    <th scope="col">Placa de Automovil</th>
                    <th scope="col">Entrada</th>
                    <th scope="col">Tarifa</th>
                    <th scope="col">Nombre del servicio</th>
                    <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($all = $detalles->fetch_object()):?>
                        <tr>
                            <th scope="row"><?=$all->nombre_park?></th>
                            <td><?=$all->matricula?></td>
                            <td><?=$all->hora_arrivo?></td>
                            <td><?=$all->costo?></td>
                            <td><?=$all->nombre?></td>
                            <td><?=$all->estado?></td>
                        </tr>
                    <?php endwhile;?>
                </tbody>
            </table>
        <?php elseif (isset($_SESSION['services_rows']) && $_SESSION['services_rows'] == 'no_existe'): ?>
            <div class="alert alert-success" role="alert">
                No has requerido ningún servicio a algún estacionamiento
            </div>
        <?php endif;?>

    </div>
</section>