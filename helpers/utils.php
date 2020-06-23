<?php
#Clases para funcionalidades pequeñas
#Se crean metodos estaticos para no instanciar los objetos
class Utils{

    /*
     * Funcion que elimina sesiones creadas
     */
    public static function deleteSession($name){
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }

        return $name;
    }
}