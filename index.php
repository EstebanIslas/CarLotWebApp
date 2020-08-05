<?php

ob_start();
session_start();
# Controlador Principal del proyecto
require_once 'autoload.php'; #Tener acceso a todos los controladores
require_once 'config/db.php'; #Acceso a la BD
require_once 'config/parameters.php'; #Constante url 'base'
require_once 'helpers/utils.php'; #Librerias de apoyo
#require_once 'views/layout/header.php';

#Funcion para llamar controlador de errores
function showError()
{
    #Redireccionar al controlador de errores
    $error = new ErrorController();
    $error->index();
}

#Comprobar que llegan todos los controladores
if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'].'Controller';
}elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $nombre_controlador = controller_default; #Redirigir pagina a la predeterminada en parameters
}else {
    showError();
    exit(); #Deja de ejecutar el codigo sincrono
}

#Comprobar si existe el controlador
if (class_exists($nombre_controlador)) {
    $controlador = new $nombre_controlador();

    #Invocar Metodos dinamicos con Action
    #Con funcion de la URL
    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) { 
        $action = $_GET['action'];
        $controlador->$action();
    }elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $action_default = action_default;
        $controlador->$action_default();
    }else {
        showError();
    }

}else {
    showError();
}

#require_once 'views/layout/footer.php';
