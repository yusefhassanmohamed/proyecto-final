<?php 
    class Usuariocontroller{
        public function __construct(){
            require_once "models/Usuario.php";
            require_once "models/Cliente.php";
            require_once "models/Domicilio.php";
            require_once "models/Producto.php";
        }

        public function mostrar(){
            $usuario = new Usuario_model();
            $data["usuarios"] = $usuario->get_usuarios();
            require_once "views/usuario/index.php";
        }

        public function mostrarUsuario($id){
            $usuario = new Usuario_model();
            $data["usuario"] = $usuario->get_usuario($id);
            if($data["usuario"]["rol"]=='CLIENTE'){
                $cliente = new Cliente_model();
                $domicilio = new Domicilio_model();
                $data["cliente"] = $cliente->get_cliente($id);
                $data["domicilios"] = $domicilio->get_domicilios($data["cliente"]["idcliente"]);
                require_once "views/cliente/detalle.php";
            }
            elseif($data["usuario"]["rol"]=='TECNICO'){
                require_once "views/tecnico/detalle.php";
            }
            elseif($data["usuario"]["rol"]=='GESTOR'){
                require_once "views/gestor/detalle.php";
            }
            else{
                $this->mostrar();
            }
        }

        public function eliminar($id){
            $usuario = new Usuario_model();
            $data["usuario"] = $usuario->get_usuario($id);
            if($data["usuario"]["rol"]=='CLIENTE'){
                $cliente = new Cliente_model();
                $domicilio = new Domicilio_model();
                $producto = new Producto_model();
                $data["cliente"] = $cliente->get_cliente($id);
                $data["domicilios"] = $domicilio->get_domicilios($data["cliente"]["idcliente"]);

                foreach($data["domicilios"] as $domicilioAux){
                    $data["productos"] = $producto->get_productos($domicilioAux["iddomicilio"]);
                }
                foreach($data["productos"] as $productosAux){
                    $producto->eliminarProducto($productosAux['idproducto']);
                }
                foreach($data["domicilios"] as $domicilioAux){
                    $domicilio->eliminarDomicilio($domicilioAux['iddomicilio']);
                }
                $cliente->eliminarCliente($data['cliente']['idcliente']);
                $usuario->eliminarUsuario($id);
            }
            header('Location: index.php?c=Usuario&a=mostrar');
        }

        public function nuevoUsuario(){
            require_once "views/usuario/nuevo.php";
        }

        public function insertar(){
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $dni = $_POST['dni'];
            $rol = $_POST['rol'];
            //comprobar que no existen mismos users, correos, dni etc. comprobarExistencia()
            if($this->comprobarExistencia($username, $email, $dni)){
                $usuario = new Usuario_model();
            }else{
                echo 'errorrr';
            }
             
            
        }

        public function comprobarExistencia($username, $email, $dni){
            $resultado = false;
            $usuario = new Usuario_model();
            $usernameResult = $usuario->get_username($username);
            $emailResult = $usuario->get_email($email);
            $dniResult = $usuario->get_dni($dni);
             if(mysqli_num_rows($usernameResult)==0 && mysqli_num_rows($emailResult)==0 && mysqli_num_rows($dniResult)==0){
                $resultado = true;
            } 
            return $resultado;
        }
    }
?>