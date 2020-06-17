<?php #Archivo de Conexión a la BD

    class Database{
        public static function connect()
        {
            $db = new mysqli('localhost','root', '', 'carlot_db');
            $db->query("SET NAMES 'utf-8'");

            return $db;
        }
    }

?>