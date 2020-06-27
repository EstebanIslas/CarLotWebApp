<?php

class Puntuaciones{

    private $id;
    private $comment;
    private $calificacion;
    private $id_person;
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

    function getComment()
    {
        return $this->comment;
    }
    function setComment($comment)
    {
        $this->comment = $comment;
    }
    function getCalificacion()
    {
        return $this->calificacion;
    }
    function setCalificacion($calificacion)
    {
        $this->calificacion = $calificacion;
    }
    function getId_person()
    {
        return $this->id_person;
    }
    function setId_person($id_person)
    {
        $this->id_person = $id_person;
    }
    function getId_park()
    {
        return $this->id_park;
    }
    function setId_park($id_park)
    {
        $this->id_park = $id_park;
    }

    public function get_puntuaciones()
    {
        $id_park = $_SESSION['estacionamiento']->id;
        $result = $this->db->query("SELECT persons.nombre, persons.apellido, puntuaciones.comment, puntuaciones.calificacion FROM puntuaciones 
        INNER JOIN persons ON puntuaciones.id_person = persons.id WHERE id_park = '$id_park' ORDER BY puntuaciones.id DESC LIMIT 4;");
        return $result;
    }
}