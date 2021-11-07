<?php 
    class Productocontroller{
        public function __construct(){
            require_once "models/Usuario.php";
            require_once "models/Cliente.php";
            require_once "models/Domicilio.php";
            require_once "models/Producto.php";
        }

        public function mostrarProducto($id){
            $producto = new Producto_model();
            $domicilio = new Domicilio_model();
            $cliente = new Cliente_model();
            $data["producto"] = $producto->get_producto($id);
            $data["domicilio"] = $domicilio->get_domicilio($data['producto']['iddomicilio']);
            $data["cliente"] = $cliente->get_cliente_id($data["domicilio"]['idcliente']);
            $idUsuario = $data["cliente"]['idusuario'];
            if($producto->get_producto($id)){
                require_once "views/producto/detalle.php";
            }
            else{
                header('Location: index.php?c=Usuario&a=mostrar');
                /* $this->mostrar(); */
            }
        }

        public function eliminar($id){
            $producto = new Producto_model();
            if($producto->get_producto($id)){
                $producto->eliminarProducto($id);
                header('Location: index.php?c=Usuario&a=mostrar');
            }

        }
    }