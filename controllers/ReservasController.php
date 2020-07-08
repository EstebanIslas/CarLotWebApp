<?php

require_once 'models/inputs.php';
require_once 'models/tarifas.php';
require_once 'models/reservas.php';

class reservasController{

    protected $modelInputs;
    protected $modelTarifas;
    protected $modelReservas;

    public function __construct(){
        $this->modelInputs = new Inputs();
        $this->modelTarifas = new Tarifas();
        $this->modelReservas = new Reservas();
    }

    public function index(){
        require_once 'views/layout/header.php';
        #Renderizar la vista para que se muestre principal
        $stock_available = $this->modelInputs->stock_available();
        $get_inputs = $this->modelInputs->get_info_input();
        $get_outputs = $this->modelInputs->get_info_output();
        require_once 'views/reservas/consultas.php';

        require_once 'views/layout/footer.php';
    }

    public function addinput(){
        require_once 'views/layout/header.php';
        #Renderizar la vista para que se muestre principal
        $get_tarifas = $this->modelTarifas->get_tarifas();
        require_once 'views/reservas/inputsregistro.php';

        require_once 'views/layout/footer.php';
    }

    public function save_input(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $edit = true;

            $this->modelInputs->setId($id); #settear

            $update = $this->modelInputs->update();

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

    public function save_in()
    {
        #validacion de existencia
        if (isset($_POST)) {
            $id_car = isset($_POST['id_car']) ? $_POST['id_car'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $tarifa_cobrada = isset($_POST['tarifa_cobrada']) ? $_POST['tarifa_cobrada'] : false;

            if ($id_car && $descripcion && $tarifa_cobrada) {
                
                #Validación basica
                $this->modelInputs->setId_car($id_car);
                $this->modelInputs->setDescripcion($descripcion);
                $this->modelInputs->setTarifa_cobrada($tarifa_cobrada);

                $save = $this->modelInputs->save();

                
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
        header("Location:".base_url.'reservas/index');
        ob_end_flush();#Error del header al redireccionar
    }

    #Funciones action Reservas

    public function insertar_reserva()
    {
        if (isset($_POST)) {
            
            $hra_arrivo = isset($_POST['hra_arrivo']) ? $_POST['hra_arrivo'] : false;
            $id_park = isset($_POST['id_park']) ? $_POST['id_park'] : false;

            if ($hra_arrivo && $id_park) {
                
                #Settear
                $this->modelReservas->setHra_arrivo($hra_arrivo);
                $this->modelReservas->setId_park($id_park);

                $save = $this->modelReservas->save();

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

        header("Location:".base_url.'persons/reservas');
        ob_end_flush();#Error del header al redireccionar
    }
}