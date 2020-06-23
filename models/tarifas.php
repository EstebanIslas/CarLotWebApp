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
        $sql = "INSERT INTO tarifas VALUES (
            NULL,
            '{$this->getTipo_car()}',
            '{$this->getDescripcion()}',
            '{$this->getTarifa()}',
            1);";
        $save = $this->db->query($sql);

        $result = false;

        if ($save) {
            $result = true;
        }
        return $result;
    }
}