<!--
    require_once 'libs/controller.php';
    require_once 'libs/view.php';
    require_once 'libs/model.php';
    require_once 'libs/app.php';
    
    
-->

<?php
    //EL BOTON DE LOGOUT.
    /* session_start();
    if(isset($_POST['cerrarSesion'])){
        unset($_SESSION['username']);
        header('location: index.php');
    } */
?>
<?php 
//PRIMERA PARTE: este if se usa para que el usuario no pueda entrar copiando la url.
/* if(isset($_SESSION['username'])){ */
?>
    <?php 
        require_once "config/configMain.php";
        require_once "core/routes.php";
        require_once "libs/database.php";
        require_once "controllers/Login.php";
        session_start();
        if(!((isset($_SESSION['rol'])) || (isset($_SESSION['log'])))){
            $login = new LoginController();
        }
        

        if(isset($_GET['c'])){
            $controlador = cargarControlador($_GET['c']);
            if(isset($_GET['a'])){
                if(isset($_GET['id'])){
                    cargarAccion($controlador, $_GET['a'], $_GET['id']);
                }else{
                    cargarAccion($controlador, $_GET['a']);
                }
            }else{
                cargarAccion($controlador, ACCION_PRINCIPAL);
            }
        }else{
            $controlador = cargarControlador('Main');
            $accionTmp = ACCION_PRINCIPAL;
            $controlador->$accionTmp();
        }
    ?>
<?php
    //SEGUNDA PARTE: este if se usa para que el usuario no pueda entrar copiando la url.
    /* }else{
        header('location: index.php');
    } */
?>