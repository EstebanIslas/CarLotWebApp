<?php

require_once 'models/parks.php';

class parksController{

    protected $modelParks;

    public function __construct(){
        $this->modelParks = new Parks();
    }

    public function index(){
        require_once 'views/layout/header.php';
        #Renderizar la vista para que se muestre principal
        require_once 'views/parks/tablero.php';

        require_once 'views/layout/footer.php';
    }

    public function info(){
        require_once 'views/layout/header.php';
        #Renderizar la vista para que se muestre principal
        require_once 'views/parks/infoperfil.php';

        require_once 'views/layout/footer.php';
    }

    public function registro(){
        require_once 'views/parks/registro.php';
    }

    public function save()
    {
        #Si existen valores por POST
        if (isset($_POST)) {
            
            #Validar True
            /*if ($nombre && $apellido && $telefono && $correo && $password && $rol && $nombre_park && $calle 
            && $colonia && $numero_ext && $stock && $dia_ini && $dia_fin && $hora_apertura && $hora_cierre
            && $descripcion && $tarifa) {*/

                #Validación basica
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
                $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
                $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
                $correo = isset($_POST['correo']) ? $_POST['correo'] : false;
                $password = isset($_POST['password']) ? $_POST['password'] : false;
                $nombre_park = isset($_POST['nombre_park']) ? $_POST['nombre_park'] : false;
                $calle = isset($_POST['calle']) ? $_POST['calle'] : false;
                $colonia = isset($_POST['colonia']) ? $_POST['colonia'] : false;
                $numero_ext = isset($_POST['numero_ext']) ? $_POST['numero_ext'] : false;
                $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
                $dia_ini = isset($_POST['dia_ini']) ? $_POST['dia_ini'] : false;
                $dia_fin = isset($_POST['dia_fin']) ? $_POST['dia_fin'] : false;
                $hora_apertura = isset($_POST['hora_apertura']) ? $_POST['hora_apertura'] : false;
                $hora_cierre = isset($_POST['hora_cierre']) ? $_POST['hora_cierre'] : false;
                $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
                $tarifa= isset($_POST['tarifa']) ? $_POST['tarifa'] : false;

                $this->modelParks->setNombre($nombre);
                $this->modelParks->setApellido($apellido);
                $this->modelParks->setTelefono($telefono);
                $this->modelParks->setCorreo($correo);
                $this->modelParks->setPassword($password);
                $this->modelParks->setNombre_park($nombre_park);
                $this->modelParks->setCalle($calle);
                $this->modelParks->setColonia($colonia);
                $this->modelParks->setNumero_ext($numero_ext);
                $this->modelParks->setStock($stock);
                $this->modelParks->setDia_ini($dia_ini);
                $this->modelParks->setDia_fin($dia_fin);
                $this->modelParks->setHora_apertura($hora_apertura);
                $this->modelParks->setHora_cierre($hora_cierre);
                $this->modelParks->setDescripcion($descripcion);
                $this->modelParks->setTarifa($tarifa);

                $save = $this->modelParks->save();

                if ($save) {
                    $_SESSION['register_park'] = "complete";
                }else{
                    $_SESSION['register_park'] = "failed";
                }
            /*}else {
                $_SESSION['register_park'] = "failed";
            }*/
        }else {
            $_SESSION['register_park'] = "failed";
        }

        header("Location:".base_url.'login/index');
        ob_end_flush();#Error del header al redireccionar
    }
}
