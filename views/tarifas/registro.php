<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
    <div class="container alert alert-success" role="alert">Tarifa registrada con éxito!</div>
<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <div class="container alert alert-danger" role="alert">Error al registrar, verifica tu información!</div>
<?php endif;?>

<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0">Tarifas de mi estacionamiento</h1>
                <p class="lead text-muted">Crea una tarifa para tu estacionamiento</p>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class ="col-lg-9">
            <form action="<?=base_url?>tarifas/save" method="POST">
            <div class="form-group">
                <label for="tipo_car">Tipos de Automóviles:</label>
                <input type="text" class="form-control" name="tipo_car">
                <small id="" class="form-text text-muted">Ingresa el tipo de automóvil que seguirá esta tarifa</small>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <input type="text" class="form-control" name="descripcion">
            </div>
            <div class="form-group">
                <label for="tarifa">Costo:</label>
                <input type="number" class="form-control" name="tarifa">
            </div>
            <input type="submit" class="btn btn-primary" value="Registrar">
            </form>
        </div>
    </div>
</div>

