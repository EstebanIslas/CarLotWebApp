<?php

require_once 'models/persons.php';
require_once 'models/cars.php';
require_once 'models/parks.php';

class personsController{

    protected $modelPersons;
    protected $modelCars;
    protected $modelParks;

    public function __construct()
    {
        $this->modelPersons = new Persons();
        $this->modelCars = new Cars();
        $this->modelParks = new Parks();
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
}