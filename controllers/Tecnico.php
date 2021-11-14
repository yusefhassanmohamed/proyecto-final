<?php 
    class Tecnicocontroller{
        public function __construct(){
            require_once "models/Usuario.php";
            require_once "models/Cliente.php";
            require_once "models/Tecnico.php";
            require_once "models/Domicilio.php";
            require_once "models/Producto.php";
            require_once "models/Parte.php";
            require_once "models/Trabajo.php";
        }

        public function mostrar(){
            $usuario = new Usuario_model();
            $data["usuarios"] = $usuario->get_usuarios();
            require_once "views/usuario/index.php";
        }

        public function nuevoTecnico(){
            require_once "views/tecnico/nuevo.php";
        }

        public function insertar(){
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $dni = $_POST['dni'];
            $rol = 'TECNICO';
            $numero_identificacion = $_POST['numero_identificacion'];
            echo $numero_identificacion;
            //comprobar que no existen mismos users, correos, dni etc. comprobarExistencia()
            if($this->comprobarExistencia($username, $email, $dni)){
                $usuario = new Usuario_model();
                $idUser = $usuario->insertar($nombre, $apellidos, $username, $password, $email, $telefono, $dni, $rol);

                $tecnico = new Tecnico_model();
                $tecnico->insertarTecnico($numero_identificacion, $idUser);
                header('Location: index.php?c=Usuario&a=mostrar');
            }else{
                header('Location: index.php?c=Cliente&a=nuevoCliente');
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

        public function mostrarTrabajos($id){
            $tecnico = new Tecnico_model();
            $data["tecnico"] = $tecnico->get_tecnico($id);
            $trabajo = new Trabajo_model();
            $data["trabajos"] = $trabajo->get_trabajos($data["tecnico"]["idtecnico"]);
            $parte = new Parte_model();
            $data["partes"] = array();
            foreach($data["trabajos"] as $trabajo){
                array_push($data["partes"], $parte->get_parte($trabajo['idparte'])); //Guardo los partes asociados a los trabajos en el array
            }
            $cliente = new Cliente_model();
            $usuario = new Usuario_model();
            $data["clientes"] = array();
            $data["usuarios"] = array();
            foreach($data["partes"] as $parte){
                $clienteAux = $cliente->get_cliente_id($parte['idcliente']);
                $usuarioAux = $usuario->get_usuario($clienteAux['idusuario']);
                array_push($data["clientes"], $clienteAux); //Clientes
                array_push($data["usuarios"], $usuarioAux); //Clientes
            }
            $producto = new Producto_model();
            $data["productos"] = array();
            foreach($data["partes"] as $parte){
                array_push($data["productos"], $producto->get_producto($parte['idproducto'])); //Producto
            }
            require_once "views/tecnico/trabajos.php";
        }

        
    }