<?php

function cargarControlador($controlador){

    //Añado "controller" al final para obtener el nombre de la clase del controlador.
    $nombreControlador = ucwords($controlador)."Controller";
    $archivoControlador = 'controllers/'.ucwords($controlador).'.php';

    //controlamos que el archivo exista
    if(!is_file($archivoControlador)){
        $archivoControlador = 'controllers/'.CONTROLADOR_PRINCIPAL.'.php';
    }
    else{
        
    }
    //echo $archivoControlador;
    require_once $archivoControlador;
    $control = new $nombreControlador();
    return $control;
}

function cargarAccion($controller, $accion, $id = null){
    //comprobamos si el método requiere algún parámetro.
    if(isset($accion) && method_exists($controller, $accion)){
        if($id == null){
            $controller->$accion();
        }else{
            $controller->$accion($id);
        }
    }else{
        $controller->ACCION_PRINCIPAL();
    }
}

?>