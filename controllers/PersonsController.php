<?php

require_once 'models/persons.php';

class personsController{

    protected $modelPersons;

    public function __construct()
    {
        $this->modelPersons = new Persons();
    }

    public function index(){
        require_once 'views/layout/header.php';

        $getParksfromUser = $this->modelPersons->getParksfromUser();
        require_once 'views/persons/tablero.php';

        require_once 'views/layout/footer.php';
    }

    public function cars(){
        require_once 'views/layout/header.php';

        require_once 'views/persons/admincars.php';

        require_once 'views/layout/footer.php';
    }

    public function verparks(){
        require_once 'views/layout/header.php';

        require_once 'views/parks/vertodos.php';

        require_once 'views/layout/footer.php';
    }
}