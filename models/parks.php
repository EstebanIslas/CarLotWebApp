<?php

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
        $this->dia_fin = $dia_ini;
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

}