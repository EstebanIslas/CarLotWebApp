<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0">Servicio <b style="color: #f47c04 ;"><?=isset($service) && is_object($service) ? $service->nombre : ''; ?></b></h1>
                <p class="lead text-muted">Solicita este servicio</p>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class ="col-lg-9">
            <form action="<?=base_url?>servicios/registrosolic" method="POST">
                <div class="form-group">
                    <label for="hora_arrivo">Hora de Llegada:</label>
                    <input type="time" class="form-control" name="hora_arrivo" required>
                    <small id="" class="form-text text-muted">Ingresa la hora de llegada para recibir este servicio</small>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id_servicio"
                    value="<?=isset($service) && is_object($service) ? $service->id : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="id_car">Matrícula:</label>
                    <!--?php $cars = Utils::showCars();?-->
                    <select name="id_car" class="form-control">
                        <?php while($car = $cars->fetch_object()):?>
                            <option value="<?=$car->id?>">
                                Marca: <?=$car->marca?> <?=$car->color?>, Matrícula: <?=$car->matricula?>
                            </option>
                        <?php endwhile;?>
                    </select>
                    <small id="" class="form-text text-muted">Se muestran todos los automóviles que tienes registrados</small>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" class="form-control" name="descripcion" required>
                </div>
                
                <input type="submit" class="btn btn-primary" value="Solicitar Servicio">
            </form>
        </div>
    </div>
</div>