<?php

require_once 'models/tarifas.php';

class tarifasController{
    public function index(){
        echo "Controlador Tarifas Acción Index";
    }

    public function registro(){
        #Importa el header
        require_once 'views/layout/header.php';

        #Renderiza una vista
        require_once 'views/tarifas/registro.php';

        #importa el footer
        require_once 'views/layout/footer.php';
    }

    public function save(){
        #Importa el header
        require_once 'views/layout/header.php';
        
        #validacion de existencia
        if (isset($_POST)) {

            #Validación basica
            $tarifas = new Tarifas();
            $tarifas->setTipo_car($_POST['tipo_car']);
            $tarifas->setDescripcion($_POST['descripcion']);
            $tarifas->setTarifa($_POST['tarifa']);

            $save = $tarifas->save();

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
        header("Location:".base_url.'tarifas/registro');
        ob_end_flush();#Error del header al redireccionar
        #importa el footer
        require_once 'views/layout/footer.php';
    }
}