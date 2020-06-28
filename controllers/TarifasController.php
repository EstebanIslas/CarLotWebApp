<?php

require_once 'models/tarifas.php';

class tarifasController{

    protected $modelTarifas;

    public function __construct(){
        $this->modelTarifas = new Tarifas();
    }

    private function design($requerir){
        require_once 'views/layout/header.php';
        #Renderizar la vista para que se muestre principal
        require_once $requerir;

        require_once 'views/layout/footer.php';
    }

    public function index(){
        echo "Controlador Tarifas Acción Index";
    }

    public function registro(){
        require_once 'views/layout/header.php';
        #Renderizar la vista para que se muestre principal
        require_once 'views/tarifas/registro.php';

        require_once 'views/layout/footer.php';
    }

    public function save(){
        #Importa el header
        require_once 'views/layout/header.php';
        
        #validacion de existencia
        if (isset($_POST)) {
            $tipo_car = isset($_POST['tipo_car']) ? $_POST['tipo_car'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $tarifa = isset($_POST['tarifa']) ? $_POST['tarifa'] : false;

            if ($tipo_car && $descripcion && $tarifa) {
                
                #Validación basica
                $this->modelTarifas->setTipo_car($tipo_car);
                $this->modelTarifas->setDescripcion($descripcion);
                $this->modelTarifas->setTarifa($tarifa);

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $this->modelTarifas->setId($id);
                    $save = $this->modelTarifas->update();
                }else{
                    $save = $this->modelTarifas->save();
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
        header("Location:".base_url.'tarifas/registro');
        ob_end_flush();#Error del header al redireccionar
        #importa el footer
        require_once 'views/layout/footer.php';
    }


    public function drop(){
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $this->modelTarifas->setId($id); #settear

            $delete = $this->modelTarifas->delete();

            if ($delete) {
                $_SESSION['deletes'] = 'complete';
            }else {
                $_SESSION['deletes'] = 'failed';
            }
        }else {
            $_SESSION['deletes'] = 'failed';
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

            $this->modelTarifas->setId($id); #settear

            $update = $this->modelTarifas->get_one_tarifas();

            require_once 'views/tarifas/registro.php';
        }

        require_once 'views/layout/footer.php';
    }
}