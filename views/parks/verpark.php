<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0"><?=isset($update) && is_object($update) ? $update->nombre_park : ''; ?></h1>
                <p class="lead text-muted">En esta sección puedes consultar la información de este estacionamiento</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-mix py-3">

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="text-center">
                    <img src="<?=isset($update) && is_object($update) ? $update->image : ''; ?>" class="avatar" style="height: 12rem; width: 20rem">
                </div></hr><br>


                <ul class="list-group ml-3"  style="width: 20rem">
                    <li class="list-group-item font-weight-bold text-center">Actividad <i class="fa fa-dashboard fa-1x"></i></li>
                    <li class="list-group-item d-flex justify-content-between align-items-center font-weigth-bold">Comentarios:
                        <span class="badge badge-warning badge-pill"><?=isset($commits) && is_object($commits) ? $commits->total : '0'; ?></span></li>
                        
                    <li class="list-group-item d-flex justify-content-between align-items-center font-weigth-bold">Calificación
                        <span class="badge badge-warning badge-pill"><?=isset($puntuation) && is_object($puntuation) ? $res = (int)$puntuation->calificacion : '0'; ?> de 5</span></li>

                    <li class="list-group-item d-flex justify-content-between align-items-center font-weigth-bold">Reservas:
                        <span class="badge badge-warning badge-pill"><?=isset($reserv) && is_object($reserv) ? $reserv->total : '0'; ?></span></li>
                </ul> 
            </div>

            <div class ="col-lg-8">
                <div class="tab-pane active">
                    <h5 class="card-title mt-3">Estacionamiento <?=isset($update) && is_object($update) ? $update->nombre_park : ''; ?></h5>
                    <p class="card-text mb-0">
                        Calle <?=isset($update) && is_object($update) ? $update->calle : ''; ?> 
                        #<?=isset($update) && is_object($update) ? $update->numero_ext : ''; ?>, 
                        Colonia <?=isset($update) && is_object($update) ? $update->colonia : ''; ?>
                    </p>
                    <p class="card-text">Tarifa más común: 
                        <b class="text-success font-weight-bold">$<?=isset($update) && is_object($update) ? $update->tarifa : ''; ?></b>
                    </p>
                    <p class="card-text text-justify mr-4">Descripcion<br><?=isset($update) && is_object($update) ? $update->descripcion : ''; ?></p>
                    <p class="card-text">Horarios<br>
                    De <?=isset($update) && is_object($update) ? $update->hora_apertura : ''; ?> a <?=isset($update) && is_object($update) ? $update->hora_cierre : ''; ?><br>
                    Los días: <?=isset($update) && is_object($update) ? $update->dia_ini : ''; ?> a <?=isset($update) && is_object($update) ? $update->dia_fin : ''; ?></p>
                    <p class="card-text mb-3">Número total de espacios: <b id="colortext"><?=isset($update) && is_object($update) ? $update->stock : ''; ?></b></p>
                    <!--a class="btn btn-primary w-100 mt-2" href="">Realizar Reserva</a-->
                    <!-- Button trigger modal -->
                    <?php if (isset($_SESSION['cars_existencia']) && $_SESSION['cars_existencia'] == 'existe'): ?>
                        <button type="button" class="btn btn-primary w-100 mt-2" data-toggle="modal" data-target="#staticBackdrop">
                        Realizar Reserva
                        </button>
                    <?php elseif (isset($_SESSION['cars_existencia']) && $_SESSION['cars_existencia'] == 'no_existe'): ?>
                        <div class="alert alert-danger" role="alert">
                            Necesitas al menos un automóvil registrado para poder reservar!
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>

</section>




<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="staticBackdropLabel">Reservar un Lugar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=base_url?>reservas/insertar_reserva" method="POST">
            
            <div class="form-group">
                <label for="tipo_car" id="colortext" class="font-weight-bold"><?=isset($update) && is_object($update) ? $update->nombre_park : '';?></label>
                <input type="hidden" class="form-control mb-0" name="id_park"
                value= "<?=isset($update) && is_object($update) ? $update->id : '';?>">
                <small id="" class="form-text text-muted">Se enviará una peticion de aceptación a este estacionamiento</small>
            </div>
            <div class="form-group">
                <label for="hra_arrivo">Hora de arrivo:</label>
                <input type="time" class="form-control" name="hra_arrivo" placeholder="Hora de apertura" required>
                <small id="" class="form-text text-muted">Ingresa la hora de arrivo al estacionamiento</small>
            </div>
            <!--div class="form-group">
                <label for="tipo_car">Automovil:</label>
                <input type="text" class="form-control" name="matricula">
            </div-->
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary" value="Reservar ahora">
      </div>
      </form>
    </div>
  </div>
</div>

<section class="py-3 bg-grey">
    <div class="container">
        <div class="mb-2 text-center">
            <p class="lead text-muted text-center font-weight-bold" id="colortext">Servicios que ofrece este estacionamiento</p>
        </div>
        <div class="card rounded-0">
            <div class="card-body">
                <div class="row">
                    <?php while($ser = $services->fetch_object()):?>
                        <div class="col-lg-4 d-flex stat my-3 text-center">
                            <div class="mx-auto text-center">
                                <h3 class="font-weight-bold"><?=$ser->nombre?></h3>
                                <h6 class="text-mutted">Costo: <b class="text-success font-weight-bold">$<?=$ser->costo?></b></h6>
                                <h6 class="text-mutted"><?=$ser->descripcion?></h6>
                                
                                <a href="<?=base_url?>servicios/solicitud&id=<?=$ser->id?>" class="btn btn-primary">Solicitar Servicio</a>
                            </div>
                        </div>
                    <?php endwhile;?>
                        
                </div>
            </div>
        </div>
    </div>
</section>