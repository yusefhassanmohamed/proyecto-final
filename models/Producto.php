<?php
class Producto_model{
    private $db;
    public function __construct(){
        $this->db = Conectar::conexion();
    }

    public function get_productos($iddomicilio){
        $sql = "SELECT * FROM producto WHERE iddomicilio='$iddomicilio'";
        $resultado = $this->db->query($sql);

        return $resultado;
    }

    public function get_all_productos(){
        $sql = "SELECT * FROM producto";
        $resultado = $this->db->query($sql);

        return $resultado;
    }

    public function insertarProducto($nombre, $marca, $fecha_registro, $iddomicilio){
        $resultado = $this->db->query("INSERT INTO producto (nombre, marca, fecha_registro, iddomicilio)
        VALUES ('$nombre', '$marca', '$fecha_registro', '$iddomicilio')");
    }

    public function get_producto($id){
        $sql = "SELECT * FROM producto WHERE idproducto='$id' LIMIT 1";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();

        return $row;
    }

    public function eliminarProducto($id){
        $resultado = $this->db->query("DELETE FROM producto WHERE idproducto='$id'");
    }

}