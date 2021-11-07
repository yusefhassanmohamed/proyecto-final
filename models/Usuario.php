<?php
class Usuario_model{
    private $db;
    private $usuarios;

    public function __construct(){
        $this->db = Conectar::conexion();
        $this->usuarios = array();
    }

    public function get_usuarios(){
        $sql = "SELECT * FROM `usuario`";
        $resultado = $this->db->query($sql);
        while($row = $resultado->fetch_assoc()){
            $this->usuarios[] = $row;
        }return $this->usuarios;
    }

     public function insertar($nombre, $apellidos, $username, $password, $email, $telefono, $dni, $rol){
        $resultado = $this->db->query("INSERT INTO usuario (nombre, apellidos, username, password, email, telefono, dni, rol)
        VALUES ('$nombre', '$apellidos', '$username', '$password', '$email', '$telefono', '$dni', '$rol')");
        
        $userId = mysqli_insert_id($this->db);
        return $userId;
    }
/*
    public function modificar($id, $username, $nombre, $apellidos, $email, $password, $empresa){
        $resultado = $this->db->query("UPDATE usuarios SET username='$username', nombre='$nombre', apellidos='$apellidos', email='$email', password='$password', nombre_empresa='$empresa' WHERE id_usuario='$id'");
    }
*/
    public function eliminarUsuario($id){
        $resultado = $this->db->query("DELETE FROM usuario WHERE idusuario='$id'");
    } 

    public function get_usuario($id){
        $sql = "SELECT * FROM usuario WHERE idusuario='$id' LIMIT 1";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();

        return $row;
    }

    public function get_username($username){
        $sql = "SELECT * FROM usuario WHERE username='$username' LIMIT 1";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();

        return $resultado;
    }

    public function get_email($email){
        $sql = "SELECT * FROM usuario WHERE email='$email' LIMIT 1";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();

        return $resultado;
    }

    public function get_dni($dni){
        $sql = "SELECT * FROM usuario WHERE dni='$dni' LIMIT 1";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();

        return $resultado;
    }

    
}
