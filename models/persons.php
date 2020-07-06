<?php

class Persons{

    private $id;
    private $nombre;
    private $apellido;
    private $telefono;
    #Users
    private $correo;
    private $password;
    private $rol;


    #Constructor y DB
    public function __construct()
    {
        $this->db = Database::connect();
    }

    #SETTERS Y GETTERS
    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    #USERS 
    public function setCorreo($correo){
        $this->correo = $correo;
    }
    
    public function getCorreo(){
        return $this->correo;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    
    public function getPassword(){
        return $this->password;
    }
    function getRol(){
        return $this-> rol;
    }
    function setRol($rol){
        $this->rol = $rol;
    }

    public function getAutomovilistas()
    {
        $id_person = $_SESSION['usuario']->id_person;

        $sql = "SELECT * FROM persons WHERE id = '$id_person'";
        $result = $this->db->query($sql);

        if ($result && $result->num_rows == 1) {
            $automovilista = $result->fetch_object();
        }else{
            $automovilista = null;
        }

        return $automovilista;
    }

    public function getParksfromUser()
    {
        $id_person = $_SESSION['automovilista']->id;

        $sql = "SELECT parks.id, parks.nombre_park,  parks.calle , parks.numero_ext, parks.colonia, parks.image, inputs.entrada from inputs 
                INNER JOIN parks ON inputs.id_park = parks.id
                INNER JOIN cars ON inputs.id_car = cars.id
                INNER JOIN persons ON cars.id_person = persons.id
                WHERE persons.id = '$id_person' GROUP BY parks.nombre_park ORDER BY inputs.entrada ASC limit 3;";
        $result = $this->db->query($sql);
        return $result;
    }

    public function get_person()
    {
        $id_person = $_SESSION['usuario']->id_person;

        $sql = $this->db->query("SELECT users.correo, users.image, persons.nombre, persons.apellido, persons.telefono FROM users
                INNER JOIN persons ON users.id_person = persons.id
                WHERE id_person = '$id_person'");
        return $sql;
    }

    #Metodo Registro
    public function save(){

        $sql = "Call registroUsuarios(
            0,
            '{$this->getNombre()}',
            '{$this->getApellido()}',
            '{$this->getTelefono()}',
            '{$this->getCorreo()}',
            '{$this->getPassword()}',
            1)";

        $save = $this->db->query($sql);

        $result = false;

        if ($save) {
            $result = true;
        }
        return $result;
    }
}