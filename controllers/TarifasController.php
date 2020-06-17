<?php

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
        if (isset($_POST)) {
            var_dump($_POST);
        }
    }
}