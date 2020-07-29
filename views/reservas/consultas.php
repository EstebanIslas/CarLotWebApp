<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0">Entradas, Salidas y Reservas</h1>
                <p class="lead text-muted">Administra las reservas en tu negocio</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-grey">
    <div class="container">

        <div class="row">
            <div class="col-lg-9 mt-4">
                <p class="lead text-muted font-weight-bold" style="color: #1a1a1a">Conoce los ingresos que recibiste por reservas</p>
            </div>
            <div class="col-lg-3 d-flex mt-3">    
                <a class="btn btn-primary w-100 align-self-center" target="_blank" href="<?=base_url?>reportes/reservas">Consultar Ganancias Por Reservas</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 my-3">
                <div class="card rounded-0">
                    <div class="card-header bg-light text-center">
                        <!--Validación de consulta en save()-->
                        <?php if (isset($_SESSION['res_status']) && $_SESSION['res_status'] == 'complete'): ?>
                            <div class="container alert alert-success" role="alert">Reserva actualizada!
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                        <?php elseif (isset($_SESSION['res_status']) && $_SESSION['res_status'] == 'failed'): ?>
                            <div class="container alert alert-danger" role="alert">Error al actualizar el entrada!
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                        <?php endif;?>
                        <?php Utils::deleteSession('res_status') #Borrar sesión de save?>


                        <h6 id="colortext" class="font-weight-bold mb-0">Solicitudes de Reserva</h6>
                        <small class="form-text text-muted mb-0">En esta sección se muestran las peticiones de usuarios</small>
                    </div>
                    <div class="card-body">

                        <table class="table">
                        <thead class="bg-primary" style="color: #FFFFFF">
                            <tr class="text-center">
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Hora de arrivo</th>
                                <th scope="col">Aceptar Solicitud</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($status = $get_status->fetch_object()):?>
                                <tr class="text-center">
                                
                                    <?php if($status->estado == "En curso"):?>
                                        <th scope="row"><?=$status->nombre?></th>
                                        <td><?=$status->apellido?></td>
                                        <td><?=$status->hra_arrivo?></td>
                                        <td class="text-center">
                                            <a class="btn btn-success mb-1" href="<?=base_url?>reservas/update_on&id=<?=$status->id?>&estado=Aceptada">Aceptar Solicitud</a><br>
                                            <a class="btn btn-danger" href="<?=base_url?>reservas/update_on&id=<?=$status->id?>&estado=Rechazada">Rechazar Solicitud</a>
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
                        <h6 id="colortext" class="font-weight-bold mb-0">Reservas Pagadas</h6>
                        <small class="form-text text-muted mb-0">En esta sección debes agregar a un cajon los usuarios que pagaron su reserva</small>
                    </div>
                    <div class="card-body ">
                    <table class="table">
                        <thead class="bg-primary" style="color: #FFFFFF">
                            <tr class="text-center">
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Hora de arrivo</th>
                                <th scope="col">Insertar Entrada</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($status = $get_success->fetch_object()):?>
                                <tr class="text-center">
                                
                                    <?php if($status->estado == "Pagada"):?>
                                        <th scope="row"><?=$status->nombre?></th>
                                        <td><?=$status->apellido?></td>
                                        <td><?=$status->hra_arrivo?></td>
                                        <td class="text-center">
                                            <a class="btn btn-success h-100" href="<?=base_url?>reservas/addinput&id=<?=$status->id?>">Asignar cajón</a>
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

<section class="bg-grey py-3 mb-0">
    <?php while($stock = $stock_available->fetch_object()):?>
        <div class="row">
            <div class="col-lg-9">
                <h3 style="color: #1a1a1a;" class="font-weight-bold mb-2 ml-3">Cajones Disponibles</h3>
                <p class="lead font-weight-bold ml-3">
                    <?php if($stock->lugares_disponibles == Null):?>
                        <b id="colortext"><?=$_SESSION['estacionamiento']->stock?></b>
                    <?php else:?>
                        <b id="colortext"><?=$stock->lugares_disponibles?></b>
                    <?php endif;?>
                </p>
            </div>
    <?php endwhile;?>
            <!--div class="col-lg-3 d-flex">
                <a class="btn btn-primary mt-2" style="height:40px;" href="<!?=base_url?>reservas/addinput">Insertar entrada de automóvil</a>
            </div-->
        </div>
    <div class="container">
        <p class="lead text-muted font-weight-bold" style="color: #1a1a1a">Cajones el día de hoy</p>
        
        
        <!--Validación de consulta en save()-->
        <?php if (isset($_SESSION['updated_input']) && $_SESSION['updated_input'] == 'complete'): ?>
            <div class="container alert alert-success" role="alert">Entrada actualizada!
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php elseif (isset($_SESSION['updated_input']) && $_SESSION['updated_input'] == 'failed'): ?>
            <div class="container alert alert-danger" role="alert">Error al actualizar el entrada!
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php endif;?>
        <?php Utils::deleteSession('updated_input') #Borrar sesión de save?>

        <?php if (isset($_SESSION['save_in']) && $_SESSION['save_in'] == 'complete'): ?>
            <div class="container alert alert-success" role="alert">Ingreso de entrada exitoso!
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php elseif (isset($_SESSION['save_in']) && $_SESSION['save_in'] == 'failed'): ?>
            <div class="container alert alert-danger" role="alert">Error al ingresar entrada!
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php endif;?>
        <?php Utils::deleteSession('save_in') #Borrar sesión de save?>

        <table class="table">
            <thead class="bg-primary" style="color: #FFFFFF">
                <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Placa de Automovil</th>
                <th scope="col">Estado</th>
                <th scope="col">Tiempo</th>
                <th scope="col">Tarifa</th>
                <th scope="col">Monto a Pagar</th>
                <th scope="col">Terminar</th>
                </tr>
            </thead>
            <tbody>
                <?php while($inp = $get_inputs->fetch_object()):?>
                    <?php if($inp->estado == 1):?>
                        <tr>
                            <th scope="row"><?=$inp->nombre?> <?=$inp->apellido?></th>
                            <td><?=$inp->matricula?></td>
                            <?php $time = (int) $inp->horas; ?>
                            <td>En curso</td>
                            <td><?=$time +=1;?> horas</td>
                            <td>$<?=$inp->tarifa_cobrada?></td>
                            <?php
                                $tarifa = (int)$inp->tarifa_cobrada;
                                $total = $time * $tarifa;
                                $total -= 10;
                            ?>
                            <td>$<?=$total?></td>
                            <td>
                            <a class="btn btn-success mt-1" href="<?=base_url?>reservas/save_input&id=<?=$inp->id?>">Finalizar entrada</a>
                            </td>
                        </tr>
                    <?php endif;?>
                <?php endwhile;?>
            </tbody>
        </table>
    </div>
</section>


<section class="bg-grey py-3 mb-5">
    <div class="container">
        <div class="row">
                <div class="col-lg-9">
                <p class="lead text-muted font-weight-bold" style="color: #1a1a1a">Historial de entradas y salidas</p>
                </div>
                <div class="col-lg-3 d-flex mb-4">
                    <a class="btn btn-primary w-100 align-self-center" target="_blank" href="<?=base_url?>reportes/index">Consultar Ganancias Por Entradas</a>
                </div>
        </div>
        
        <p class="form-text text-muted mb-3 text-center">En esta sección se muestra el historial de entradas y salidas restando el costo por la reserva realizada $10.00 MNX</p>

        <table class="table">
            <thead class="bg-primary" style="color: #FFFFFF">
                <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Placa de Automovil</th>
                <th scope="col">Entrada</th>
                <th scope="col">Salida</th>
                <th scope="col">Tiempo</th>
                <th scope="col">Cobro por hora</th>
                <th scope="col">Total a pagar</th>
                </tr>
            </thead>
            <tbody>
                <?php while($inp = $get_outputs->fetch_object()):?>
                    <?php if($inp->estado == 0):?>
                        <tr>
                            <th scope="row"><?=$inp->nombre?> <?=$inp->apellido?></th>
                            <td><?=$inp->matricula?></td>
                            <td><?=$inp->entrada?></td>
                            <td><?=$inp->salida?></td>
                            <?php $tiempo = (int)$inp->tiempo;?>
                            <td><?=$tiempo += 1;?> horas</td>
                            <td><?=$inp->tarifa_cobrada?></td>
                            <?php 
                                $time = (int)$inp->tiempo;
                                $time += 1;
                                $costo = (int)$inp->tarifa_cobrada;
                                $total = $time * $costo;
                                $total -= 10;
                            ?>
                            <td>$<?=$total?></td>
                        </tr>
                    <?php endif;?>
                <?php endwhile;?>
            </tbody>
        </table>
    </div>
</section>