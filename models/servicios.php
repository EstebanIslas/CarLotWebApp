<?php

class Servicios{
    private $id;
    private $nombre;
    private $descripcion;
    private $costo;
    private $id_park;

    #Detalle Servicio
    private $hora_arrivo;
    private $estado;
    private $id_servicio;
    private $id_car;

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

    #SETTERS Y GETTERS DETALLE
    function getHora_arrivo()
    {
        return $this->hora_arrivo;
    }
    function setHora_arrivo($hora_arrivo)
    {
        $this->hora_arrivo = $this->db->real_escape_string($hora_arrivo); #Evitar inseguridades de inyecciones
    }

    function getEstado()
    {
        return $this->estado;
    }
    function setEstado($estado)
    {
        $this->estado = $this->db->real_escape_string($estado);
    }
    
    function getId_servicio()
    {
        return $this->id_servicio;
    }
    function setId_servicio($id_servicio)
    {
        $this->id_servicio = $id_servicio;
    }

    function getId_car()
    {
        return $this->id_car;
    }
    function setId_car($id_car)
    {
        $this->id_car = $id_car;
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

    public function get_servicios_user()
    {
        $sql = $this->db->query("SELECT * FROM servicios where id_park = '{$this->getId_park()}'");
        
        $filas = $sql->num_rows;
        $num = (integer)$filas;
        
        if ($num == 1) {
            $_SESSION['services'] = "existe";
        }elseif($num == 0) {
            $_SESSION['services'] = "no_existe";
        }

        return $sql;
    }

    public function get_servicio_by_id()
    {
        $sql = $this->db->query("SELECT * FROM servicios WHERE id = '{$this->getId()}'");
        return $sql->fetch_object();
    }

    public function get_detalle_servicios()
    {
        $id_person = $_SESSION['automovilista']->id;
        
        $sql = $this->db->query("SELECT parks.nombre_park, cars.matricula, servicios_detalle.hora_arrivo, servicios.nombre, servicios.costo, servicios_detalle.estado FROM servicios_detalle
        INNER JOIN servicios ON servicios_detalle.id_servicio = servicios.id
        INNER JOIN parks ON servicios.id_park = parks.id
        INNER JOIN cars ON servicios_detalle.id_car = cars.id 
        WHERE cars.id_person = '$id_person' ORDER BY servicios_detalle.id DESC LIMIT 10");
        
        $filas = $sql->num_rows;
        $num = (integer)$filas;
        
        if ($num == 1) {
            $_SESSION['services_rows'] = "existe";
        }elseif($num == 0) {
            $_SESSION['services_rows'] = "no_existe";
        }

        return $sql;
    }

    public function save_detalle()
    {

        $sql = "INSERT INTO servicios_detalle VALUES (
            NULL,
            '{$this->getHora_arrivo()}',
            'En curso',
            '{$this->getDescripcion()}',
            '{$this->getId_servicio()}',
            '{$this->getId_car()}');";

        $save = $this->db->query($sql);

        $result = false;

        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function get_current()
    {
        $id_person = $_SESSION['automovilista']->id;
        $sql = $this->db->query(
            "SELECT servicios_detalle.id, cars.id_person, parks.nombre_park, servicios_detalle.estado, servicios_detalle.hora_arrivo, servicios.nombre, servicios.costo FROM servicios_detalle
                INNER JOIN servicios ON servicios_detalle.id_servicio = servicios.id
                INNER JOIN parks ON servicios.id_park = parks.id
                INNER JOIN cars ON servicios_detalle.id_car = cars.id 
             WHERE cars.id_person = '$id_person'AND (servicios_detalle.estado = 'En curso' OR servicios_detalle.estado = 'Aceptada')
             ORDER BY servicios_detalle.id DESC LIMIT 1;");
        
        $filas = $sql->num_rows;
        $num = (integer)$filas;
        
        if ($num == 1) {
            $_SESSION['services_curr'] = "existe";
        }elseif($num == 0) {
            $_SESSION['services_curr'] = "no_existe";
        }
        return $sql;
    
    }
    public function service_on()
    {
        $estado = $this->getEstado();
        $sql = "UPDATE servicios_detalle SET estado = '$estado'
                WHERE id = '{$this->getId()}';";
        
        $save = $this->db->query($sql);
        $result = false;

        if ($save) {$result = true;}
        
        return $result;
    }
}