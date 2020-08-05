<?php

require_once 'models/users.php';
require_once 'models/parks.php';
require_once 'models/persons.php';

class loginController{
    public function index(){
        require_once 'views/parks/login.php';
    }

    public function log(){
        if (isset($_POST)) {
            #identificar estacionamiento
            $userModel = new Users();
            $userModel->setCorreo($_POST['correo']);
            $userModel->setPassword($_POST['password']);

            
            $user_login = $userModel->login();#Recibe el objeto de la BD - true or false

            /*
            var_dump($user_login);
            die();*/
            
            
            if($user_login){
                $_SESSION['usuario'] = $user_login;

                $rol = $user_login->rol;
               
                if($rol == "0"){

                    $parksModel = new Parks();
                    $estacionamiento = $parksModel->getParks();

                    /*var_dump($estacionamiento);
                    die();*/
                    $_SESSION['estacionamiento'] = $estacionamiento;

                    $_SESSION['park'] = true;
                    $_SESSION['login'] = "complete";
                    $_SESSION['user'] = 'failed';
                    echo "<script>location.href='".base_url."Parks/index';</script>";
                }

                elseif ($rol == '1') {

                    $personsModel = new Persons();
                    $automovilista = $personsModel->getAutomovilistas();

                    $_SESSION['automovilista'] = $automovilista;
                    $_SESSION['conduct'] = true;
                    echo "<script>location.href='".base_url."Persons/index';</script>";
                }
            }else{

                // redireccion al login con alerta
                #Crear una sesión
                $_SESSION['login'] = failed;
                echo "<script>location.href='".base_url."Login/index';</script>";
            }
            #Consulta a la base de datos
            header("Location".base_url."Parks/index"); 

           
        }
    }

    public function logout()
    {
        if (isset($_SESSION['usuario'])) { unset($_SESSION['usuario']); }

        if (isset($_SESSION['park'])) { unset($_SESSION['park']);}

        if (isset($_SESSION['estacionamiento'])) { unset($_SESSION['estacionamiento']);}
        
        if (isset($_SESSION['reservas'])) { unset($_SESSION['reservas']);}

        if (isset($_SESSION['automovilista'])) { unset($_SESSION['automovilista']); }

        if (isset($_SESSION['tot_comments'])) { unset($_SESSION['tot_comments']); }

        if (isset($_SESSION['calificacion'])) { unset($_SESSION['calificacion']); }

        if (isset($_SESSION['tot_reservas'])) { unset($_SESSION['tot_reservas']); }

        //header("Location".base_url."login/index");
        echo "<script>location.href='".base_url."Login/index';</script>";

    }
}