<?php


class parksController{
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

}
