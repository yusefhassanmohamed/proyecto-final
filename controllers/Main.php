<?php

class MainController{

    function __construct(){
        require_once "views/main/index.php";
    }

    function saludo(){
        echo "<p>Ejecutaste el método Saludo</p>";
    }

    function prueba(){
        echo "<p>Ejecutaste la prueba</p>";
    }
}

?>