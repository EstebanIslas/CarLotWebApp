<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0">Bienvenido</h1>
                <p class="lead text-muted">Administra tu información</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-mix py-3">
    <div class="container">

        <div class="card rounded-0 text-center">
            <div class="card-body">
                <h3 class="card-title mt-3 text-center">Estacionamientos Recientes</h3>
                <div class="row">
                    <?php while($parks = $getParksfromUser->fetch_object()):?>
                        <div class="col-lg-4 d-flex stat my-3">
                            <div class="mx-auto">
                                <img src="<?=$parks->image?>" class="card-img-top" alt="..." style = "height: 12rem">
                                <h5 class="card-title mt-3 d-inline-block text-truncate"><?=$parks->nombre_park?></h5>
                                <p class="card-text">Calle: <?=$parks->calle?> #<?=$parks->numero_ext?>, Col. <?=$parks->colonia?></p>
                                <a href="<?=base_url?>Parks/get_one_park&id=<?=$parks->id?>" class="btn btn-primary">Ver Estacionamiento</a>
                            </div>
                        </div>
                    <?php endwhile;?>
                </div>
            </div>
        </div>      
    </div>
</section>

<section class="bg-grey py-3 mb-5">
    <div class="container">
        <h4 class="card-title mt-3 text-center" id="colortext">Reservas Recientes</h4>

        <table class="table">
            <thead class="bg-primary" style="color: #FFFFFF">
                <tr>
                <th scope="col">Nombre de estacionamiento</th>
                <th scope="col">Placa de Automovil</th>
                <th scope="col">Entrada</th>
                <th scope="col">Salida</th>
                <th scope="col">Tiempo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">La fuente</th>
                    <td>RH5-Xzb-69</td>
                    <td>12:00 pm</td>
                    <td>14:25 pm</td>
                    <td>3 horas</td>
                </tr>
                <tr>
                    <th scope="row">Miguel Hidalgo</th>
                    <td>RH5-Xzb-69</td>
                    <td>12:00 pm</td>
                    <td>14:25 pm</td>
                    <td>3 horas</td>
                </tr>
                <tr>
                    <th scope="row">Club de Leones</th>
                    <td>RH5-Xzb-69</td>
                    <td>12:00 pm</td>
                    <td>14:25 pm</td>
                    <td>3 horas</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<section class="bg-grey py-3 mb-5" >
    <div class="container text-center " style="width: 50rem;">
        <div class="card">
        <div class="card-body">
            <br><h5>Ubicacion</h5><br>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d936.652020481299!2d-98.35617297079695!3d20.108663558510695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d0564a7e4f1fd5%3A0xc92d84b6a3437bfb!2sN%C3%ADquel%2C+Lomas+del+Progreso%2C+43615+Tulancingo%2C+Hgo.!5e0!3m2!1ses-419!2smx!4v1552363529774" 
                width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>

        </div>
        </div>
    </div>
</section>