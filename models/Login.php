<?php
require_once "libs/database.php";
    class Login extends Conectar{
        public function getUser($username, $password){
            //Consulta.
            $sql = "SELECT * FROM usuario WHERE username = '$username' AND password = '$password'";
            //la conexion con la base de datos.
            $result = $this->conexion()->query($sql);

            /*numRows se encarga de almacenar cuantas filas va a retornar la consulta*/
            /*Para comprobar que solo pueda existir un usuario con ese nombre */
            $numRows = $result->num_rows;
            if($numRows == 1){
                return true;
            }
            return false;
        }
        
        //Funcion para recoger datos del usuario logueado
        public function getDatos($username, $password){
            //Consulta.
            $sql = "SELECT * FROM usuario WHERE username = '$username' AND password = '$password'";
            //la conexion con la base de datos.
            $result = $this->conexion()->query($sql);
            return $result;
        }
    }