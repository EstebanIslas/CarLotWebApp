
<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
            
                <?php if(isset($edit) && isset($update) && is_object($update)):?>
                
                    <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0">Servicio <b style="color: #f47c04 ;"><?=$update->nombre?></b></h1>
                    <p class="lead text-muted">Edita la información de este servicio</p>
                    <?php $url_action = base_url."servicios/save&id=".$update->id;?>

                <?php else:?>
                    <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0">Servicios en mi estacionamiento</h1>
                    <p class="lead text-muted">Crea un servicio para tu estacionamiento</p>
                    <?php $url_action = base_url."servicios/save";?>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class ="col-lg-9">
            <form action="<?=$url_action?>" method="POST">
            <div class="form-group">
                <label for="tipo_car">Nombre del servicio:</label>
                <input type="text" class="form-control" name="nombre"
                pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{5,30}" value= "<?=isset($update) && is_object($update) ? $update->nombre : '';?>" required>
                <small id="" class="form-text text-muted">Ingresa el nombre del servicio con el que cuenta tu estacionamiento</small>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <input type="text" class="form-control" name="descripcion"
                pattern="[a-zA-ZáéíóúÁÉÍÓÚ ,.'-]{5,65}" value= "<?=isset($update) && is_object($update) ? $update->descripcion : '';?>" required>
                
            </div>
            <div class="form-group">
                <label for="tarifa">Costo:</label>
                <input type="number" class="form-control" name="costo"
                pattern="[0-9,.]{1,3}" value= "<?=isset($update) && is_object($update) ? $update->costo : '';?>" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Guardar">
            </form>
        </div>
    </div>
</div>

