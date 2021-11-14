<?php
class Cliente_model extends Usuario_model{
    private $db;
    private $usuarios;
    public function __construct(){
        parent::__construct();
        $this->db = Conectar::conexion();
    }

    public function get_cliente($id){
        $sql = "SELECT * FROM cliente WHERE idusuario='$id' LIMIT 1";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();

        return $row;
    }
    
    public function get_clientes(){
        $sql = "SELECT * FROM cliente";
        $resultado = $this->db->query($sql);

        return $resultado;
    }

    public function get_cliente_id($id){
        $sql = "SELECT * FROM cliente WHERE idcliente='$id' LIMIT 1";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();

        return $row;
    }

    public function insertarCliente($idUser, $fecha_registro){
        $resultado = $this->db->query("INSERT INTO cliente (fecha_registro, idusuario)
        VALUES ('$fecha_registro', '$idUser')");
    }

    public function eliminarCliente($id){
        $resultado = $this->db->query("DELETE FROM cliente WHERE idcliente='$id'");
    } 

}