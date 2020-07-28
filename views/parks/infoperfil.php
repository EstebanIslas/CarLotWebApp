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

<section class="bg-mix py-3">

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="text-center">
                    <img src="<?=$_SESSION['estacionamiento']->image?>" class="avatar" style="height: 12rem; width: 20rem">
                </div></hr><br>


                <ul class="list-group ml-3"  style="width: 20rem">
                    <li class="list-group-item font-weight-bold text-center">Actividad <i class="fa fa-dashboard fa-1x"></i></li>
                    <li class="list-group-item d-flex justify-content-between align-items-center font-weigth-bold">Comentarios:
                        
                        <?php if (isset($_SESSION['tot_comments']) && $_SESSION['tot_comments'] == 'existe'): ?>
                            <?php while($com = $comments->fetch_object()):?>
                                <span class="badge badge-warning badge-pill"><?=$var=(int)$com->total;?></span></li>
                            <?php endwhile;?>
                        <?php elseif (isset($_SESSION['tot_comments']) && $_SESSION['tot_comments'] == 'no_existe'): ?>
                            <span class="badge badge-warning badge-pill">0</span></li>
                        <?php endif;?>

                    <li class="list-group-item d-flex justify-content-between align-items-center font-weigth-bold">Calificación
                        <?php if (isset($_SESSION['calificacion']) && $_SESSION['calificacion'] == 'existe'): ?>
                            <?php while($cal = $calificacion->fetch_object()):?>
                                <span class="badge badge-warning badge-pill"><?=$var=(int)$cal->calificacion;?> de 5</span></li>
                            <?php endwhile;?>
                        <?php elseif (isset($_SESSION['calificacion']) && $_SESSION['calificacion'] == 'no_existe'): ?>
                            <span class="badge badge-warning badge-pill">0</span></li>
                        <?php endif;?>

                    <li class="list-group-item d-flex justify-content-between align-items-center font-weigth-bold">Reservas:
                        <?php if (isset($_SESSION['tot_reservas']) && $_SESSION['tot_reservas'] == 'existe'): ?>
                            <?php while($rese = $reservas->fetch_object()):?>
                                <span class="badge badge-warning badge-pill"><?=$var=(int)$rese->total;?></span></li>
                            <?php endwhile;?>
                        <?php elseif (isset($_SESSION['tot_reservas']) && $_SESSION['tot_reservas'] == 'no_existe'): ?>
                            <span class="badge badge-warning badge-pill">0</span></li>
                        <?php endif;?>
                </ul> 
            </div>

            <div class ="col-lg-8">
                <div class="tab-pane active">
                    <h3 id="colortext">Estacionamiento <b style="color:#1a1a1a"><?=$_SESSION['estacionamiento']->nombre_park;?></b>.</h3>
                    <p class="card-text mb-0">Calle <?=$_SESSION['estacionamiento']->calle;?> #<?=$_SESSION['estacionamiento']->numero_ext;?>, Colonia <?=$_SESSION['estacionamiento']->colonia;?></p>
                    <p class="card-text">Tarifa más común: <b class="text-success font-weight-bold">$<?=$_SESSION['estacionamiento']->tarifa;?></b></p>
                    <p class="card-text">Descripcion<br><?=$_SESSION['estacionamiento']->descripcion;?></p>
                    <p class="card-text">Horarios
                        <br>De: <?=$_SESSION['estacionamiento']->hora_apertura;?> a <?=$_SESSION['estacionamiento']->hora_cierre;?>
                        <br>Los días: <?=$_SESSION['estacionamiento']->dia_ini;?> - <?=$_SESSION['estacionamiento']->dia_fin;?>
                    </p>
                    <p class="card-text mb-3">Número total de espacios: <b id="colortext"><?=$_SESSION['estacionamiento']->stock;?></b></p>
                    <a class="btn btn-primary w-100 mt-2" href="<?=base_url?>parks/update&id=<?=$_SESSION['estacionamiento']->id?>">Actualizar Información</a>
                </div>
            </div>
        </div><br><br>
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
                        <h3 class="font-weight-bold">$350</h3>
                        <h6 class="text-success"><i class="icon ion-md-cash mr-2 lead"></i>Mes <b id="colortext">Abril</b></h6>

                        <h3 class="font-weight-bold">$400</h3>
                        <h6 class="text-success"><i class="icon ion-md-cash mr-2 lead"></i>Mes <b id="colortext">Mayo</b></h6>

                        <h3 class="font-weight-bold">$325</h3>
                        <h6 class="text-success"><i class="icon ion-md-cash mr-2 lead"></i>Mes <b id="colortext">Julio</b></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-3">
    <div class="container">
        <!--Validación de consulta en save()-->
        <?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
            <div class="container alert alert-success" role="alert">Servicio eliminado con éxito!
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'): ?>
            <div class="container alert alert-danger" role="alert">Error al eliminar el servicio!
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php endif;?>
        <?php Utils::deleteSession('delete') #Borrar sesión de save?>

        <div class="row mb-3">
            <div class="col-lg-9">
                <p class="lead text-muted font-weight-bold" id="colortext">Servicios de mi Estacionamiento</p>
            </div>
            <div class="col-lg-3 d-flex">
                <a class="btn btn-primary w-100 mt-2 " href="<?=base_url?>servicios/registro">Crear Nuevo Servicio</a>
            </div>
        </div>
        <div class="card rounded-0">
            <div class="card-body">
                <div class="row">
                    <?php while($res = $get_servicios->fetch_object()):?>
                        <div class="col-lg-3 d-flex stat my-3">
                            <div class="mx-auto">
                                <h3 class="font-weight-bold"><?=$res->nombre?></h3>
                                <h6 class="text-mutted">$<?=$res->costo?></h6>
                                <h6 class="text-mutted"><?=$res->descripcion?></h6>
                                <a class="btn btn-primary w-100 mt-2" href="<?=base_url?>servicios/update&id=<?=$res->id?>">Administrar</a>
                                <a class="btn btn-danger w-100 mt-2" href="<?=base_url?>servicios/drop&id=<?=$res->id?>">Eliminar</a>
                            </div>
                        </div>
                    <?php endwhile;?>
                        
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-grey py-3">
    <div class="container">
        <!--Validación de consulta en save()-->
        <?php if (isset($_SESSION['deletes']) && $_SESSION['deletes'] == 'complete'): ?>
            <div class="container alert alert-success" role="alert">Tarifa eliminada con éxito!
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php elseif (isset($_SESSION['deletes']) && $_SESSION['deletes'] == 'failed'): ?>
            <div class="container alert alert-danger" role="alert">Error al eliminar la tarifa!
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php endif;?>
        <?php Utils::deleteSession('deletes') #Borrar sesión de save?>


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
                    <?php while($tar = $get_tarifas->fetch_object()):?>
                        <div class="col-lg-4 d-flex stat my-3">
                            <div class="mx-auto">
                                <h6 class="text-mutted">Tarifa <b id="colortext"><?=$tar->tipo_car;?></b></h6>
                                <h3 class="font-weight-bold">$<?=$tar->tarifa;?></h3>
                                <h6 class="font-weight-light"><?=$tar->descripcion;?></h3>
                                <a class="btn btn-primary w-100 mt-2" href="<?=base_url?>tarifas/update&id=<?=$tar->id?>">Administrar</a>
                                <a class="btn btn-danger w-100 mt-2" href="<?=base_url?>tarifas/drop&id=<?=$tar->id?>">Eliminar</a>
                            </div>
                    </div>
                    <?php endwhile;?>
                </div>
            </div>
        </div>
    </div>
</section>

