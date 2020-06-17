<?php
#Autocargado de Clases

#Entra a la carpeta de controllers y hace un include de cada uno
function controller_autoload($classname){
    include 'controllers/'.$classname.'.php';
}

spl_autoload_register('controller_autoload');
