<?php

class errorController{
    public function index(){
        require_once 'views/layout/header.php';

        echo "<h1 style='color: #1a1a1a;' class='font-weight-bold mb-0'>Error 404</h1>";
        echo "<p class='lead text-muted'>Página no encontrada</p>";

        require_once 'views/layout/footer.php';
    }
}