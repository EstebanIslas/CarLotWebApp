<?php

require_once 'models/reservas.php';

class reservasController{

    protected $modelReservas;

    public function __construct(){
        $this->modelReservas = new Reservas();
    }

    public function index(){
        require_once 'views/layout/header.php';
        #Renderizar la vista para que se muestre principal
        $get_inputs = $this->modelReservas->get_info_input();
        $get_outputs = $this->modelReservas->get_info_output();
        require_once 'views/reservas/consultas.php';

        require_once 'views/layout/footer.php';
    }

    public function save_input(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $edit = true;

            $this->modelReservas->setId($id); #settear

            $update = $this->modelReservas->update();

            if ($update) {
                $_SESSION['updated_input'] = 'complete';
            }else{
                $_SESSION['updated_input'] = 'failed';
            }

        }else{
            $_SESSION['updated_input'] = 'failed';
        }
        header("Location:".base_url.'reservas/index');
        ob_end_flush();#Error del header al redireccionar
    }
}