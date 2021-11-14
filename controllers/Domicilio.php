<?php 
    class Domiciliocontroller{
        public function __construct(){
            require_once "models/Usuario.php";
            require_once "models/Cliente.php";
            require_once "models/Domicilio.php";
            require_once "models/Producto.php";
        }

        public function nuevoDomicilio($id){
            require_once "views/domicilio/nuevo.php";
        }

        public function insertar($id){
            /* Recojo datos */
            $calle = $_POST['calle'];
            $numero = $_POST['numero'];
            $piso = $_POST['piso'];
            $puerta = $_POST['puerta'];
            $idcliente = $id;

            $cliente = new Cliente_model();
            $data['cliente'] = $cliente->get_cliente_id($idcliente);

            /* Inserto datos */
            $domicilio = new Domicilio_model();
            $domicilio->insertarDomicilio($calle, $numero, $piso, $puerta, $idcliente);

            header('Location: index.php?c=Usuario&a=mostrarUsuario&id='.$data['cliente']['idusuario']);
        }

        public function eliminar($id){
            $domicilio = new Domicilio_model();
            $data["domicilio"] = $domicilio->get_domicilio($id);
            $cliente = new Cliente_model();
            $data['cliente'] = $cliente->get_cliente_id($data["domicilio"]['idcliente']);
            $producto = new Producto_model();
            $data["productos"] = $producto->get_productos($id);

            /* Elimino los productos asociados al domicilio */
            foreach($data["productos"] as $productoAux){
                $producto->eliminarProducto($productoAux['idproducto']);
            }
            /* Elimino el domicilio */
            $domicilio->eliminarDomicilio($id);

            header('Location: index.php?c=Usuario&a=mostrarUsuario&id='.$data['cliente']['idusuario']);
        }

        public function mostrar(){
            $domicilio = new Domicilio_model();
            $data["domicilios"] = $domicilio->get_all_domicilios();
            require_once "views/domicilio/index.php";
        }

        public function mostrarDomicilio($id){
            $domicilio = new Domicilio_model();
            $producto = new Producto_model();
            $data["domicilio"] = $domicilio->get_domicilio($id);
            $data["productos"] = $producto->get_productos($id);
            if($domicilio->get_domicilio($id)){
                require_once "views/domicilio/detalle.php";
            }
            else{
                header('Location: index.php?c=Usuario&a=mostrar');
                /* $this->mostrar(); */
            }
        }

    }