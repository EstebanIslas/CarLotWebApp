<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0">Consulta la información de <b id="colortext"><?=isset($servicio) && is_object($servicio) ? $servicio->nombre : '';?></b></h1>
                <p class="lead text-muted">Consulta la información de los servicios que solicitaste</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-mix py-4">
    <div class="container">

        <div class="card mb-2 rounded-0 text-center" style="width: 60rem; margin:auto auto;">
            <div class="card-header text-center">Historial de Servicios</div>
            <div class="card-body text-dark">
                <table class="table">
                    <thead class="bg-grey text-dark">
                        <tr class="text-center">
                            <th scope="col">Matricula</th> 
                            <th scope="col">Usuario</th> 
                            <th scope="col">Hora de arrivo</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Costo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($get = $info->fetch_object()):?>
                            <tr class="text-center">
                            
                                
                                <th scope="row"><small class="form-text text-dark"><?=$get->matricula?></small></th>
                                <td><?=$get->nombre?> <?=$get->apellido?></td>
                                <td><?=$get->hora_arrivo?></td>
                                <td><?=$get->estado?></td>
                                <td><?=$get->costo?></td>
                                
                            <tr>
                        <?php endwhile?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>