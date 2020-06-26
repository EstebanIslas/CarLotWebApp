<?php

class Persons{

    private $id;
    private $nombre;
    private $apellido;
    private $telefono;


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
}