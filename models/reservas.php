<?php

class Reservas{
    
    private $id;
    private $entrada;
    private $estado;
    private $hra_arrivo;
    private $id_park;
    private $id_person;

    private $db;

    #Database Connection
    public function __construct()
    {
        $this->db = Database::connect();
    }

    # Getters y Setters of Inputs
    function getId(){
        return $this->id;}

    function setId($id){
        $this->id = $id;}

    function getEntrada(){
        return $this->entrada;}

    function setEntrada($entrada){
        $this->entrada = $entrada;}

    function getEstado(){
        return $this->estado;}

    function setEstado($estado){
        $this->estado = $estado;}

    function getHra_arrivo(){
        return $this->hra_arrivo;}

    function setHra_arrivo($hra_arrivo){
        $this->hra_arrivo = $hra_arrivo;}

    function getId_park(){
        return $this->id_park;}

    function setId_park($id_park){
        $this->id_park = $id_park;}

    function getId_person(){
        return $this->id_person;}

    function setId_person($id_person){
        $this->id_person = $id_person;}

    #Metodos para actions
    public function save()
    {
        $this->setId_person($_SESSION['automovilista']->id);

        $sql = "INSERT INTO reservas VALUES(
            NULL, NOW(), 'En curso',
            '{$this->getHra_arrivo()}',
            '{$this->getId_park()}',
            '{$this->getId_person()}')";

        $save = $this->db->query($sql);

        $result = false;

        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function get_current()
    {
        $this->setId_person($_SESSION['automovilista']->id);

        $sql = $this->db->query("SELECT parks.nombre_park, reservas.estado, reservas.hra_arrivo, reservas.entrada
            FROM reservas INNER JOIN parks ON reservas.id_person = parks.id 
            WHERE reservas.id_person = '{$this->getId_person()}' AND reservas.estado = 'En curso' ORDER BY reservas.id DESC LIMIT 1");
        
        $filas = $sql->num_rows;
        $num = (integer)$filas;
        
        if ($num == 1) {
            $_SESSION['reservas'] = "existe";
        }elseif($num == 0) {
            $_SESSION['reservas'] = "no_existe";
        }
        return $sql;
    
    }

    public function get_cars_reservas()
    {
        $this->setId_park($_SESSION['estacionamiento']->id);

        $sql = $this->db->query("SELECT reservas.id, persons.nombre, persons.apellido, cars.matricula, cars.id AS id_car FROM reservas
            INNER JOIN persons ON reservas.id_person = persons.id
            INNER JOIN cars ON persons.id = cars.id_person
            INNER JOIN parks ON reservas.id_park = parks.id
            WHERE reservas.estado = 'Aceptada' AND id_park = '{$this->getId_park()}';");
        return $sql;
    }

    public function get_reservas_curso()
    {
        $this->setId_park($_SESSION['estacionamiento']->id);
        $sql = $this->db->query("SELECT reservas.id, persons.nombre, persons.apellido, reservas.hra_arrivo, parks.nombre_park FROM reservas
            INNER JOIN persons ON reservas.id_person = persons.id
            INNER JOIN parks ON reservas.id_park = parks.id
            WHERE reservas.estado = 'En curso' AND id_park = '{$this->getId_park()}';");
        return $sql;
    }

    public function reserva_on()
    {
        $estado = $this->getEstado();
        $sql = "UPDATE reservas SET estado = '$estado'
                WHERE id = '{$this->getId()}';";
        
        $save = $this->db->query($sql);
        $result = false;

        if ($save) {$result = true;}
        
        return $result;
    }
}