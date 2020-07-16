<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
            
                <!--?php if(isset($edit) && isset($update) && is_object($update)):?>
                
                    <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0">Servicio <b style="color: #f47c04 ;"><s?=$update->nombre?></b></h1>
                    <p class="lead text-muted">Edita la información de este servicio</p-->
                    <!--?php $url_action = base_url."servicios/save&id=".$update->id;?-->

                <!--?php else:?-->
                    <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0">Agregar automóvil a cajón </h1>
                    <p class="lead text-muted">Añade un vehículo a algún lugar disponible</p>
                    <!--?php $url_action = base_url."servicios/save";?-->
                <!--?php endif;?-->
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class ="col-lg-9">
            <form action="<?=base_url?>reservas/save_in" method="POST">
            <div class="form-group">
                <label for="id_car">Matrícula:</label>
                <!--?php $cars = Utils::showCars();?-->
                <small id="" class="form-text text-muted">Se muestran todos los automóviles de los usuarios a los que se acepto la solicitud de reserva</small>
                <select name="id_car" class="form-control">
                    <?php while($cars = $get_cars->fetch_object()):?>
                        <option value="<?=$cars->id_car?>">
                            <?=$cars->nombre?> <?=$cars->apellido?>, Matrícula: <?=$cars->matricula?>
                        </option>
                    <?php endwhile;?>
                </select>
            </div>


            <div class="form-group">
                <?php while($res = $get_reservas->fetch_object()):?>
                    <input type="hidden" class="form-control" name="id_reserva" value= "<?=$res->id_reserva?>">
                <?php endwhile;?>
            </div>
            

            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <input type="text" class="form-control" name="descripcion"
                pattern="[a-zA-ZáéíóúÁÉÍÓÚ ,.'-]{5,65}" value= "<?=isset($update) && is_object($update) ? $update->descripcion : '';?>">
                
            </div>

            <div class="form-group">
                <label for="tarifa_cobrada">Tarifa a cobrar:</label>
                <small id="" class="form-text text-muted">Se muestran todos los automóviles registrados en la aplicación y los nombre de los usuarios</small>
                <select name="tarifa_cobrada" class="form-control">
                    <?php while($tar = $get_tarifas->fetch_object()):?>
                        <option value="<?=$tar->tarifa?>">
                            <?=$tar->tipo_car?> Costo por hora: <?=$tar->tarifa?>
                        </option>
                    <?php endwhile;?>
                </select>
            </div>

            <input type="submit" class="btn btn-primary" value="Insertar Entrada">
            </form>
        </div>
    </div>
</div>

