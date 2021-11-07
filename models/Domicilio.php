<?php
class Domicilio_model{
    private $db;
    public function __construct(){
        $this->db = Conectar::conexion();
    }

    public function get_all_domicilios(){
        $sql = "SELECT * FROM domicilio";
        $resultado = $this->db->query($sql);

        return $resultado;
    }

    public function insertarDomicilio($calle, $numero, $piso, $puerta, $idcliente){
        $resultado = $this->db->query("INSERT INTO domicilio (calle, numero, piso, puerta, idcliente)
        VALUES ('$calle', '$numero', '$piso', '$puerta', '$idcliente')");
        
        return $idcliente;
    }

    public function get_domicilio($id){
        $sql = "SELECT * FROM domicilio WHERE iddomicilio='$id'";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();

        return $row;
    }

    public function get_domicilios($idcliente){
        $sql = "SELECT * FROM domicilio WHERE idcliente='$idcliente'";
        $resultado = $this->db->query($sql);

        return $resultado;
    }

    public function eliminarDomicilio($id){
        $resultado = $this->db->query("DELETE FROM domicilio WHERE iddomicilio='$id'");
    }

}