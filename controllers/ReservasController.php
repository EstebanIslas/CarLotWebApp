<?php

class reservasController{
    public function index(){
        require_once 'views/layout/header.php';
        #Renderizar la vista para que se muestre principal
        require_once 'views/reservas/consultas.php';

        require_once 'views/layout/footer.php';
    }
}