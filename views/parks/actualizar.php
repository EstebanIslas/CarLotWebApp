
<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0">Actualizar mi información</h1>
                <p class="lead text-muted">Actualiza la información de tu estacionamiento</p>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class ="col-lg-9">
            <form action="#" method="POST">
            <div class="form-group">
                <label for="tipo_car">Nombre de Estacionamiento:</label>
                <input type="text" class="form-control" name="tipo_car"
                pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{5,30}" placeholder="Nombre de estacionamiento">
                <!--small id="" class="form-text text-muted">Ingresa el tipo de automóvil que seguirá esta tarifa</small-->
            </div>

            <div class="form-group">
                <label for="">Dirección:</label>
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="calle" placeholder="Calle">
                    </div>
                    <div class="col-md-4">
                        <input type="number" class="form-control" name="numero_ext" placeholder="Numero">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="colonia" placeholder="Colonia">
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="tarifa">Número de cajones:</label>
                <input type="number" class="form-control" name="stock" placeholder = "Número de cajones"
                pattern="[0-9,.]{1,3}">
            </div>

            <div class="form-group">
                <label for="">Días de trabajo:</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="dia_ini" placeholder="Día de apertura">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="dia_fin" placeholder="Día de cierre">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Horario de trabajo:</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="time" class="form-control" name="hora_apertura" placeholder="Hora de apertura">
                    </div>
                    <div class="col-md-6">
                        <input type="time" class="form-control" name="hora_cierre" placeholder="Hora de cierre">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="tarifa">Tarifa General:</label>
                <input type="number" class="form-control" name="tarifa" placeholder = "Tarifa general"
                pattern="[0-9,.]{1,3}">
            </div>

            <div class="form-group">
                <label for="tarifa">Descripción:</label>
                <input type="text" class="form-control" name="descripcion" placeholder = "Descripción">
            </div>

            <div class="form-group">
                <label for="">Ubicación:</label>
                <div class="row">
                    <div class="col-md-5">
                        <a href="https://www.google.com.mx/maps/@20.0864667,-98.366106,15.58z" class="btn btn-primary w-100">Copiar mi ubicación</a>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="longitud" placeholder="Longitud">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="latitud" placeholder="Latitud">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="tarifa">Imagen:</label>
                <input type="file" class="form-control" name="image" accept="image/*" placeholder = "Imagen">
            </div>


            <input type="submit" class="btn btn-primary w-100 mt-2" value="Actualizar mi info">
            </form>
        </div>
    </div>
</div>