<?php

class reservasController{
    
    private function design($requerir){
        require_once 'views/layout/header.php';
        #Renderizar la vista para que se muestre principal
        require_once $requerir;

        require_once 'views/layout/footer.php';
    }

    public function index(){
        $req = 'views/reservas/consultas.php';
        $this->design($req);
    }
}