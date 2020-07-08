<?php

require_once 'models/persons.php';
require_once 'models/cars.php';
require_once 'models/parks.php';
require_once 'models/reservas.php';
require_once 'models/inputs.php';

class personsController{

    protected $modelPersons;
    protected $modelCars;
    protected $modelParks;
    protected $modelReservas;
    protected $modelInputs;

    public function __construct()
    {
        $this->modelPersons = new Persons();
        $this->modelCars = new Cars();
        $this->modelParks = new Parks();
        $this->modelReservas = new Reservas();
        $this->modelInputs = new Inputs();
    }

    public function index(){
        require_once 'views/layout/header.php';

        $getParksfromUser = $this->modelPersons->getParksfromUser();
        require_once 'views/persons/tablero.php';

        require_once 'views/layout/footer.php';
    }

    public function cars(){
        require_once 'views/layout/header.php';

        $get_cars = $this->modelCars->get_cars();
        require_once 'views/persons/admincars.php';

        require_once 'views/layout/footer.php';
    }

    public function verparks(){
        require_once 'views/layout/header.php';

        $getall = $this->modelParks->getAll();
        require_once 'views/parks/vertodos.php';

        require_once 'views/layout/footer.php';
    }

    public function info(){
        require_once 'views/layout/header.php';

        $get_person = $this->modelPersons->get_person();
        require_once 'views/persons/info.php';

        require_once 'views/layout/footer.php';
    }

    public function registro(){
        require_once 'views/persons/registro.php';
    }

    public function reservas(){
        require_once 'views/layout/header.php';

        $current = $this->modelReservas->get_current();
        $input_user = $this->modelInputs->input_user();
        require_once 'views/reservas/reservauser.php';

        require_once 'views/layout/footer.php';
    }

    public function save()
    {
        #Validación de existencia post
        if (isset($_POST)) {

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
            #Users
            $correo = isset($_POST['correo']) ? $_POST['correo'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            $conf_password = isset($_POST['conf_password']) ? $_POST['conf_password'] : false;

            if ($nombre && $apellido && $telefono && $correo && $password && $conf_password) {
                
                if($password == $conf_password){
                    #Setear
                    $this->modelPersons->setNombre($nombre);
                    $this->modelPersons->setApellido($apellido);
                    $this->modelPersons->setTelefono($telefono);
                    $this->modelPersons->setCorreo($correo);
                    $this->modelPersons->setPassword($conf_password);

                    $save = $this->modelPersons->save();

                    if ($save) {
                        $_SESSION['register_user'] = "complete";
                        #echo 'Registro Completado';
                    }else {
                        #echo 'Registro Fallido';
                        $_SESSION['register_user'] = "failed";
                    }
                }else {
                    $_SESSION['register_user'] = "failed_pass";
                    echo "<script>location.href='".base_url."persons/registro';</script>";
                }
                
            }else { #Settear end
                $_SESSION['register_user'] = "failed";
            }
        
        
        }else {#isset end
            $_SESSION['register_user'] = "failed";
        }

        header("Location:".base_url."login/index");
        ob_end_flush();#Error del header al redireccionar
    }
}