<?php
require_once('../../db/conectar.php');

class UsuarioModel {
    private $db;

    public function __construct(){
        $this->db = Conectar::conexion();
    }


    public function validarUsuario($usuario, $clave) {
        $correo = mysqli_real_escape_string($this->db, $usuario);
        $contrasena = mysqli_real_escape_string($this->db, $clave);

        $query = "SELECT Correo FROM Usuarios WHERE Correo = '$correo' AND Clave = SHA2('$contrasena', 256)";
        $result = mysqli_query($this->db, $query);
        $numFilas = mysqli_num_rows($result);
        return $numFilas;
    }

    

    public function obtenerId($usuario) {
        $correo = mysqli_real_escape_string($this->db, $usuario);
        $query = "SELECT idUsuario FROM usuarios WHERE correo = '$correo'";
        $consulta = $this->db->query($query);
        if ($consulta) {
            $fila = $consulta->fetch_assoc();
            $idUsuario = $fila['idUsuario'];
            $consulta->free_result();
            return $idUsuario;
        }
        return null;
    }
}
?>