<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
    <div class="container alert alert-success" role="alert">Tarifa registrada con éxito!
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <div class="container alert alert-danger" role="alert">Error al registrar, verifica tu información!
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
<?php endif;?>
<?php Utils::deleteSession('register') #Borrar sesión de save?>

<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <?php if(isset($edit) && isset($update) && is_object($update)):?>
                    <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0">Tarifas de <b style="color: #f47c04 ;"><?=$update->tipo_car?></b></h1>
                    <p class="lead text-muted">Crea una tarifa para tu estacionamiento</p>
                    <?php $url_action = base_url."tarifas/save&id=".$update->id;?>
                
                <?php else:?>
                    <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0">Tarifas de mi estacionamiento</h1>
                    <p class="lead text-muted">Crea una tarifa para tu estacionamiento</p>
                    <?php $url_action = base_url."tarifas/save";?>
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
                <label for="tipo_car">Tipos de Automóviles:</label>
                <input type="text" class="form-control" name="tipo_car"
                pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{5,30}" value= "<?=isset($update) && is_object($update) ? $update->tipo_car : ''; ?>">
                <small id="" class="form-text text-muted">Ingresa el tipo de automóvil que seguirá esta tarifa</small>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <input type="text" class="form-control" name="descripcion"
                pattern="[a-zA-ZáéíóúÁÉÍÓÚ ,.'-]{5,200}" value= "<?=isset($update) && is_object($update) ? $update->descripcion : '';?>">
                
            </div>
            <div class="form-group">
                <label for="tarifa">Costo:</label>
                <input type="number" class="form-control" name="tarifa"
                pattern="[0-9,.]{1,3}" value= "<?=isset($update) && is_object($update) ? $update->tarifa : '';?>">
            </div>
            <input type="submit" class="btn btn-primary" value="Registrar">
            </form>
        </div>
    </div>
</div>

