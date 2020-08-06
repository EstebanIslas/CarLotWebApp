<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0">Estacionamientos</h1>
                <p class="lead text-muted">Puedes ver todos los estacionamientos</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-mix py-3">
    <div class="container">

        <div class="card rounded-0 text-center">
            <div class="card-body">
                <h3 class="card-title mt-3 text-center">Estacionamientos</h3>
                <div class="row">
                    <?php while($park = $getall->fetch_object()):?>
                        <div class="col-lg-4 d-flex stat my-3">
                            <div class="mx-auto">
                                <img src="<?=$park->image?>" class="card-img-top" alt="..." style="height: 12rem; width: 20rem">
                                <h5 class="card-title mt-3"><?=$park->nombre_park?></h5>
                                <p class="card-text mb-0">Calle <?=$park->calle?> #<?=$park->numero_ext?>, Colonia <?=$park->colonia?></p>
                                <p class="card-text">Tarifa más común: <b class="text-success font-weight-bold">$<?=$park->tarifa?></b></p>
                                <a href="<?=base_url?>Parks/get_one_park&id=<?=$park->id?>" class="btn btn-primary">Ver estacionamiento</a>
                            </div>
                        </div>
                    <?php endwhile;?>
                </div>
            </div>
        </div>      
    </div>
</section>