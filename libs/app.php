<?php

    class App{
        function __construct(){
            echo "<p>Nueva app</p>"; 

            $url = $_GET['url'];
            $url = rtrim($url, '/');
            $url = explode('/', $url);
            var_dump($url);
            $archivoController = 'controllers/'.$url[0].'php';

            if(file_exists($archivoController)){
                require_once $archivoController;
                $controler = new $url[0];

                /* if(isset($url[1])){
                    $controller->{$url[1]}();
                }
                else{
                    echo "nanai";
                } */
            }
        }
    }

?>