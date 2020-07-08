<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0">Mis Reservas</h1>
                <p class="lead text-muted">Consulta tus reservas realizadas</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-mix py-4">
    <div class="container">
        
        <?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
            <div class="container alert alert-success" role="alert">Reserva en espera realizada con éxito!
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
            <div class="container alert alert-danger" role="alert">Error al registrar, verifica tu información!
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php endif;?>
        <?php Utils::deleteSession('register') #Borrar sesión de save?>

        <div class="card mb-3 rounded-0 text-center" style="width: 50rem; margin:auto auto;">
            <div class="card-header text-center">Reserva actual</div>
            <div class="card-body text-dark">
                <?php if (isset($_SESSION['reservas']) && $_SESSION['reservas'] == 'existe'): ?>
                    <?php while($res = $current->fetch_object()):?>
                        <h5 class="card-title font-weight-bold" id="colortext"><?=$res->nombre_park;?></h5>
                        <p class="card-text mt-3 mb-0">Solicitud: <b><?=$res->estado;?></b></p>
                        <p class="card-text mt-1 mb-4">Hora de arrivo a estacionamiento: <b><?=$res->hra_arrivo;?></b></p>
                        <small id="" class="form-text text-muted mb-0">La reserva se realizó en la fecha: <?=$res->entrada;?></small>
                    <?php endwhile;?>
                <?php elseif (isset($_SESSION['reservas']) && $_SESSION['reservas'] == 'no_existe'): ?>
                    <h5 class="card-title font-weight-bold" id="colortext">No Existen Reservas recientes</h5>

                    <small id="" class="form-text text-muted mb-2">Reserva ahora</small>
                    <a href="<?=base_url?>persons/verparks" class="btn btn-primary">Ver Estacionamientos</a>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>