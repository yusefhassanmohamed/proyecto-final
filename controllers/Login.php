<?php
require_once "models/Login.php";
class LoginController{

    function __construct(){
        $_SESSION['rol'] = 'null';
        $_SESSION['log'] = false;
    }

    function index(){
        require_once "views/login/index.php";
    }

    function iniciar(){
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            //empty es un metodo de php para comprobar que no esta mandando datos vacios.
            if(empty($username) || empty($password)){
            }else{
                $user = new Login;
                if($user->getUser($username,$password)){
                    //Con una consulta recojo los valores del usuario y los guardo en la variable "datosUsuario"
                    $datosUsuario = mysqli_fetch_assoc($user->getDatos($username,$password));
                    //metodo de php que te permite controlar sesiones
                    //Mediante este for, guardo todos los datos en la variable session.
                    foreach($datosUsuario as $campo => $valor){
                        $_SESSION[$campo] = $valor;
                    }
                    $_SESSION['log'] = true;
                    header('location: index.php&c=Main');
                }else{
                    $_SESSION['log'] = false;
                    $_SESSION['rol'] = 'null';
                    $this->index();
                }
            }
        }
    }

    function cerrar(){
        session_unset();
        $_SESSION['rol'] = 'null';
        $_SESSION['log'] = false;
        header('location: index.php&c=Main');
        
    }
}

?>