<?php

require_once 'models/users.php';

class Parks{
    private $id;
    private $nombre_park;
    private $calle;
    private $colonia;
    private $numero_ext;
    private $stock;
    private $dia_ini;
    private $dia_fin;
    private $hora_apertura;
    private $hora_cierre;
    private $descripcion;
    private $id_person;
    private $longitud;
    private $latitud;
    private $image;
    private $tarifa;

    #Tabla Persons
    private $nombre;
    private $apellido;
    private $telefono;

    #Tabla Users
    private $correo;
    private $password;

    #Database Connection
    public function __construct()
    {
        $this->db = Database::connect();
    }

    #Getters y Setters
    
    function getId()
    {
        return $this->id;
    }
    function setId($id)
    {
        $this->id = $id;
    }
    function getNombre_park()
    {
        return $this->nombre_park;
    }
    function setNombre_park($nombre_park)
    {
        $this->nombre_park = $nombre_park;
    }
    function getCalle()
    {
        return $this->calle;
    }
    function setCalle($calle)
    {
        $this->calle = $calle;
    }
    function getColonia()
    {
        return $this->colonia;
    }
    function setColonia($colonia)
    {
        $this->colonia = $colonia;
    }
    function getNumero_ext()
    {
        return $this->numero_ext;
    }
    function setNumero_ext($numero_ext)
    {
        $this->numero_ext = $numero_ext;
    }
    function getStock()
    {
        return $this-> stock;
    }
    function setStock($stock)
    {
        $this->stock = $stock;
    }
    function getDia_ini()
    {
        return $this->dia_ini;
    }
    function setDia_ini($dia_ini)
    {
        $this->dia_ini = $dia_ini;
    }
    function getDia_fin()
    {
        return $this->dia_fin;
    }
    function setDia_fin($dia_fin)
    {
        $this->dia_fin = $dia_fin;
    }
    function getHora_apertura()
    {
        return $this->hora_apertura;
    }
    function setHora_apertura($hora_apertura)
    {
        $this->hora_apertura = $hora_apertura;
    }
    function getHora_cierre()
    {
        return $this->hora_cierre;
    }
    function setHora_cierre($hora_cierre)
    {
        $this->hora_cierre = $hora_cierre;
    }
    function getDescripcion()
    {
        return $this->descripcion;
    }
    function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    function getId_person()
    {
        return $this->id_person;
    }
    function setId_person($id_person)
    {
        $this->id_person = $id_person;
    }
    function getLongitud()
    {
        return $this->longitud;
    }
    function setLongitud($longitud)
    {
        $this->longitud = $longitud;
    }
    function getLatitud()
    {
        return $this->latitud;
    }
    function setLatitud($latitud)
    {
        $this->latitud = $latitud;
    }
    function getImage()
    {
        return $this->image;
    }
    function setImage($image)
    {
        $this->image = $image;
    }
    function getTarifa()
    {
        return $this->tarifa;
    }
    function setTarifa($tarifa)
    {
        $this->tarifa = $tarifa;
    }

    #SETTERS Y GETTERS USER
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

    #SETTERS Y GETTERS PERSONS

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

    public function getParks()
    {
        $id_person = $_SESSION['usuario']->id_person;

        $sql = "SELECT * FROM parks WHERE id_person = '$id_person' LIMIT 1";
        $result = $this->db->query($sql);

        if ($result && $result->num_rows == 1) {
            $estacionamiento = $result->fetch_object();
        }else{
            $estacionamiento = null;
        }

        return $estacionamiento;
    }

    public function getAll()
    {
        $sql = $this->db->query("SELECT * FROM parks ORDER BY colonia");
        return $sql;
    }

    #Save User
    public function save(){
        $sql = "Call registroParks(
            0,
            '{$this->getNombre()}',
            '{$this->getApellido()}',
            '{$this->getTelefono()}',
            '{$this->getCorreo()}',
            '{$this->getPassword()}',
            0,
            '{$this->getNombre_park()}',
            '{$this->getCalle()}',
            '{$this->getColonia()}',
            '{$this->getNumero_ext()}',
            '{$this->getStock()}',
            '{$this->getDia_ini()}',
            '{$this->getDia_fin()}',
            '{$this->getHora_apertura()}',
            '{$this->getHora_cierre()}',
            '{$this->getDescripcion()}',
            '{$this->getTarifa()}');";

        $save = $this->db->query($sql);

        $result = false;

        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function get_one_parks()
    {
        $sql = $this->db->query("SELECT * FROM parks WHERE id = '{$this->getId()}'");
        return $sql->fetch_object();
    }


    public function update()
    {
        $id_park = $_SESSION['estacionamiento']->id;
        $sql = "UPDATE parks SET 
            nombre_park = '{$this->getNombre_park()}',
            calle = '{$this->getCalle()}',
            colonia = '{$this->getColonia()}',
            numero_ext = '{$this->getNumero_ext()}',
            stock = '{$this->getStock()}',
            dia_ini = '{$this->getDia_ini()}',
            dia_fin = '{$this->getDia_fin()}',
            hora_apertura = '{$this->getHora_apertura()}',
            hora_cierre = '{$this->getHora_cierre()}',
            descripcion = '{$this->getDescripcion()}',
            tarifa = '{$this->getTarifa()}',
            longitud = '{$this->getLongitud()}',
            latitud = '{$this->getLatitud()}'
            WHERE id= {$this->getId()};";

        $save = $this->db->query($sql);

        $result = false;

        if ($save) {
            $result = true;
        }
        return $result;
    }
}