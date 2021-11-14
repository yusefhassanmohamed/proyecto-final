<?php
class Tecnico_model extends Usuario_model{
    private $db;
    private $usuarios;
    public function __construct(){
        parent::__construct();
        $this->db = Conectar::conexion();
    }

    public function get_tecnico($id){
        $sql = "SELECT * FROM tecnico WHERE idusuario='$id' LIMIT 1";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();

        return $row;
    }

    public function get_tecnico_id($id){
        $sql = "SELECT * FROM tecnico WHERE idtecnico='$id' LIMIT 1";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();

        return $row;
    }

    public function insertarTecnico($numero_identificacion, $idusuario){
        $resultado = $this->db->query("INSERT INTO tecnico (numero_identificacion, idusuario)
        VALUES ('$numero_identificacion', '$idusuario')");
    }

    public function eliminarTecnico($id){
        $resultado = $this->db->query("DELETE FROM tecnico WHERE idtecnico='$id'");
    } 

}