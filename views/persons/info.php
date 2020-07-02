<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h3 style="color: #1a1a1a;" class="font-weight-bold mb-0">Cuenta Car~Lot</h3>
                <p class="lead text-muted">En esta sección puedes consultar la información de tu perfil</p>
            </div>
        </div>
    </div>
</section>

<section class="py-3">

    <div clas="container">
    
        <?php while($per = $get_person->fetch_object()):?>
        <div class="row">
        
            <div class="col-lg-4">
                <div class="text-center ml-4">
                    <img src="<?=$per->image?>" class="rounded" style="height: 15rem; width: 15rem">
                </div></hr><br>
            </div>

            <div class="col-lg-8">
                <div class="tab-pane active">
                    
                        <h4 class="card-title mt-3" id="colortext"><?=$per->nombre?> <b class="text-dark"><?=$per->apellido?></b></h4>
                        <p class="card-text mb-0">Correo: <i class="glyphicon glyphicon-envelope"></i><?=$per->correo?></p>
                        <p class="card-text">Teléfono: <?=$per->telefono?></p>

                        <p class="card-text mb-0 mt-5">
                            <small><cite>Aplicación desarrollada para <i class="glyphicon glyphicon-map-marker">Tulancingo Hgo. México</i></cite></small>
                        </p>
                        <p><small><i class="glyphicon glyphicon-gift"></i><?php $fcha = date("Y-M-D");?> <?=$fcha?></small></p>
                    
                </div>
            </div>
        
        </div>
        <?php endwhile;?>

    </div>

</section>