<?php

class Tarifas{
    private $id;
    private $tipo_car;
    private $descripcion;
    private $tarifa;
    private $id_park;
    private $db;
    
    #Database Connection
    public function __construct()
    {
        $this->db = Database::connect();
    }

    # Getters y Setters
    function getId()
    {
        return $this->id;
    }
    function setId($id)
    {
        $this->id = $id;
    }

    function getTipo_car()
    {
        return $this->tipo_car;
    }
    function setTipo_car($tipo_car)
    {
        $this->tipo_car = $this->db->real_escape_string($tipo_car);
    }

    function getDescripcion()
    {
        return $this->descripcion;
    }
    function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);

    }

    function getTarifa()
    {
        return $this->tarifa;
    }
    function setTarifa($tarifa)
    {
        $this->tarifa = $this->db->real_escape_string($tarifa);
    }

    function getId_park()
    {
        return $this->id_park;
    }
    function setId_park($id_park)
    {
        $this->id_park = $id_park;
    }

    #Metodo Save
    public function save(){
        $id_park = $_SESSION['estacionamiento']->id;
        $sql = "INSERT INTO tarifas VALUES (
            NULL,
            '{$this->getTipo_car()}',
            '{$this->getDescripcion()}',
            '{$this->getTarifa()}',
            '$id_park');";
        $save = $this->db->query($sql);

        $result = false;

        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function get_tarifas()
    {
        $id_park = $_SESSION['estacionamiento']->id;
        $sql = $this->db->query("SELECT * FROM tarifas where id_park = '$id_park'");
        return $sql;
    }

    public function get_one_tarifas()
    {
        $id_park = $_SESSION['estacionamiento']->id;
        $sql = $this->db->query("SELECT * FROM tarifas where id_park = '$id_park' AND id = '{$this->getId()}'");
        return $sql->fetch_object();
    }

    public function delete()
    {
        $sql = "DELETE FROM tarifas WHERE id= '{$this->id}'";
        $delete = $this->db->query($sql);

        $result = false;

        if ($delete) {
            $result = true;
        }
        return $result;

    }

    public function update()
    {
        $id_park = $_SESSION['estacionamiento']->id;
        $sql = "UPDATE tarifas SET 
            tipo_car = '{$this->getTipo_car()}',
            descripcion = '{$this->getDescripcion()}',
            tarifa = '{$this->getTarifa()}' WHERE id= {$this->getId()};";
        $save = $this->db->query($sql);

        $result = false;

        if ($save) {
            $result = true;
        }
        return $result;
    }
}