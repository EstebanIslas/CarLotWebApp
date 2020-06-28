<?php

require_once 'models/servicios.php';

class serviciosController{

    protected $modelServicios;

    public function __construct(){
        $this->modelServicios = new Servicios();
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
}