<?php
class Trabajo_model{
    private $db;
    public function __construct(){
        $this->db = Conectar::conexion();
    }

    public function get_all_trabajos(){
        $sql = "SELECT * FROM trabajo";
        $resultado = $this->db->query($sql);

        return $resultado;
    }

    public function insertarTrabajo($fecha_aceptado, $idtecnico, $idparte){
        $resultado = $this->db->query("INSERT INTO trabajo (fecha_aceptado, idtecnico, idparte)
        VALUES ('$fecha_aceptado', '$idtecnico', '$idparte')");
        
        return $idtecnico;
    }

    public function get_trabajo($id){
        $sql = "SELECT * FROM trabajo WHERE idtrabajo='$id'";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();

        return $row;
    }

    public function get_trabajo_parte($idparte){
        $sql = "SELECT * FROM trabajo WHERE idparte='$idparte'";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();

        return $row;
    }

    public function get_trabajos($idtecnico){
        $sql = "SELECT * FROM trabajo WHERE idtecnico='$idtecnico'";
        $resultado = $this->db->query($sql);

        return $resultado;
    }

    public function eliminarTrabajo($id){
        $resultado = $this->db->query("DELETE FROM trabajo WHERE idtrabajo='$id'");
    }

}