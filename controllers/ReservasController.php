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
        $get_status = $this->modelReservas->get_reservas_curso();
        $get_success = $this->modelReservas->get_reservas_curso();
        require_once 'views/reservas/consultas.php';

        require_once 'views/layout/footer.php';
    }

    public function addinput(){
        require_once 'views/layout/header.php';
        #Renderizar la vista para que se muestre principal
        if(isset($_GET['id'])){ #Recibe el id de reserva

            $id_reserva = $_GET['id'];
            
            $this->modelReservas->setId($id_reserva);

            $get_tarifas = $this->modelTarifas->get_tarifas();
            $get_cars = $this->modelReservas->get_cars_reservas();
            $get_reservas = $this->modelReservas->get_cars_reservas();
            require_once 'views/reservas/inputsregistro.php';
        }
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
        /*var_dump($_POST);
        die();*/

        if (isset($_POST)) {
            $id_car = isset($_POST['id_car']) ? $_POST['id_car'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $tarifa_cobrada = isset($_POST['tarifa_cobrada']) ? $_POST['tarifa_cobrada'] : false;
            $id_reserva = isset($_POST['id_reserva']) ? $_POST['id_reserva'] : false;

            if ($id_car && $descripcion && $tarifa_cobrada && $id_reserva) {
                
                #Validación basica
                $this->modelInputs->setId_car($id_car);
                $this->modelInputs->setDescripcion($descripcion);
                $this->modelInputs->setTarifa_cobrada($tarifa_cobrada);
                
                $this->modelReservas->setId($id_reserva);
                $up_res = $this->modelReservas->reservas_end();
                $save = $this->modelInputs->save();

                
                if ($save && $up_res) {
                    $_SESSION['save_in'] = "complete";
                    #echo 'Registro Completado';
                }else {
                    #echo 'Registro Fallido';
                    $_SESSION['save_in'] = "failed";
                }
            }else {
                $_SESSION['save_in'] = "failed";
            }

        }else {
            $_SESSION['save_in'] = "failed";
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

    public function update_on(){
        if (isset($_GET['id']) && isset($_GET['estado'])) {
            $id = $_GET['id'];
            $estado = $_GET['estado'];

            $edit = true;

            $this->modelReservas->setId($id); #settear
            $this->modelReservas->setEstado($estado); #settear

            $update = $this->modelReservas->reserva_on();

            if ($update) {
                $_SESSION['res_status'] = 'complete';
            }else{
                $_SESSION['res_status'] = 'failed';
            }

        }else{
            $_SESSION['res_status'] = 'failed';
        }
        header("Location:".base_url.'reservas/index');
        ob_end_flush();#Error del header al redireccionar
    }
}