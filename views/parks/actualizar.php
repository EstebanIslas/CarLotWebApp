
<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0">Actualizar mi información</h1>
                <p class="lead text-muted">Actualiza la información de tu estacionamiento</p>
            </div>
        </div>
    </div>
</section>

<?php if(isset($edit) && isset($update) && is_object($update)):?>
    <?php $url_action = base_url."Parks/save_up&id=".$update->id;?>    
<?php endif;?>

<div class="container">
    <div class="row">
        <div class ="col-lg-9">
            <form action="<?=$url_action?>" method="POST">
            <div class="form-group">
                <label for="nombre_park">Nombre de Estacionamiento:</label>
                <input type="text" class="form-control" name="nombre_park"
                pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{5,30}" placeholder="Nombre de estacionamiento"
                value= "<?=isset($update) && is_object($update) ? $update->nombre_park : ''; ?>">
                <!--small id="" class="form-text text-muted">Ingresa el tipo de automóvil que seguirá esta tarifa</small-->
            </div>

            <div class="form-group">
                <label for="">Dirección:</label>
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="calle" placeholder="Calle"
                        value= "<?=isset($update) && is_object($update) ? $update->calle : ''; ?>" required>
                    </div>
                    <div class="col-md-4">
                        <input type="number" class="form-control" name="numero_ext" placeholder="Numero"
                        value= "<?=isset($update) && is_object($update) ? $update->numero_ext : ''; ?>" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="colonia" placeholder="Colonia"
                        value= "<?=isset($update) && is_object($update) ? $update->colonia : ''; ?>" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="tarifa">Número de cajones:</label>
                <input type="number" class="form-control" name="stock" placeholder = "Número de cajones"
                pattern="[0-9,.]{1,3}" value= "<?=isset($update) && is_object($update) ? $update->stock : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="">Días de trabajo:</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="dia_ini" placeholder="Día de apertura"
                        value= "<?=isset($update) && is_object($update) ? $update->dia_ini : ''; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="dia_fin" placeholder="Día de cierre"
                        value= "<?=isset($update) && is_object($update) ? $update->dia_fin : ''; ?>" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Horario de trabajo:</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="time" class="form-control" name="hora_apertura" placeholder="Hora de apertura"
                        value= "<?=isset($update) && is_object($update) ? $update->hora_apertura : ''; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <input type="time" class="form-control" name="hora_cierre" placeholder="Hora de cierre"
                        value= "<?=isset($update) && is_object($update) ? $update->hora_cierre : ''; ?>" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="tarifa">Tarifa General:</label>
                <input type="number" class="form-control" name="tarifa" placeholder = "Tarifa general"
                pattern="[0-9,.]{1,3}" value= "<?=isset($update) && is_object($update) ? $update->tarifa : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="tarifa">Descripción:</label>
                <input type="text" class="form-control" name="descripcion" placeholder = "Descripción"
                value= "<?=isset($update) && is_object($update) ? $update->descripcion : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="">Ubicación:</label>
                <div class="row">
                    <div class="col-md-5">
                        <a href="https://www.google.com.mx/maps/@20.0864667,-98.366106,15.58z" class="btn btn-primary w-100">Copiar mi ubicación</a>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="longitud" placeholder="Longitud"
                        value= "<?=isset($update) && is_object($update) ? $update->longitud : ''; ?>" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="latitud" placeholder="Latitud"
                        value= "<?=isset($update) && is_object($update) ? $update->latitud : ''; ?>" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="image">Imagen:</label>
                <!--input type="file" class="form-control" name="image" accept="image/*" placeholder = "Imagen"-->
                <input type="text" class="form-control" name="image" placeholder = "Imagen Url"
                value= "<?=isset($update) && is_object($update) ? $update->image : ''; ?>" required>
                <small id="" class="form-text text-muted">Copia y pega la url de la imagen que deseas insertar</small>
            </div>


            <input type="submit" class="btn btn-primary w-100 mt-2" value="Actualizar mi info">
            </form>
        </div>
    </div>
</div>