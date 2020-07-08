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

<section class="bg-grey py-3 mb-0">
    <?php while($stock = $stock_available->fetch_object()):?>
        <div class="row">
            <div class="col-lg-9">
                <h3 style="color: #1a1a1a;" class="font-weight-bold mb-0 ml-3">Cajones Disponibles</h3>
                <p class="lead font-weight-bold ml-3">
                    <b id="colortext"><?=$stock->lugares_disponibles?></b>
                </p>
            </div>
    <?php endwhile;?>
            <div class="col-lg-3 d-flex">
                <a class="btn btn-primary mt-2" style="height:40px;" href="<?=base_url?>reservas/addinput">Insertar entrada de automóvil</a>
            </div>
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

        <table class="table">
            <thead class="bg-primary" style="color: #FFFFFF">
                <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Placa de Automovil</th>
                <th scope="col">Tiempo</th>
                <th scope="col">Estado</th>
                <th scope="col">Tarifa</th>
                <th scope="col">Terminar</th>
                </tr>
            </thead>
            <tbody>
                <?php while($inp = $get_inputs->fetch_object()):?>
                    <?php if($inp->estado == 1):?>
                        <tr>
                            <th scope="row"><?=$inp->nombre?> <?=$inp->apellido?></th>
                            <td><?=$inp->matricula?></td>
                            <td><?=$inp->horas?> horas</td>
                            <td>En curso</td>
                            <td>$<?=$inp->tarifa_cobrada?></td>
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
        <p class="lead text-muted font-weight-bold" style="color: #1a1a1a">Historial de entradas y salidas</p>

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
                            <td><?=$inp->tiempo?> horas</td>
                            <td><?=$inp->tarifa_cobrada?></td>
                            <?php 
                                $time = (int)$inp->tiempo;
                                $costo = (int)$inp->tarifa_cobrada;
                                $total = $time * $costo;
                            ?>
                            <td>$<?=$total?></td>
                        </tr>
                    <?php endif;?>
                <?php endwhile;?>
            </tbody>
        </table>
    </div>
</section>

<section class="py-3">
    <div class="container">
        
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

        <p class="lead text-muted font-weight-bold text-center" id="colortext">Peticiones de lugares</p>
        <div class="row">
            <div class="col-lg-10 d-flex" style="margin:auto auto;">
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
                            <th scope="row"><?=$status->nombre?></th>
                            <td><?=$status->apellido?></td>
                            <td><?=$status->hra_arrivo?></td>
                            <td class="text-center">
                            <a class="btn btn-success mr-3" href="<?=base_url?>reservas/update_on&id=<?=$status->id?>&estado=Aceptada">Aceptar Solicitud</a>
                            <a class="btn btn-danger mr-3" href="<?=base_url?>reservas/update_on&id=<?=$status->id?>&estado=Rechazada">Rechazar Solicitud</a>
                            </td>
                            </tr>
                        <tr>
                    <?php endwhile;?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</section>