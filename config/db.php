<?php #Archivo de Conexión a la BD

    class Database{
        public static function connect()
        {
            $db = new mysqli(
                'localhost',
                'root', 
                '', 
                'carlot_db');
            $db->query("SET NAMES 'utf-8'");

            return $db;
        }
    }

    /*
    Local Credenciales
    'localhost',
                'root', 
                '', 
                'carlot_db'

    Base Remota credenciales
    'bxzw1ws3jcdwi8jelbij-mysql.services.clever-cloud.com',
                'uhme9vzbna2ir11i',
                'n6RrgP8zdvfvLi8nWJV2',
                'bxzw1ws3jcdwi8jelbij'
    */


    // mysql -u uhme9vzbna2ir11i -h bxzw1ws3jcdwi8jelbij-mysql.services.clever-cloud.com -p
    
?>