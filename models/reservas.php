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

}