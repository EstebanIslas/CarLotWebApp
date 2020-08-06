<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <?php if(isset($edit) && isset($update) && is_object($update)):?>
                    <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0">Automóvil<b style="color: #f47c04 ;"><?=$update->marca?></b></h1>
                    <p class="lead text-muted">Actualiza la información de tu vehículo</p>
                    <?php $url_action = base_url."Cars/save&id=".$update->id;?>
                
                <?php else:?>
                    <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0">Añadir nuevo automóvil</h1>
                    <p class="lead text-muted">Añade un nuevo vehículo a tu colección</p>
                    <?php $url_action = base_url."Cars/save";?>
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
                <label for="tipo_car">Marca:</label>
                <input type="text" class="form-control" name="marca"
                pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{5,30}"
                value= "<?=isset($update) && is_object($update) ? $update->marca : ''; ?>" required>
                <small id="" class="form-text text-muted">Ingresa la marca de tu automóvil</small>
            </div>
            <div class="form-group">
                <label for="tipo_car">Color:</label>
                <input type="text" class="form-control" name="color"
                pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{4,30}"
                value= "<?=isset($update) && is_object($update) ? $update->color : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="tipo_car">Matricula:</label>
                <input type="text" class="form-control" name="matricula"
                value= "<?=isset($update) && is_object($update) ? $update->matricula : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <input type="text" class="form-control" name="descripcion"
                pattern="[a-zA-ZáéíóúÁÉÍÓÚ ,.'-]{5,150}"
                value= "<?=isset($update) && is_object($update) ? $update->descripcion : ''; ?>" required>
                
            </div>
            
            <input type="submit" class="btn btn-primary" value="Registrar">
            </form>
        </div>
    </div>
</div>

