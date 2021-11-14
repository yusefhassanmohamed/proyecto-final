<?php
class Parte_model{
    private $db;
    public function __construct(){
        $this->db = Conectar::conexion();
    }

    public function get_all_partes(){
        $sql = "SELECT * FROM parte";
        $resultado = $this->db->query($sql);

        return $resultado;
    }

    public function insertarParte($calle, $numero, $piso, $puerta, $idcliente){
        $resultado = $this->db->query("INSERT INTO parte (calle, numero, piso, puerta, idcliente)
        VALUES ('$calle', '$numero', '$piso', '$puerta', '$idcliente')");
        
        return $idcliente;
    }

    public function get_parte($id){
        $sql = "SELECT * FROM parte WHERE idparte='$id'";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();

        return $row;
    }

    public function get_partes($idcliente){
        $sql = "SELECT * FROM parte WHERE idcliente='$idcliente'";
        $resultado = $this->db->query($sql);

        return $resultado;
    }

    
    public function eliminarParte($id){
        $resultado = $this->db->query("DELETE FROM parte WHERE idparte='$id'");
    }

    public function modificar_parte_estado($id, $estado){
        $resultado = $this->db->query("UPDATE parte SET estado='$estado' WHERE idparte='$id'");
    }

}