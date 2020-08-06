<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0">Mis Servicios</h1>
                <p class="lead text-muted">Consulta la información de los servicios que administras</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-mix">
    <div class="container">
        <div class="row">
            
            <?php if (isset($_SESSION['res_status']) && $_SESSION['res_status'] == 'complete'): ?>
                <div class="container alert alert-success" role="alert">Servicio actualizado correctamente!
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            <?php elseif (isset($_SESSION['res_status']) && $_SESSION['res_status'] == 'failed'): ?>
                <div class="container alert alert-danger" role="alert">Error al actualizar servicio!
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            <?php endif;?>
            <?php Utils::deleteSession('res_status') #Borrar sesión de save?>
            
            <div class="col-lg-6 my-3">
                <div class="card rounded-0">
                    <div class="card-header bg-light text-center">

                        <h6 id="colortext" class="font-weight-bold mb-0">Solicitudes de Servicios</h6>
                        <small class="form-text text-muted mb-0">En esta sección se muestran las peticiones de usuarios, aceptala para proveer de ese servicio o rechaza para eliminar la solicitud</small>
                    
                    </div>
                    <div class="card-body">

                        <table class="table">
                        <thead class="bg-primary" style="color: #FFFFFF">
                            <tr class="text-center">
                                <th scope="col">Matricula</th>
                                <th scope="col">Hora de arrivo</th>
                                <th scope="col">Servicio</th>
                                <th scope="col">Solicitud de Servicio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($services = $servicios_status->fetch_object()):?>
                                <tr class="text-center">
                                
                                    <?php if($services->estado == "En curso"):?>
                                        <th scope="row"><small class="form-text text-dark"><?=$services->matricula;?></small></th>
                                        <td><?=$services->hora_arrivo;?></td>
                                        <td><?=$services->nombre;?></td>
                                        <td class="text-center">
                                            <a class="btn btn-success mb-1 w-100" href="<?=base_url?>Servicios/update_on&id=<?=$services->id?>&estado=Aceptada">Aceptar</a><br>
                                            <a class="btn btn-danger w-100" href="<?=base_url?>Servicios/update_on&id=<?=$services->id?>&estado=Rechazada">Rechazar</a>
                                        </td>
                                    <?php endif;?>
                                <tr>
                            <?php endwhile;?>
                        </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-6 my-3">
                <div class="card rounded-0">
                    <div class="card-header bg-light text-center">
                        <h6 id="colortext" class="font-weight-bold mb-0">Servicios Pendientes</h6>
                        <small class="form-text text-muted mb-0">En esta sección actualiza el servicio a "Pagado" cuando el cliente haya pagado presencialmente</small>
                    </div>
                    <div class="card-body ">
                        <table class="table">
                            <thead class="bg-primary" style="color: #FFFFFF">
                                <tr class="text-center">
                                    <th scope="col">Matricula</th>
                                    <th scope="col">Hora de arrivo</th>
                                    <th scope="col">Servicio</th>
                                    <th scope="col">Finalizar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($finish = $servicios_success->fetch_object()):?>
                                    <tr class="text-center">
                                    
                                        <?php if($finish->estado == "Aceptada"):?>
                                            <th scope="row"><small class="form-text text-dark"><?=$finish->matricula?></small></th>
                                            <td><?=$finish->hora_arrivo?></td>
                                            <td><?=$finish->nombre?></td>
                                            <td class="text-center">
                                                <a class="btn btn-success h-100" href="<?=base_url?>Servicios/update_on&id=<?=$finish->id?>&estado=Pagada">Finalizar</a>
                                            </td>
                                        <?php endif;?>
                                    <tr>
                                <?php endwhile;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-3 bg-grey">
    <div class="container">
        <!--Validación de consulta en save()-->
        <?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
            <div class="container alert alert-success" role="alert">Servicio registrado con éxito!
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
            <div class="container alert alert-danger" role="alert">Error al registrar, verifica tu información!
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php endif;?>
        <?php Utils::deleteSession('register') #Borrar sesión de save?>

        <!--Validación de consulta en save()-->
        <?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
            <div class="container alert alert-success" role="alert">Servicio eliminado con éxito!
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'): ?>
            <div class="container alert alert-danger" role="alert">Algunos Usuarios ya requirieron de este servicio y no lo puedes eliminar!
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php endif;?>
        <?php Utils::deleteSession('delete') #Borrar sesión de save?>

        <div class="row mb-3">
            <div class="col-lg-9">
                <p class="lead text-muted font-weight-bold" id="colortext">Servicios de mi Estacionamiento</p>
            </div>
            <div class="col-lg-3 d-flex">
                <a class="btn btn-primary w-100 mt-2 " href="<?=base_url?>Servicios/registro">Crear Nuevo Servicio</a>
            </div>
        </div>
        <div class="card rounded-0">
            <div class="card-body">
                <div class="row">
                    <?php while($res = $get_servicios->fetch_object()):?>
                        <div class="col-lg-3 d-flex stat my-3 text-center">
                            <div class="mx-auto text-center">
                                <h3 class="font-weight-bold"><?=$res->nombre?></h3>
                                <h6 class="text-mutted">$<?=$res->costo?></h6>
                                <h6 class="text-mutted"><?=$res->descripcion?></h6>
                                <a class="btn btn-primary w-100 mt-2" href="<?=base_url?>Servicios/get_one&id=<?=$res->id?>">Administrar</a>
                                <a class="btn btn-success w-100 mt-2" href="<?=base_url?>Servicios/update&id=<?=$res->id?>">Actualizar</a>
                                <a class="btn btn-danger w-100 mt-2" href="<?=base_url?>Servicios/drop&id=<?=$res->id?>">Eliminar</a>
                            </div>
                        </div>
                    <?php endwhile;?>
                        
                </div>
            </div>
        </div>
    </div>
</section>