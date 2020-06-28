<?php

class Servicios{
    private $id;
    private $nombre;
    private $descripcion;
    private $costo;
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

    function getNombre()
    {
        return $this->nombre;
    }
    function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre); #Evitar inseguridades de inyecciones
    }

    function getDescripcion()
    {
        return $this->descripcion;
    }
    function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);

    }

    function getCosto()
    {
        return $this->costo;
    }
    function setCosto($costo)
    {
        $this->costo = $this->db->real_escape_string($costo);
    }

    function getId_park()
    {
        return $this->id_park;
    }
    function setId_park($id_park)
    {
        $this->id_park = $id_park;
    }

    public function get_servicios()
    {
        $id_park = $_SESSION['estacionamiento']->id;
        $sql = $this->db->query("SELECT * FROM servicios where id_park = '$id_park'");
        return $sql;
    }

    public function get_one_servicios()
    {
        $id_park = $_SESSION['estacionamiento']->id;
        $sql = $this->db->query("SELECT * FROM servicios where id_park = '$id_park' AND id = '{$this->getId()}'");
        return $sql->fetch_object();
    }

    public function save()
    {
        $id_park = $_SESSION['estacionamiento']->id;
        $sql = "INSERT INTO servicios VALUES (
            NULL,
            '{$this->getNombre()}',
            '{$this->getDescripcion()}',
            '{$this->getCosto()}',
            '$id_park');";
        $save = $this->db->query($sql);

        $result = false;

        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function delete()
    {
        $sql = "DELETE FROM servicios WHERE id= '{$this->id}'";
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
        $sql = "UPDATE servicios SET 
            nombre = '{$this->getNombre()}',
            descripcion = '{$this->getDescripcion()}',
            costo = '{$this->getCosto()}' WHERE id= {$this->getId()};";
        $save = $this->db->query($sql);

        $result = false;

        if ($save) {
            $result = true;
        }
        return $result;
    }
}