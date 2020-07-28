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

    public function get_all_puntuaciones()
    {
        $id_park = $_SESSION['estacionamiento']->id;
        $result = $this->db->query("SELECT persons.nombre, persons.apellido, puntuaciones.comment, puntuaciones.calificacion FROM puntuaciones 
        INNER JOIN persons ON puntuaciones.id_person = persons.id WHERE id_park = '$id_park' ORDER BY puntuaciones.id DESC;");
        return $result;
    }

    public function get_total_comments()
    {
        $id_park = $_SESSION['estacionamiento']->id;
        $result = $this->db->query("SELECT COUNT(calificacion) AS total FROM puntuaciones WHERE id_park = '$id_park';");
        
        $filas = $result->num_rows;
        $num = (integer)$filas;
        
        if ($num == 1) {
            $_SESSION['tot_comments'] = "existe";
        }elseif($num == 0) {
            $_SESSION['calificacion'] = "no_existe";
        }
        
        return $result;
    }

    public function get_calificacion()
    {
        $id_park = $_SESSION['estacionamiento']->id;
        $result = $this->db->query("SELECT AVG(calificacion) as calificacion FROM puntuaciones WHERE id_park = '$id_park' GROUP BY id_park;");
        
        $filas = $result->num_rows;
        $num = (integer)$filas;
        
        if ($num == 1) {
            $_SESSION['calificacion'] = "existe";
        }elseif($num == 0) {
            $_SESSION['calificacion'] = "no_existe";
        }
        
        return $result;
    }

    public function get_total_reservas()
    {
        $id_park = $_SESSION['estacionamiento']->id;
        $result = $this->db->query("SELECT COUNT(id) AS total FROM reservas WHERE id_park = '$id_park';");
        
        $filas = $result->num_rows;
        $num = (integer)$filas;
        
        if ($num == 1) {
            $_SESSION['tot_reservas'] = "existe";
        }elseif($num == 0) {
            $_SESSION['tot_reservas'] = "no_existe";
        }
        
        return $result;
    }
}