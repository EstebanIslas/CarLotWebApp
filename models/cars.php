<?php

class Cars{

    private $id;
    private $matricula;
    private $marca;
    private $color;
    private $descripcion;
    private $id_person;

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

    function getMatricula()
    {
        return $this->matricula;
    }
    function setMatricula($matricula)
    {
        $this->matricula = $this->db->real_escape_string($matricula);
    }
    function getMarca()
    {
        return $this->marca;
    }
    function setMarca($marca)
    {
        $this->marca = $this->db->real_escape_string($marca);
    }
    function getColor()
    {
        return $this->color;
    }
    function setColor($color)
    {
        $this->color = $this->db->real_escape_string($color);
    }
    function getDescripcion()
    {
        return $this->descripcion;
    }
    function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }
    function getId_person()
    {
        return $this->id_person;
    }
    function setId_person($id_person)
    {
        $this->id_person = $id_person;
    }

    public function get_cars()
    {
        $id_person = $_SESSION['automovilista']->id;
        $sql = $this->db->query("SELECT * FROM cars where id_person = '$id_person'");
        return $sql;
    }

    public function get_one_cars()
    {
        $id_person = $_SESSION['automovilista']->id;
        $sql = $this->db->query("SELECT * FROM cars where id_person = '$id_person' AND id = '{$this->getId()}'");
        return $sql->fetch_object();
    }

    public function save()
    {
        $id_person = $_SESSION['automovilista']->id;
        $sql = "INSERT INTO cars VALUES (
            NULL,
            '{$this->getMatricula()}',
            '{$this->getMarca()}',
            '{$this->getColor()}',
            '{$this->getDescripcion()}',
            '$id_person');";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function delete()
    {
        $sql = "DELETE FROM cars WHERE id= '{$this->id}'";
        $delete = $this->db->query($sql);

        $result = false;

        if ($delete) {
            $result = true;
        }
        return $result;

    }

    public function update()
    {
        $id_person = $_SESSION['automovilista']->id;
        $sql = "UPDATE cars SET 
            matricula = '{$this->getMatricula()}',
            marca = '{$this->getMarca()}',
            color = '{$this->getColor()}',
            descripcion = '{$this->getDescripcion()}'
            WHERE id= {$this->getId()};";
        $save = $this->db->query($sql);

        $result = false;

        if ($save) {
            $result = true;
        }
        return $result;
    }
}