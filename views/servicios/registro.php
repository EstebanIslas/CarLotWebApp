<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1 style="color: #1a1a1a;" class="font-weight-bold mb-0">Servicios en mi estacionamiento</h1>
                <p class="lead text-muted">Crea un servicio para tu estacionamiento</p>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class ="col-lg-9">
            <form action="#" method="POST">
            <div class="form-group">
                <label for="tipo_car">Nombre del servicio:</label>
                <input type="text" class="form-control" name="tipo_car"
                pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{5,30}">
                <small id="" class="form-text text-muted">Ingresa el nombre del servicio con el que cuenta tu estacionamiento</small>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <input type="text" class="form-control" name="descripcion"
                pattern="[a-zA-ZáéíóúÁÉÍÓÚ ,.'-]{5,65}">
                
            </div>
            <div class="form-group">
                <label for="tarifa">Costo:</label>
                <input type="number" class="form-control" name="tarifa"
                pattern="[0-9,.]{1,3}">
            </div>
            <input type="submit" class="btn btn-primary" value="Guardar">
            </form>
        </div>
    </div>
</div>

