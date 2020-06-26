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
        $req = 'views/tarifas/registro.php';
        $this->design($req);
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

                $save = $this->modelTarifas->save();
                
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
}