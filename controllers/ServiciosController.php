<?php

require_once 'models/servicios.php';
require_once 'models/cars.php';

class serviciosController{

    protected $modelServicios;
    protected $modelCars;

    public function __construct(){
        $this->modelServicios = new Servicios();
        $this->modelCars = new Cars();
    }

    
    public function registro(){
        require_once 'views/layout/header.php';
        #Renderizar la vista para que se muestre principal
        
        require_once 'views/servicios/registro.php';

        require_once 'views/layout/footer.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            
            $nombre = isset($_POST['nombre']) ? $_POST['nombre']:false;
            $descricion = isset($_POST['descripcion']) ? $_POST['descripcion']:false;
            $costo = isset($_POST['costo']) ? $_POST['costo']:false;

            if ($nombre && $descricion && $costo) {
            
                #Settear
                $this->modelServicios->setNombre($nombre);
                $this->modelServicios->setDescripcion($descricion);
                $this->modelServicios->setCosto($costo);

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $this->modelServicios->setId($id);
                    $save = $this->modelServicios->update();
                }else {
                    $save = $this->modelServicios->save();
                }
                

                if ($save) {
                    $_SESSION['register'] = 'complete';
                }else {
                    $_SESSION['register'] = 'failed';
                }
            
            }else {
                $_SESSION['register'] = 'failed';
            }
        
        }else {
            $_SESSION['register'] = 'failed';
        }

        header("Location:".base_url.'servicios/registro');
        ob_end_flush();#Error del header al redireccionar
    }

    public function drop(){
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $this->modelServicios->setId($id); #settear

            $delete = $this->modelServicios->delete();

            if ($delete) {
                $_SESSION['delete'] = 'complete';
            }else {
                $_SESSION['delete'] = 'failed';
            }
        }else {
            $_SESSION['delete'] = 'failed';
        }

        header("Location:".base_url.'parks/info');
        ob_end_flush();#Error del header al redireccionar
    }

    public function update(){
        require_once 'views/layout/header.php';
        #Renderizar la vista para que se muestre principal
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $edit = true;

            $this->modelServicios->setId($id); #settear

            $update = $this->modelServicios->get_one_servicios();

            require_once 'views/servicios/registro.php';
        }

        require_once 'views/layout/footer.php';
    }

    public function user(){
        require_once 'views/layout/header.php';
        #Renderizar la vista para que se muestre principal
        
        $services = $this->modelServicios->get_current();
        $detalles = $this->modelServicios->get_detalle_servicios();
        require_once 'views/servicios/servicesuser.php';

        require_once 'views/layout/footer.php';
    }

    public function solicitud(){
        require_once 'views/layout/header.php';
        #Renderizar la vista para que se muestre principal
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $this->modelServicios->setId($id);

            $service = $this->modelServicios->get_servicio_by_id();
           
            $cars = $this->modelCars->get_cars();

            require_once 'views/servicios/solicitud.php';
            
        }

        require_once 'views/layout/footer.php';
    }
    public function registrosolic(){
        
        if (isset($_POST)) {
            
            $hora_arrivo = isset($_POST['hora_arrivo']) ? $_POST['hora_arrivo']:false;
            $descricion = isset($_POST['descripcion']) ? $_POST['descripcion']:false;
            $id_servicio = isset($_POST['id_servicio']) ? $_POST['id_servicio']:false;
            $id_car = isset($_POST['id_car']) ? $_POST['id_car']:false;

            if ($hora_arrivo && $descricion && $id_servicio && $id_car) {
            
                #Settear
                $this->modelServicios->setHora_arrivo($hora_arrivo);
                $this->modelServicios->setDescripcion($descricion);
                $this->modelServicios->setId_servicio($id_servicio);
                $this->modelServicios->setId_car($id_car);

                
                $save = $this->modelServicios->save_detalle();                

                if ($save) {
                    $_SESSION['register'] = 'complete';
                }else {
                    $_SESSION['register'] = 'failed';
                }
            
            }else {
                $_SESSION['register'] = 'failed';
            }
        
        }else {
            $_SESSION['register'] = 'failed';
        }

        header("Location:".base_url.'servicios/user');
        ob_end_flush();#Error del header al redireccionar
    }

    public function update_on(){
        if (isset($_GET['id']) && isset($_GET['estado'])) {
            $id = $_GET['id'];
            $estado = $_GET['estado'];

            $edit = true;

            $this->modelServicios->setId($id); #settear
            $this->modelServicios->setEstado($estado); #settear

            $update = $this->modelServicios->service_on();

            if ($update) {
                $_SESSION['res_status'] = 'complete';
            }else{
                $_SESSION['res_status'] = 'failed';
            }

        }else{
            $_SESSION['res_status'] = 'failed';
        }

        if (isset($_SESSION['estacionamiento'])) {
            header("Location:".base_url.'reservas/index');
        }elseif(isset($_SESSION['automovilista'])){
            header("Location:".base_url.'servicios/user');
        }
        ob_end_flush();#Error del header al redireccionar
    }
}