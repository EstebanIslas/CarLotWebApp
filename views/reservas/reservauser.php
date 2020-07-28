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

        <?php if (isset($_SESSION['update_reserva']) && $_SESSION['update_reserva'] == 'complete'): ?>
            <div class="container alert alert-success" role="alert">Has pagado tu reserva, el estacionamiento activará tu entrada cuando ingreses!
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php elseif (isset($_SESSION['update_reserva']) && $_SESSION['update_reserva'] == 'failed'): ?>
            <div class="container alert alert-danger" role="alert">Error al realizar la transacción!
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php endif;?>
        <?php Utils::deleteSession('update_reserva') #Borrar sesión de save?>

        <div class="card mb-3 rounded-0 text-center" style="width: 50rem; margin:auto auto;">
            <div class="card-header text-center">Reserva actual</div>
            <div class="card-body text-dark">
                <?php if (isset($_SESSION['reservas']) && $_SESSION['reservas'] == 'existe'): ?>
                    <?php while($res = $current->fetch_object()):?>
                        <h5 class="card-title font-weight-bold" id="colortext"><?=$res->nombre_park;?></h5>
                        <p class="card-text mt-3">Solicitud: <b><?=$res->estado;?></b></p>
                        <?php if($res->estado == "Aceptada"):?>
                            <small id="" class="form-text text-muted mt-2 mb-2">Puedes cancelar o proceder a pagar tu reserva</small>
                            <a href="<?=base_url?>reservas/update_on&id=<?=$res->id?>&estado=Rechazada" class="btn btn-danger mb-2">Cancelar reserva</a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModalCenter">
                            Pagar mi reserva
                            </button>
                        <?php elseif($res->estado == "En curso"):?>
                            <small id="" class="form-text text-muted mt-2 mb-2">Puedes cancelar tu reserva o esperar a que el estacionamiento la acepte para poder pagar</small>
                            <a href="<?=base_url?>reservas/update_on&id=<?=$res->id?>&estado=Rechazada" class="btn btn-danger mb-2">Cancelar reserva</a>
                        <?php endif;?>
                        <p class="card-text mt-1 mb-4">Hora de arrivo a estacionamiento: <b><?=$res->hra_arrivo;?></b></p>
                        <small id="" class="form-text text-muted mb-0">La reserva se realizó en la fecha: <?=$res->entrada;?></small>
                    <?php endwhile;?>
                <?php elseif (isset($_SESSION['reservas']) && $_SESSION['reservas'] == 'no_existe'): ?>
                    <h5 class="card-title font-weight-bold" id="colortext">No Existen Reservas recientes</h5>

                    <small id="" class="form-text text-muted">Reserva ahora</small>
                    <a href="<?=base_url?>persons/verparks" class="btn btn-primary">Ver Estacionamientos</a>

                    <small id="" class="form-text text-muted mt-4 mb-0">Si realizaste una reserva y al recargar la página no aparece, es por que el estacionamiento rechazo tu solicitud</small>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Reservar Cajón</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        <form action="<?=base_url?>reservas/payform" method="post" id="payment-form">
            <div class="modal-body">
                
                        <label for="card-element">
                        Tarjeta de crédito o débito 
                        </label>
                        <?php while($pago = $pay->fetch_object()):?>
                            <input type="hidden" class="form-control" name="id_reserva" value="<?=$pago->id?>"> <br>
                            <input type="hidden" class="form-control" name="nombre_park" value="<?=$pago->nombre_park?>"> <br>
                        <?php endwhile;?>
                        <div id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Pagar reserva">
            </div>
        </form>
        <!--PAGOS CON STRIPE-->
        <script>
        
            // Create a Stripe client.
            var stripe = Stripe('pk_test_51H5a9GAPPPWWUe8heWXiCje0vghXIiZWC9aE6XmY1zxYbFFTlfyZgCmqQRmXOVQhs04wlh3lfcHjvXxjOfivNY63001VBJd6Ng');

            // Create an instance of Elements.
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {style: style});

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
                } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
                }
            });
            });

            // Submit the form with the token ID.
            function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
            }

        </script>
        <!--PAGOS CON STRIPE-->
    </div>
  </div>
</div>

<section class="bg-grey py-3 mb-5">
    <div class="container mb-5">
        <p class="lead text-muted font-weight-bold" style="color: #1a1a1a">Entrada Actual</p>

        <?php if (isset($_SESSION['entradas_user']) && $_SESSION['entradas_user'] == 'existe'): ?>
            <table class="table">
                <thead class="bg-primary" style="color: #FFFFFF">
                    <tr>
                    <th scope="col">Nombre de estacionamiento</th>
                    <th scope="col">Placa de Automovil</th>
                    <th scope="col">Entrada</th>
                    <th scope="col">Tiempo</th>
                    <th scope="col">Cobro por hora</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($input = $input_user->fetch_object()):?>
                        <tr>
                            <th scope="row"><?=$input->nombre_park?></th>
                            <td><?=$input->matricula?></td>
                            <td><?=$input->entrada?></td>
                            <td><?=$input->horas?></td>
                            <td><?=$input->tarifa_cobrada?></td>
                        </tr>
                    <?php endwhile;?>
                </tbody>
            </table>
            <?php elseif (isset($_SESSION['entradas_user']) && $_SESSION['entradas_user'] == 'no_existe'): ?>
                <div class="alert alert-success" role="alert">
                    No has entrado a algún estacionamiento
                </div>
            <?php endif;?>
    </div>
</section>