<?php

class Reservas{

    #Inputs
    private $id;
    private $entrada;
    private $salida;
    private $estado;
    private $tarifa_cobrada;
    private $descripcion;
    private $id_park;
    private $id_car;
    private $id_tarifa;

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
    
    function getSalida(){
        return $this->salida;}

    function setSalida($salida){
        $this->salida = $salida;}
    
    function getEstado(){
        return $this->estado;}

    function setEstado($estado){
        $this->estado = $estado;}
    
    function getTarifa_cobrada(){
        return $this->tarifa_cobrada;}

    function setTarifa_cobrada($tarifa_cobrada){
        $this->tarifa_cobrada = $tarifa_cobrada;}
    
    function getDescripcion(){
        return $this->descripcion;}

    function setDescripcion($descripcion){
        $this->descripcion = $descripcion;}
    
    function getId_park(){
        return $this->id_park;}

    function setId_park($id_park){
        $this->id_park = $id_park;}
    
    function getId_car(){
        return $this->id_car;}

    function setId_car($id_car){
        $this->id_car = $id_car;}

    function getId_tarifa(){
        return $this->id_tarifa;}

    function setId_tarifa($id_tarifa){
        $this->id_tarifa = $id_tarifa;}

    
    #Functions of Inputs

    public function get_info_input(){

        $id_park = $_SESSION['estacionamiento']->id;
        $sql = $this->db->query("SELECT inputs.id, persons.nombre, persons.apellido, cars.matricula, inputs.estado,
            TIMESTAMPDIFF(HOUR, entrada, NOW()) AS horas
            FROM inputs INNER JOIN cars ON inputs.id_car = cars.id 
            INNER JOIN persons ON cars.id_person = persons.id
            WHERE id_park = '$id_park'
            ORDER BY inputs.entrada DESC;");

        return $sql;
    }

    public function get_info_output(){

        $id_park = $_SESSION['estacionamiento']->id;
        $sql = $this->db->query("SELECT persons.nombre, persons.apellido, cars.matricula, inputs.estado, inputs.entrada, inputs.salida,
            TIMESTAMPDIFF(HOUR, entrada, NOW()) AS tiempo
            FROM inputs INNER JOIN cars 
            ON inputs.id_car = cars.id 
            INNER JOIN persons
            ON cars.id_person = persons.id
            WHERE id_park = '$id_park' ORDER BY inputs.entrada DESC;");

        return $sql;
    }


    public function update()
    {
        $id_park = $_SESSION['estacionamiento']->id;
        $sql = "UPDATE inputs SET 
            salida = now(),
            estado = 0
            WHERE id= '{$this->getId()}'AND id_park = '$id_park';";

        $save = $this->db->query($sql);

        $result = false;

        if ($save) {
            $result = true;
        }
        return $result;
    }
    
}