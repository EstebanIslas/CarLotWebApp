<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0">Reservas</h1>
                <p class="lead text-muted">Administra las reservas en tu negocio</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-grey py-3 mb-5">
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
                            <td>$15.5</td>
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
                            <td><?=$inp->tiempo?></td>
                        </tr>
                    <?php endif;?>
                <?php endwhile;?>
            </tbody>
        </table>
    </div>
</section>

<section class="py-3">
    <div class="container">
        <p class="lead text-muted font-weight-bold" id="colortext">Peticiones de lugares</p>
        <div class="row">
            <div class="col-lg-10 d-flex">
                <table class="table">
                <thead class="bg-primary" style="color: #FFFFFF">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Automovil</th>
                    <th scope="col">Aceptar Solicitud</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>
                    <button type="button" class="btn btn-success mr-3">Aceptar</button>
                    <button type="button" class="btn btn-danger">Rechazar</button>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>
                        <button type="button" class="btn btn-success mr-3">Aceptar</button>
                        <button type="button" class="btn btn-danger">Rechazar</button>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>
                        <button type="button" class="btn btn-success mr-3">Aceptar</button>
                        <button type="button" class="btn btn-danger">Rechazar</button>
                    </td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</section>