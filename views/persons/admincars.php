<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0">Mis Automóviles</h1>
                <p class="lead text-muted">Administra la información de tus automóviles</p>
            </div>
        </div>
    </div>
</section>


<section class="bg-mix py-3">
    <div class="container">
    <!--Validaciones-->

    <?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
        <div class="container alert alert-success" role="alert">Vehículo registrado con éxito!
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
        <div class="container alert alert-danger" role="alert">Error al registrar, verifica tu información!
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    <?php endif;?>
    <?php Utils::deleteSession('register') #Borrar sesión de save?>

    <?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
        <div class="container alert alert-success" role="alert">Vehículo eliminado con éxito!
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    <?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'): ?>
        <div class="container alert alert-danger" role="alert">Error al eliminar vehículo!
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    <?php endif;?>
    <?php Utils::deleteSession('delete') #Borrar sesión de save?>

        <div class="row">
            <div class="col-lg-9">
                <p class="lead text-muted font-weight-bold" id="colortext">Mis Automóviles</p>
            </div>
            <div class="col-lg-3 d-flex">
                <a class="btn btn-primary w-100 mt-2 " href="<?=base_url?>Cars/registro">Añadir nuevo auto</a>
            </div>
        </div>
        <div class="card rounded-0 mt-3">
            <div class="card-body text-center">
                <div class="row">
                    <?php while($cars = $get_cars->fetch_object()):?>
                        <div class="col-lg-4 d-flex stat my-3">
                            <div class="mx-auto">
                                <h6 class="text-mutted"><?=$cars->marca?> <b id="colortext"><?=$cars->color?></b></h6>
                                <h3 class="font-weight-bold"><?=$cars->matricula?></h3>
                                <h6 class="font-weight-light"><?=$cars->descripcion?></h3>
                                <a class="btn btn-primary w-100 mt-2" href="<?=base_url?>Cars/update&id=<?=$cars->id?>">Administrar</a>
                                <a class="btn btn-danger w-100 mt-2" href="<?=base_url?>Cars/drop&id=<?=$cars->id?>">Eliminar</a>
                            </div>
                        </div>
                    <?php endwhile;?>

                </div>
            </div>
        </div>
    </div>
</section>