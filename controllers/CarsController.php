<?php

require_once 'models/cars.php';

class carsController{
    
    protected $modelCars;

    public function __construct(){
        $this->modelCars = new Cars();
    }

    public function registro(){
        require_once 'views/layout/header.php';
        #Renderizar la vista para que se muestre principal
        require_once 'views/cars/registro.php';

        require_once 'views/layout/footer.php';
    }

    public function save(){
        
        #validacion de existencia
        if (isset($_POST)) {
            $matricula = isset($_POST['matricula']) ? $_POST['matricula'] : false;
            $marca = isset($_POST['marca']) ? $_POST['marca'] : false;
            $color = isset($_POST['color']) ? $_POST['color'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;

            if ($matricula && $marca && $color && $descripcion) {
                
                #Validación basica
                $this->modelCars->setMatricula($matricula);
                $this->modelCars->setMarca($marca);
                $this->modelCars->setColor($color);
                $this->modelCars->setDescripcion($descripcion);
                
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $this->modelCars->setId($id);
                    $save = $this->modelCars->update();
                }else{
                    $save = $this->modelCars->save();
                }
                
                
                if ($save) {
                    $_SESSION['register'] = "complete";
                    #echo 'Registro Completado';
                }else {
                    #echo 'Registro Fallido';
                    $_SESSION['register'] = "failed";
                }
            }else {
                $_SESSION['register'] = "failed";
            }

        }else {
            $_SESSION['register'] = "failed";
        }
        header("Location:".base_url.'persons/cars');
        ob_end_flush();#Error del header al redireccionar
        #importa el footer    
    }

    public function drop(){
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $this->modelCars->setId($id); #settear

            $delete = $this->modelCars->delete();

            if ($delete) {
                $_SESSION['delete'] = 'complete';
            }else {
                $_SESSION['delete'] = 'failed';
            }
        }else {
            $_SESSION['delete'] = 'failed';
        }

        header("Location:".base_url.'persons/cars');
        ob_end_flush();#Error del header al redireccionar
    }

    public function update(){
        require_once 'views/layout/header.php';
        #Renderizar la vista para que se muestre principal
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $edit = true;

            $this->modelCars->setId($id); #settear

            $update = $this->modelCars->get_one_cars();

            require_once 'views/cars/registro.php';
        }

        require_once 'views/layout/footer.php';
    }
}