<?php

class Users{
    private $id;
    private $correo;
    private $password;
    private $image;
    private $rol;
    private $id_person;

    #Database Connection
    public function __construct()
    {
        $this->db = Database::connect();
    }

    #GETTERS y SETTERS
    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }
    public function setCorreo($correo){
        $this->correo = $correo;
    }
    
    public function getCorreo(){
        return $this->correo;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    
    public function getPassword(){
        return $this->password;
    }
    function getImage()
    {
        return $this->image;
    }
    function setImage($image)
    {
        $this->image = $image;
    }
    function getRol(){
        return $this-> rol;
    }
    function setRol($rol){
        $this->rol = $rol;
    }
    public function setId_person($id_person){
        $this->id_person = $id_person;
    }

    public function getId_person(){
        return $this->id_person;
    }

    #Login 
    public function login()
    {
        $correo = $this->getCorreo();
        $password = $this->getPassword();

        
        #Comprobacion de usuario
        $sql = "SELECT * FROM users WHERE correo = '$correo' AND password = '$password'";
        $result = $this->db->query($sql);

        if ($result && $result->num_rows == 1) {
            #Recibe Objeto
            $user = $result->fetch_object();
        }else{
            $user =  null;
        }

        return $user;
    }
}