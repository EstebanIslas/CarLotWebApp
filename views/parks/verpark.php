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
                        <span class="badge badge-warning badge-pill">14</span></li>
                        
                    <li class="list-group-item d-flex justify-content-between align-items-center font-weigth-bold">Calificación
                        <span class="badge badge-warning badge-pill">4 de 5</span></li>

                    <li class="list-group-item d-flex justify-content-between align-items-center font-weigth-bold">Reservas:
                        <span class="badge badge-warning badge-pill">10</span></li>
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
                    <button type="button" class="btn btn-primary w-100 mt-2" data-toggle="modal" data-target="#staticBackdrop">
                    Realizar Reserva
                    </button>
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
        <form action="" method="POST">
            <div class="form-group">
                <label for="tipo_car">Hora de arrivo:</label>
                <input type="text" class="form-control" name="marca"
                pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{5,30}">
                <small id="" class="form-text text-muted">Ingresa la hora</small>
            </div>
            <div class="form-group">
                <label for="tipo_car">Descripcion:</label>
                <input type="text" class="form-control" name="color"
                pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{5,30}">
            </div>
            <div class="form-group">
                <label for="tipo_car">Automovil:</label>
                <input type="text" class="form-control" name="matricula">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Reservar ahora</button>
      </div>
    </div>
  </div>
</div>