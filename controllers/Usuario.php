<?php 
    class Usuariocontroller{
        public function __construct(){
            require_once "models/Usuario.php";
            require_once "models/Cliente.php";
            require_once "models/Tecnico.php";
            //require_once "models/Gestor.php";
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

        public function mostrarUsuario($id){
            $usuario = new Usuario_model();
            $data["usuario"] = $usuario->get_usuario($id);
            if($data["usuario"]["rol"]=='CLIENTE'){
                $cliente = new Cliente_model();
                $domicilio = new Domicilio_model();
                $parte = new Parte_model();
                $producto = new Producto_model();
                $data["cliente"] = $cliente->get_cliente($id);
                $data["domicilios"] = $domicilio->get_domicilios($data["cliente"]["idcliente"]);
                $data["partes"] = $parte->get_partes($data["cliente"]["idcliente"]);
                $data["productos"] = $producto->get_productos($data["cliente"]["idcliente"]);
                require_once "views/cliente/detalle.php";
            }
            elseif($data["usuario"]["rol"]=='TECNICO'){
                $tecnico = new Tecnico_model();
                $trabajo = new Trabajo_model();
                $data["tecnico"] = $tecnico->get_tecnico($id);
                $data["trabajos"] = $trabajo->get_trabajos($data["tecnico"]["idtecnico"]);
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
            
            else if($data["usuario"]["rol"]=='TECNICO'){
                $tecnico = new Tecnico_model();
                $trabajo = new Trabajo_model();
                $parte = new Parte_model();
                $data["tecnico"] = $tecnico->get_tecnico($id);
                $data["trabajos"] = $trabajo->get_trabajos($data["tecnico"]["idtecnico"]);

                foreach($data["trabajos"] as $trabajoAux){
                    $parteAux = $parte->get_parte($trabajoAux['idparte']);
                    /* Si el parte está en estado "OCUPADO", se cambiará el estado a LIBRE antes de borrar el trabajo */
                    if($parteAux['estado'] == 'OCUPADO'){
                        $estado = 'LIBRE';
                        $parte->modificar_parte_estado($trabajoAux['idparte'], $estado);
                    }
                    $trabajo->eliminarTrabajo($trabajoAux['idtrabajo']);
                }
                $tecnico->eliminarTecnico($data['tecnico']['idtecnico']);
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